@extends('layouts.app')

@section('title', 'Saudi Prime | تسجيل الطالبات')

<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<style>
    body::before {
    content: "";
    position: fixed;
    inset: 0;

    width: 100%;
    height: 100svh;

    background-image: url('../img/students.webp');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: top center;

    opacity: 0.20;
    z-index: -1;
    }

    @media (max-width: 768px) {
    body::before {background-image: url('../img/students.webp') !important;
    background-size: cover; 
    height: 100%;
}
}
</style>

@section('content')
    <div class="reg-wrapper">

        <h1>نموذج تسجيل الطالبات (صباحي)</h1>


        @if(session('success'))
            <div class="reg-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('morning_register.store') }}"
              enctype="multipart/form-data"
              class="reg-form">
            @csrf

            {{-- الاسم --}}
        <div class="reg-group">
            <label>الاسم الكامل *</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}">
            @error('full_name') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- الرقم الجامعي --}}
        <div class="reg-group">
            <label>الرقم الجامعي *</label>
            <input type="text" name="university_number" value="{{ old('university_number') }}" placeholder="يتكون من 8 إلى 10 أرقام">
            @error('university_number') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

            {{-- الهاتف --}}
        <div class="reg-group">
            <label>رقم الجوال *</label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+9665XXXXXXXX" class="phone-style">
            @error('phone') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- البريد --}}
        <div class="reg-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email') }}" class="email-style" placeholder="example@example.com">
            @error('email') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- الرياضة --}}
        <div class="reg-group full">
            <label>برنامج الرياضة المختار *</label>
            <select id="sport_select" required>
                <option value="">اختر</option>
                @foreach($programSports->groupBy('sport_id') as $sportId => $items)
                    <option value="{{ $sportId }}">
                        {{ $items->first()->sport->name_ar }}
                    </option>
                @endforeach
            </select>
        </div>

            {{-- اليوم الأول --}}
        <div class="reg-group">
            <label>اليوم الأول *</label>
            <select name="day_one" id="day_one" required>
                <option value="">اختر اليوم</option>
            </select>
            @error('day_one') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- وقت اليوم الأول --}}
        <div class="reg-group">
            <label>وقت اليوم الأول *</label>
            <select name="start_time_1" id="start_time_1" required>
                <option value="">اختر الوقت</option>
            </select>
           @error('start_time_1') <div class="reg-error">{{ $message }}</div> @enderror

        </div>

        {{-- اليوم الثاني --}}
        <div class="reg-group">
            <label>اليوم الثاني *</label>
            <select name="day_two" id="day_two" required>
                <option value="">اختر اليوم</option>
            </select>
            @error('day_two') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

            {{-- وقت اليوم الثاني --}}
        <div class="reg-group">
            <label>وقت اليوم الثاني *</label>
            <select name="start_time_2" id="start_time_2" required>
                <option value="">اختر الوقت</option>
            </select>
            @error('start_time_2') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- السعر --}}
        <div class="reg-group full">
            <strong style="font-size: 20px;">السعر: {{ $price }} ريال</strong>
        </div>

        {{-- طريقة الدفع --}}
        <div class="reg-group full">
            <label>طريقة الدفع *</label>
            <select name="payment_method" required>
                <option value="">اختر</option>
                <option value="cash">كاش</option>
                <option value="bank_transfer">تحويل بنكي</option>
                {{-- <option value="online">دفع إلكتروني</option> --}}
            </select>
            @error('payment_method') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- إثبات الدفع --}}
        <div class="reg-group full">
            <label>رفع إثبات الدفع </label>
            <input type="file" name="payment_proof">
            @error('payment_proof') <div class="reg-error">{{ $message }}</div> @enderror
        </div>

        {{-- program_sport_id --}}
        <input type="hidden"
       name="program_sport_id"
       id="program_sport_id"
       value="{{ old('program_sport_id') }}">


            <div class="reg-group full reg-checkbox">
                <input type="checkbox" name="accepted_terms" value="1">
                <span><a onclick="openTerms()" class="terms">أوافق على الشروط والأحكام * </a></span>
            </div>
            @error('accepted_terms') <div class="reg-error full">{{ $message }}</div> @enderror

            <button type="submit" class="reg-submit full">
                إرسال التسجيل
            </button>
        </form>
</div>

<div id="termsModal" class="modal">
  <div class="modal-content">
    <h2>الشروط والأحكام</h2>
    <p>
      باستخدامك لهذا الموقع، فإنك توافق على الشروط والأحكام الخاصة بنا.
     </p>
<span>•	الغياب لا يعوض</span>
<span>•	إمكانية إلغاء الاشتراك بعد أول حصة من طرف النادي أو الأهل</span>
<span>•	الالتزام باللبس المحدد</span>
    <div class="actions">
      <button onclick="closeTerms()">اغلاق</button>
    </div>
  </div>
</div>


<script>
const programSports = @json($programSports);

const sportSelect = document.getElementById('sport_select');
const dayOne = document.getElementById('day_one');
const dayTwo = document.getElementById('day_two');
const timeSelect1 = document.getElementById('start_time_1');
const timeSelect2 = document.getElementById('start_time_2');
const programSportInput = document.getElementById('program_sport_id');

let currentSportData = [];

/* اختيار الرياضة */
sportSelect.addEventListener('change', () => {

    const sportId = sportSelect.value;

    currentSportData = programSports.filter(ps => ps.sport_id == sportId);

    reset(dayOne);
    reset(dayTwo);
    reset(timeSelect1);
    reset(timeSelect2);

    const uniqueDays = [...new Set(currentSportData.map(ps => ps.day))];

    uniqueDays.forEach(day => {
        dayOne.innerHTML += `<option value="${day}">${translateDay(day)}</option>`;
    });
});

/* اليوم الأول */
dayOne.addEventListener('change', () => {

    reset(timeSelect1);
    reset(dayTwo);
    reset(timeSelect2);

    const selectedDay = dayOne.value;

    const sessions = currentSportData
        .filter(ps => ps.day == selectedDay)
        .sort((a,b)=> a.start_time.localeCompare(b.start_time));

    sessions.forEach(ps => {
        timeSelect1.innerHTML += `
            <option value="${ps.start_time}">
                ${formatTime(ps.start_time)}
            </option>`;
    });

    const otherDays = [...new Set(currentSportData.map(ps => ps.day))]
        .filter(day => day !== selectedDay);

    otherDays.forEach(day => {
        dayTwo.innerHTML += `<option value="${day}">${translateDay(day)}</option>`;
    });
});

/* اليوم الثاني */
dayTwo.addEventListener('change', () => {

    reset(timeSelect2);

    const selectedDay = dayTwo.value;

    const sessions = currentSportData
        .filter(ps => ps.day == selectedDay)
        .sort((a,b)=> a.start_time.localeCompare(b.start_time));

    sessions.forEach(ps => {
        timeSelect2.innerHTML += `
            <option value="${ps.start_time}">
                ${formatTime(ps.start_time)}
            </option>`;
    });
});

/* تحديث program_sport_id */
timeSelect1.addEventListener('change', () => {

    const match = currentSportData.find(ps =>
        ps.day == dayOne.value &&
        ps.start_time == timeSelect1.value
    );

    if (match) {
        programSportInput.value = match.id;
    }
});

/* Helpers */

function reset(select){
    select.innerHTML = `<option value="">اختر</option>`;
}

function translateDay(day){
    return {
        saturday: 'السبت',
        sunday: 'الأحد',
        monday: 'الاثنين',
        tuesday: 'الثلاثاء',
        wednesday: 'الأربعاء',
        thursday: 'الخميس'
    }[day];
}

function formatTime(time){
    let [hour, minute] = time.split(':');
    hour = parseInt(hour);

    const ampm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12;
    hour = hour ? hour : 12;

    return `${hour}:${minute} ${ampm}`;
}

/* منع الإرسال بدون اختيار صحيح */
document.querySelector('form').addEventListener('submit', function(e){
    if(!programSportInput.value){
        e.preventDefault();
        alert('يرجى اختيار اليوم والوقت أولاً');
    }
});
</script>



@endsection

<script>
  function openTerms() {
    document.getElementById("termsModal").style.display = "block";
  }

  function closeTerms() {
    document.getElementById("termsModal").style.display = "none";
  }

  function acceptTerms() {
    alert("Terms accepted!");
    closeTerms();
  }
</script>


