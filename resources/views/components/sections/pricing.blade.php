<section id="pricing" class="section slide-section bg-neutral-light">
   <div class="felx flex-col items-center p-app-lg">
      <div class="text-center mb-16">
         <h2 class="text-5xl font-bold text-neutral-dark mb-4">
            الأسعار والبرامج 
         </h2>

         <div class="w-24 h-1 bg-deep mx-auto mb-8"></div>

         <p class="text-xl text-neutral-muted">
            أسعار مناسبة و برامج متنوعة لتلبية احتياجاتك
         </p>
         <div class="mt-12">
            <div class="p-app-lg">
               <h4 class="text-xl font-bold text-neutral-dark mb-6 text-center">
                     ماذا يشمل الاشتراك؟
               </h4>

               <div class="flex flex-wrap justify-center gap-6 md:gap-10 text-sm text-neutral-muted">
                     <!-- مرونة في الأوقات -->
                     <div class="flex flex-col items-center text-center gap-2 w-40 md:w-44">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sand text-deep text-lg">
                           <x-heroicon-o-clock />
                        </div>
                        <p class="leading-relaxed">
                           <strong>مرونة في الأوقات</strong><br>
                           تقدرين تختارين الأيام والوقت اللي يناسبك
                        </p>
                     </div>

                     <!-- يومين أسبوعيًا -->
                     <div class="flex flex-col items-center text-center gap-2 w-40 md:w-44">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sand text-deep text-lg">
                           <x-heroicon-o-calendar-days />
                        </div>
                        <p class="leading-relaxed">
                           <strong>يومين أسبوعيًا</strong><br>
                           الاشتراك الشهري يشمل يومين تدريب ثابتة
                        </p>
                     </div>

                     <!-- معدات ومرافق -->
                     <div class="flex flex-col items-center text-center gap-2 w-40 md:w-44">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sand text-deep text-lg">
                           <x-hugeicons-equipment-gym-03 class="stroke-1.6 size-8"/>
                        </div>
                        <p class="leading-relaxed">
                           <strong>معدات ومرافق</strong><br>
                           استخدام مجاني لكل المعدات والمرافق
                        </p>
                     </div>

                     <!-- خصومات مميزة -->
                     <div class="flex flex-col items-center text-center gap-2 w-40 md:w-44">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sand text-deep text-lg">
                           <x-heroicon-c-percent-badge />
                        </div>
                        <p class="leading-relaxed">
                           <strong>خصومات مميزة</strong><br>
                           عروض خاصة للاشتراكات نصف السنوية والسنوية
                        </p>
                     </div>

                     <!-- حصة تجريبية مجانية -->
                     <div class="flex flex-col items-center text-center gap-2 w-40 md:w-44">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-sand text-deep text-lg">
                           <x-heroicon-o-fire />
                        </div>
                        <p class="leading-relaxed">
                           <strong>حصة تجريبية مجانية</strong><br>
                           جربي الجو أول قبل ما تلتزمين بالاشتراك
                        </p>
                     </div>
               </div>
            </div>
         </div>

      </div>

      <div class="grid sm:grid-cols-2 gap-8 max-w-5xl mx-auto">
    @isset($morningProgram)
    <!-- القسم الصباحي -->
    <div class="pricing-table featured card card-hover">
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">
                <x-heroicon-s-sun class="size-20 text-amber-400"/>
            </div>

            <h3 class="text-3xl font-bold text-neutral-dark mb-2">
                {{ $morningProgram->category?->getLabel() }}
            </h3>

            <p class="text-neutral-muted mb-4">
            {{-- الطالبات داخل الكلية --}}
                {{ $morningProgram->description }}
            </p>

            <div class="text-5xl font-bold text-deep mb-2">
            {{ $morningProgram->base_price }} {{ config('app.currency') }}
            </div>
            
        </div>

        <button
            wire:click="startRegistration('{{$morningProgram->category?->value}}')"
            class="btn btn-primary w-full mt-4">
            {{ __('Register') }}
        </button>
    </div>
    @endisset

    @isset($eveningProgram)
    <!-- القسم المسائي -->
    <div class="pricing-table card card-hover card-alt">
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">
                <x-heroicon-s-moon class="size-20 text-neutral-muted" />
            </div>

            <h3 class="text-3xl font-bold text-neutral-dark mb-2">
            {{ $eveningProgram->category->getLabel() }}
            </h3>

            <p class="text-neutral-muted mb-4">
            {{ $eveningProgram->description }}
            </p>

            <div class="text-5xl font-bold text-deep mb-2">
            {{ $eveningProgram->base_price }} {{ config('app.currency') }}
            </div>
            
        </div>

        <button
            wire:click="startRegistration('{{$eveningProgram->category->value}}')"
            class="btn btn-show rounded-md w-full mt-4">
            {{ __('Register') }}
        </button>
    </div>
    @endisset

    {{-- MODAL --}}
    @if ($showModal)
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex justify-center animate-fade-in p-4">
        <div class="bg-white rounded-3xl shadow-xl max-w-4xl w-full m-10 p-8 overflow-y-auto relative">

            {{-- Close --}}
            <button
                wire:click="$set('showModal', false)"
                class="absolute top-4 right-4 text-neutral-muted hover:text-neutral-dark">
                ✕
            </button>

            <h2 class="text-3xl font-bold text-center mb-8 text-neutral-dark">
                اختاري البرنامج الرياضي
            </h2>

            {{-- BOOKING FORM --}}
            <form wire:submit.prevent="submitRegistration" class="space-y-8">

                {{-- PERSONAL INFO --}}
                <div class="flex pt-app-md gap-4">
                    <x-form.input
                        name="name"
                        :label='__("Name")'
                        placeholder="مثال: فاطمة أحمد"
                        required
                    />

                    @if ($category === $morningProgram->category->value)
                        <x-form.input
                            name="universityNumber"
                            label="رقم الجامعة"
                            placeholder="مثال: 202012345"
                            required
                        />
                    @endif
                </div>

                {{-- SPORTS --}}
                @if (!empty($sports))
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-deep">الرياضة</h3>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                            @foreach ($sports as $sport)
                                <div
                                    wire:click="chooseSport({{ $sport->id }})"
                                    class="cursor-pointer rounded-2xl border p-6 text-center hover:shadow-lg transition
                                    {{ $selectedSportId === $sport->id ? 'border-deep bg-deep/5' : 'border-neutral/20' }}"
                                >
                                    <div class="mb-3">
                                        @svg(config('sporticon.available.'.$sport->icon), "size-16 text-deep mx-auto")
                                    </div>

                                    <div class="font-bold text-lg text-neutral-dark">
                                        {{ $sport->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @error('selectedSportId')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                {{-- SESSIONS --}}
                @if (!empty($groupedSessions))
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-deep">المواعيد</h3>

                        <div class="space-y-6">
                            @foreach ($groupedSessions as $day => $sessions)
                                <div class="border border-neutral/20 rounded-xl p-6 bg-neutral-light/40">
                                    <h4 class="text-lg font-bold mb-4">
                                        {{ __(ucfirst($day)) }}
                                    </h4>

                                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach ($sessions as $session)
                                            <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-neutral-light/50 transition">

                                                <input
                                                    type="checkbox"
                                                    wire:model.live="selectedSessions"
                                                    value="{{ $session['id'] }}"
                                                    class="size-5 text-deep rounded"
                                                >

                                                <div>
                                                    <div class="font-semibold">
                                                        {{ $session['start_time'] }}
                                                    </div>
                                                    <div class="text-sm text-neutral-muted">
                                                        السعة: {{ $session['capacity'] }}
                                                    </div>
                                                </div>

                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @error('selectedSessions')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                {{-- SUBMIT --}}
                <div class="pt-6 border-t">
                    <button
                        type="submit"
                        class="btn btn-primary w-full text-lg"
                        wire:loading.attr="disabled"
                    >
                        تأكيد التسجيل
                    </button>
                </div>

            </form>

            
        </div>
    </div>
    @endif
    {{-- PHONE VERIFICATION MODAL --}}
    @if ($showPhoneVerification)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-md space-y-4">

                <h3 class="text-xl font-bold text-center">
                    تأكيد رقم الجوال
                </h3>

                @if (! $otpSent)
                    <x-form.input
                        name="phone"
                        label="رقم الجوال"
                        placeholder="مثال: 0591234567"
                        wire:model.defer="phone"
                        required
                    />

                    <button
                        wire:click="sendOtp"
                        class="btn btn-primary w-full"
                    >
                        إرسال رمز التحقق
                    </button>
                @else
                    <x-form.input
                        name="otp"
                        label="رمز التحقق"
                        placeholder="••••••"
                        wire:model.defer="otp"
                        required
                    />

                    <button
                        wire:click="verifyOtp"
                        class="btn btn-success w-full"
                    >
                        تأكيد الرمز والمتابعة
                    </button>
                @endif

            </div>
        </div>
    @endif

</div>


   </div>
  </section>