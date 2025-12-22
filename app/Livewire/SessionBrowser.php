<?php
namespace App\Livewire;

use App\Enums\DaysEnum;
use App\Enums\ProgramCategoryEnum;
use App\Enums\SessionStatusEnum;
use Livewire\Component;
use App\Models\Program;
use App\Models\Sport;
use App\Models\AdultSession;
use App\Models\AdultSessionRegistration;
use App\Models\Customer;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;

class SessionBrowser extends Component
{
    public ?string $category = null;
    public string $programCategory; // morning / evening
    public ?int $sportId = null;
    public ?int $selectedSportId = null;
    public ?string $universityNumber = null;
    public ?string $phone = null;
    public ?string $name = null;
    public ?bool $showModal = false;
    public ?bool $showPhoneVerification = false;
    public ?bool $otpSent = false;

    public $sports = [];
    public $groupedSessions = [];
    public array $categories = [];
    public array $selectedSessions = [];

    public $morningProgram;
    public $eveningProgram;

    protected function rules(): array
    {
        return [
            'selectedSessions' => ['required', 'array', 'size:2'],
            'selectedSessions.*' => ['exists:adult_sessions,id'],

            // 'phone' => ['required', 'string', 'max:15'],
            'name' => ['nullable', 'string', 'max:100'],
            'universityNumber' => [
                $this->category === ProgramCategoryEnum::Morning ? 'required' : 'nullable',
                'string',
                'max:20',
            ],
        ];
    }

    public function mount()
    {
        $this->morningProgram = Program::where('category', ProgramCategoryEnum::Morning)->first();
        $this->eveningProgram = Program::where('category', ProgramCategoryEnum::Evening)->first();

        $this->categories = ProgramCategoryEnum::cases();
    }

    public function updatedCategory($value)
    {
        $program = Program::where('category', $value)->first();

        if (! $program) {
            $this->sports = [];
            $this->sportId = null;
            return;
        }

        $this->sports = Sport::whereHas('adultSessions', function ($q) use ($program) {
            $q->where('program_id', $program->id);
        })->get();

        // Reset
        $this->sportId = null;
        $this->groupedSessions = [];
    }

    public function chooseSport($sportId)
    {
        if (!$this->category || !$sportId) {
            $this->groupedSessions = [];
            return;
        }

        $programId = Program::where('category', $this->category)->value('id');

        $this->groupedSessions = AdultSession::query()
            ->where('program_id', $programId)
            ->where('sport_id', $sportId)
            ->where('status', SessionStatusEnum::Open)
            ->orderBy('start_time')
            ->get()
            ->sortBy(fn ($s) => DaysEnum::from($s->day->value)->order())
            ->groupBy('day')
            ->map->values() // optional: reset numeric keys
            ->toArray();
    }
    
    public function startRegistration($category)
    {
        $this->category = $category;

        $this->updatedCategory($category);

        $this->showModal = true;
    }
    public function verifyOtp()
    {
        // verify OTP
        // login customer

        $this->showPhoneVerification = false;

        // 🔥 CONTINUE booking automatically
        $this->completeRegistration();
    }


    public function submitRegistration(): void
    {
        $this->validateBookingData();
        
        if (! auth()->check()) {
            $this->showPhoneVerification = true;
            return;
        }
        
        $this->completeRegistration();
    }

    public function validateBookingData(): void
    {
        $this->validate();
    }

    public function completeRegistration()
    {
    
        DB::transaction(function () {

            // Lock ALL selected sessions in a consistent order
            $sessions = AdultSession::whereIn('id', $this->selectedSessions)
                ->orderBy('id') // prevents deadlocks
                ->lockForUpdate()
                ->get();

            // 1. Validate capacity for ALL sessions
            foreach ($sessions as $session) {
                if ($session->registrations()->count() >= $session->capacity) {
                    throw ValidationException::withMessages([
                        'selectedSessions' =>
                            'أحد المواعيد المختارة ممتلئ، يرجى اختيار مواعيد أخرى.',
                    ]);
                }
            }

            $customer = Customer::firstOrCreate(
                [
                    'phone' => $this->phone,
                    'university_id' => $this->universityNumber,
                ],
                [
                    'name' => $this->name ?? 'Guest User',
                ]
            );
            // 2. Create registration
            $registration = Registration::create([
                'customer_id' => $customer->id,
                'program_category' => $this->programCategory,
                'university_number' => $this->universityNumber,
            ]);

            // 3. Attach sessions
            foreach ($sessions as $session) {
                AdultSessionRegistration::create([
                    'registration_id' => $registration->id,
                    'session_id' => $session->id,
                ]);
            }

        });

    
        $this->reset();
        $this->showModal = false;
    
        $this->dispatch('registrationCompleted');
    }
    public function render()
    {
        return view('livewire.session-browser', [
            'sports' => $this->sports,
            'groupedSessions' => $this->groupedSessions,
            'morningProgram' => $this->morningProgram,
            'eveningProgram' => $this->eveningProgram,
        ]);
    }
}
