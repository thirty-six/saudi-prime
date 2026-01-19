@extends('layouts.app')

@section('title', 'Saudi Prime')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')

<div class="header-wrapper prime-banner banner-on-load">
  <div class="gallery">
    <h1></h1>
  </div>
</div>

<section id="about" class="slide-section flex items-center bg-neutral-light animate-fade-up">
    <div class="container mx-auto px-6">

        {{-- Top Context Bar --}}
        {{-- <div class="flex flex-wrap gap-4 text-small text-neutral-muted mb-8">
            <span>📍 داخل الكلية التقنية للبنات</span>
            <span>👨‍👩‍👧‍👦 وجهة عائلية متكاملة</span>
            <span>💳 اشتراكات مرنة وخدمات متعددة</span>
        </div> --}}

        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- Text Content --}}
            <div>
                <h1 class="text-display font-bold text-neutral-dark leading-tight">
                   مرحباً بك في 
                    <span class="block text-forest mt-2" style="color:#1F75BA;">
                        Saudi Prime 💪
                    </span>
                </h1>

                <p class="mt-6 text-body text-neutral-dark leading-relaxed max-w-xl">
                   نادي رياضي نسائي متكامل داخل الكلية -  نوفر بيئة آمنة ومحفزة لجميع الفئات العمرية لممارسة الرياضة وتحقيق الأهداف الصحية واللياقية.
                </p>
                <p class="mt-6 text-body text-neutral-dark leading-relaxed max-w-xl">
                    نقدم مجموعة متنوعة من البرامج الرياضية على يد مدربات محترفات معتمدات، مع توفير أحدث المعدات الرياضية وأفضل الخدمات.
                </p>

                {{-- CTA --}}
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#pricing" class="btn btn-show rounded-md">
                        استعرض الاشتراكات
                    </a>

                    <a href="#services" class="btn btn-outline">
                        تعرّف على الخدمات
                    </a>
                </div>
            </div>

            {{-- Segments / Value Cards --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="card card-hover text-center">
                    <i class="fas fa-dumbbell"></i>
                    <p class="font-semibold">أحدث المعدات</p>
                    <span>معدات رياضية عالمية</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-award"></i>
                    <p class="font-semibold">مدربات محترفات</p>
                    <span>خبرة ومهارة عالية</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-shield-halved"></i>
                    <p class="font-semibold">بيئة آمنة</p>
                    <span>خصوصية تامة للنساء</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-clock"></i>
                    <p class="font-semibold">أوقات مرنة</p>
                    <span>صباحية ومسائية</span>
                </div>
            </div>


        </div>
    </div>
</section>
<section id="audience" class="py-20 bg-neutral-light animate-fade-up">
    <div class="container mx-auto px-6 text-center services">

        {{-- Section Heading --}}
        <div class="mb-12">
            <h2 class="text-5xl font-bold text-neutral-dark mb-4">
           لمن نقدم خدماتنا ؟
           </h2>
            <p class="font-semibold section-text-under">
                خدمات وبرامج مصممة لتناسب فئات مختلفة، في بيئة منظمة وآمنة.
            </p>
        </div>

        {{-- Audience Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

            {{-- Students --}}
            <div class="card card-hover text-center">
                <x-heroicon-o-academic-cap
                    class="w-10 h-10 mx-auto mb-4 text-accent" />
                <h3 class="font-semibold text-body mb-1">
                    الطالبات
                </h3>
                <p class="font-semibold section-text-under">
                    اشتراكات صباحية مخصصة داخل بيئة تعليمية
                </p>
            </div>

            {{-- Families --}}
            <div class="card card-hover text-center">
                <x-hugeicons-user-group
                    class="w-10 h-10 mx-auto mb-4 text-accent" />
                <h3 class="font-semibold text-body mb-1">
                    العائلات
                </h3>
                <p class="font-semibold section-text-under">
                    أنشطة وخدمات تناسب جميع أفراد الأسرة
                </p>
            </div>

            {{-- Kids --}}
            <div class="card card-hover text-center">
                <x-hugeicons-baby-01
                    class="w-10 h-10 mx-auto mb-4 text-accent" />
                <h3 class="font-semibold text-body mb-1">
                    الأطفال
                </h3>
                <p class="font-semibold section-text-under">
                    برامج رياضية وترفيهية للأطفال 4-13 سنة
                </p>
            </div>

        </div>
    </div>
</section>


<section id="audience" class="py-20 bg-neutral-light animate-fade-up">
    <div class="container mx-auto px-6 text-center services sports">

        {{-- Section Heading --}}
        <div class="mb-12">
            <h2 class="text-5xl font-bold text-neutral-dark mb-4">
             البرامج الرياضية
           </h2>
            <p class="font-semibold section-text-under">
               اختار البرنامج المناسب لك من بين 10 برامج رياضية متنوعة
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🏀 </span>
                <h3 class="font-semibold text-body mb-1">
                    كرة السلة
                </h3>
                <p class="font-semibold section-text-under">
                   تطوير المهارات الأساسية
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> ⚽
                </span>
                <h3 class="font-semibold text-body mb-1">
                    كرة القدم
                </h3>
                <p class="font-semibold section-text-under">
                  تعلم أساسيات اللعبة
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🏐
                </span>
                <h3 class="font-semibold text-body mb-1">
                    كرة الطائرة
                </h3>
                <p class="font-semibold section-text-under">
                 اتقان المهارات الأساسية
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🏊
                </span>
                <h3 class="font-semibold text-body mb-1">
                   السباحة
                </h3>
                <p class="font-semibold section-text-under">
                تعلم السباحة بأنماطها
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🎾
                </span>
                <h3 class="font-semibold text-body mb-1">
                   التنس
                </h3>
                <p class="font-semibold section-text-under">
               أساسيات لعبة التنس
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🏓
                </span>
                <h3 class="font-semibold text-body mb-1">
                   تنس الطاولة
                </h3>
                <p class="font-semibold section-text-under">
              تطوير سرعة ردة الفعل
                </p>
            </div>

            <div class="card card-hover text-center">
                <span class="sport-icon"> 🏸
                </span>
                <h3 class="font-semibold text-body mb-1">
                   الريشة الطائرة
                </h3>
                <p class="font-semibold section-text-under">
             إتقان اللعبة بمستوياتها
                </p>
            </div>

            <div class="card card-hover text-center">
               <span class="sport-icon"> 🤸
               </span>
                <h3 class="font-semibold text-body mb-1">
                    الجمباز
                </h3>
                <p class="font-semibold section-text-under">
                   حركات الجمباز والتوازن
                </p>
            </div>
            
            <div class="card card-hover text-center card-none">
               <span class="sport-icon"> 
               </span>
                <h3 class="font-semibold text-body mb-1">
                </h3>
                <p class="font-semibold section-text-under">
                </p>
            </div>

            <div class="card card-hover text-center">
               <span class="sport-icon"> 🧘
               </span>
                <h3 class="font-semibold text-body mb-1">
                    اليوغا
                </h3>
                <p class="font-semibold section-text-under">
                 استرخاء ومرونة
                </p>
            </div>

            <div class="card card-hover text-center">
               <span class="sport-icon"> 💪
               </span>
                <h3 class="font-semibold text-body mb-1">
                    اللياقة البدنية
                </h3>
                <p class="font-semibold section-text-under">
                برنامج شامل للياقة
                </p>
            </div>

            <div class="card card-hover text-center card-none">
               <span class="sport-icon"> 
               </span>
                <h3 class="font-semibold text-body mb-1">
                </h3>
                <p class="font-semibold section-text-under">
                </p>
            </div>
        </div>
    </div>
</section>

<section id="pricing" class="section slide-section bg-neutral-light program-prices animate-fade-up">
   <div class="felx flex-col items-center p-app-lg">
      <div class="text-center mb-16">
         <h2 class="text-5xl font-bold text-neutral-dark mb-4">
            الأسعار والبرامج 
         </h2>

         <div class="w-24 h-1 bg-deep mx-auto mb-8"></div>

         <p class="font-semibold section-text-under">
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
                <i class="fa-solid fa-sun"></i>
            </div>

            <h3 class="text-3xl font-bold text-neutral-dark mb-2">
                {{ $morningProgram->category?->getLabel() }}
            </h3>

            <p class="font-semibold section-text-under mb-4">
            {{-- الطالبات داخل الكلية --}}
                {{ $morningProgram->description }}
            </p>

            <div class="text-3xl font-bold text-deep mb-2">
            {{ $morningProgram->base_price }} {{ config('app.currency') }}
            </div>
            
        </div>

        <button class="btn btn-primary-morning w-full mt-4">
            {{ __('Join Now') }}
        </button>
    </div>
    @endisset

    @isset($eveningProgram)
    <!-- القسم المسائي -->
    <div class="pricing-table card card-hover card-alt">
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">
                <i class="fa-solid fa-moon"></i>
            </div>

            <h3 class="text-3xl font-bold text-neutral-dark mb-4">
            {{ $eveningProgram->category->getLabel() }}
            </h3>

            <p class="font-semibold section-text-under mb-4">
            {{ $eveningProgram->description }}
            </p>

            <div class="text-3xl font-bold text-deep mb-4">
            {{ $eveningProgram->base_price }} {{ config('app.currency') }}
            </div>
            
        </div>

        <button class="btn btn-secondary-evening w-full mt-4">
            {{ __('Join Now') }}
        </button>
    </div>
    @endisset

    
    

</div>


   </div>
  </section>



@endsection

 <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>

  <script>
document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('.animate-fade-up');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // يشغّل مرة وحدة
            }
        });
    }, {
        threshold: 0.15
    });

    elements.forEach(el => observer.observe(el));
});
</script>