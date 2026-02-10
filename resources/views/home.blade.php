@extends('layouts.app')

@section('title', 'Saudi Prime')
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')

<div class="header-wrapper prime-banner banner-on-load">
    <div class="hero-overlay"></div>
  <div class="gallery">
    <h1></h1>
  </div>
</div>
<div class="all-sections">
<section id="about" class="slide-section flex items-center bg-neutral-light animate-fade-up">
    <div class="container mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-12 items-center">

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
                    نقدم مجموعة متنوعة من البرامج الرياضية على يد مدربين محترفين معتمدين، مع توفير أحدث المعدات الرياضية وأفضل الخدمات.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#pricing" class="btn btn-show rounded-md">
                        استعرض الاشتراكات
                    </a>

                    <a href="#services" class="btn btn-outline">
                        تعرّف على الخدمات
                    </a>
                </div>
            </div>

            
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="card card-hover text-center">
                    <i class="fas fa-dumbbell"></i>
                    <p class="font-semibold">أحدث المعدات</p>
                    <span class="font-semibold section-text-under">معدات رياضية عالمية</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-award"></i>
                    <p class="font-semibold">مدربين محترفين</p>
                    <span class="font-semibold section-text-under">خبرة ومهارة عالية</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-shield-halved"></i>
                    <p class="font-semibold">بيئة آمنة</p>
                    <span class="font-semibold section-text-under">خصوصية تامة للنساء</span>
                </div>

                <div class="card card-hover text-center">
                    <i class="fa-solid fa-clock"></i>
                    <p class="font-semibold">أوقات مرنة</p>
                    <span class="font-semibold section-text-under">صباحية ومسائية</span>
                </div>
            </div>


        </div>
    </div>
</section>
<div class="sec-sections">
<section id="gallery" class="section slide-section bg-neutral-light program-prices animate-fade-up py-10">
   <div class="felx flex-col items-center p-app-lg">
      <div class="text-center mb-16">
         <h2 class="text-5xl font-bold text-neutral-dark mb-20">
             ألبوم الصور 
         </h2>
  <div class="parent">
  <div class="columns-wrapper">

    <div class="image-column">
      <div class="track up">
        <img src="{{ asset('img/gallery/IMG_1.webp')}}" alt="Random Image 1" />
        <img src="{{ asset('img/gallery/IMG_2.webp')}}" alt="Random Image 2" />
        <img src="{{ asset('img/gallery/IMG_3.webp')}}" alt="Random Image 3" />
        <img src="{{ asset('img/gallery/IMG_4.webp')}}" alt="Random Image 4" />

        <img src="{{ asset('img/gallery/IMG_5.webp')}}" alt="Random Image 5" />
        <img src="{{ asset('img/gallery/IMG_9.webp')}}" alt="Random Image 9" />
        <img src="{{ asset('img/gallery/IMG_10.webp')}}" alt="Random Image 10" />
                <img src="{{ asset('img/gallery/IMG_9.webp')}}" alt="Random Image 6" />

      </div>
    </div>

    <div class="image-column hide-gal-on-mobile">
      <div class="track down">
        <img src="{{ asset('img/gallery/IMG_1.webp')}}" alt="Random Image 1" />
        <img src="{{ asset('img/gallery/IMG_2.webp')}}" alt="Random Image 2" />
        <img src="{{ asset('img/gallery/IMG_3.webp')}}" alt="Random Image 8" />
        <img src="{{ asset('img/gallery/IMG_4.webp')}}" alt="Random Image 4" />
        <img src="{{ asset('img/gallery/IMG_9.webp')}}" alt="Random Image 9" />

        <img src="{{ asset('img/gallery/IMG_5.webp')}}" alt="Random Image 5" />
        <img src="{{ asset('img/gallery/IMG_6.webp')}}" alt="Random Image 6" />
        <img src="{{ asset('img/gallery/IMG_7.webp')}}" alt="Random Image 7" />
      </div>
    </div>

    <div class="image-column hide-gal-on-mobile">
      <div class="track up">
       
        <img src="{{ asset('img/gallery/IMG_7.webp')}}" alt="Random Image 7" />
        <img src="{{ asset('img/gallery/IMG_8.webp')}}" alt="Random Image 8" />
        <img src="{{ asset('img/gallery/IMG_9.webp')}}" alt="Random Image 9" />
        <img src="{{ asset('img/gallery/IMG_10.webp')}}" alt="Random Image 10" />
        <img src="{{ asset('img/gallery/IMG_5.webp')}}" alt="Random Image 5" />

         <img src="{{ asset('img/gallery/IMG_1.webp')}}" alt="Random Image 1" />
        <img src="{{ asset('img/gallery/IMG_2.webp')}}" alt="Random Image 2" />
        <img src="{{ asset('img/gallery/IMG_3.webp')}}" alt="Random Image 3" />
        <img src="{{ asset('img/gallery/IMG_4.webp')}}" alt="Random Image 4" />
      </div>
    </div>

  </div>
</div>
      </div>
    </div>
</section>

<section id="services" class="bg-neutral-light animate-fade-up">
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


<section id="programs" class="py-20 bg-neutral-light animate-fade-up">
    <div class="container mx-auto px-6 text-center services sports">

        {{-- Section Heading --}}
        <div class="mb-12">
            <h2 class="text-5xl font-bold text-neutral-dark mb-4">
             البرامج الرياضية
           </h2>
            <p class="font-semibold section-text-under">
            اختار البرنامج المناسب لك من بين 10 برامج رياضية متنوعة (انقر على البرنامج لعرض التفاصيل)
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            <div 
            class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="كرة السلة"
            data-icon="🏀"
            data-desc="برنامج شامل لتعليم وتطوير مهارات كرة السلة من المستوى المبتدئ إلى المتقدم"
            data-benefits="تحسين اللياقة البدنية الشاملة|تطوير التنسيق الحركي والتوازن|تعزيز روح العمل الجماعي|بناء الثقة بالنفس"
            data-skills="مهارات التمرير والاستلام|تقنيات التسديد من مسافات مختلفة|المراوغة والتحكم بالكرة|الدفاع والهجوم|قراءة اللعب الجماعي"
            data-equipments="ملعب كرة سلة احترافي|كرات سلة بأحجام مختلفة|أهداف قابلة للتعديل|معدات تدريب حديثة"  >
                <span class="sport-icon">🏀</span>
                <h3 class="font-semibold text-body mb-1">كرة السلة</h3>
                <p class="font-semibold section-text-under">تطوير المهارات الأساسية</p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="كرة القدم"
            data-icon="⚽"
            data-desc="تعلم أساسيات كرة القدم وتطوير المهارات الفنية والبدنية"
            data-benefits="تحسين التحمل البدني والقوة|تطوير السرعة والرشاقة|تقوية عضلات الساقين|تحسين القدرة على اتخاذ القرار السريع"
            data-skills="التمرير الدقيق بأنواعه|التسديد على المرمى|المراوغة والتخطي|السيطرة على الكرة|قراءة اللعب والتكتيكات"
            data-equipments="ملعب عشب صناعي احترافي|كرات قدم بأحجام مختلفة|مرامي احترافية|معدات تدريب متنوعة">
                <span class="sport-icon"> ⚽
                </span>
                <h3 class="font-semibold text-body mb-1">
                    كرة القدم
                </h3>
                <p class="font-semibold section-text-under">
                  تعلم أساسيات اللعبة
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="كرة الطائرة"
            data-icon="🏐"
            data-desc="إتقان مهارات الكرة الطائرة الأساسية والمتقدمة مع التركيز على العمل الجماعي"
            data-benefits="تطوير القفز والقوة الانفجارية|تحسين سرعة ردة الفعل|تقوية عضلات الذراعين والكتفين|تعزيز التواصل الجماعي"
            data-skills="الإرسال بأنواعه|الاستقبال الدقيق|الضرب الساحق|حائط الصد|الدفاع عن الملعب"
            data-equipments="ملعب كرة طائرة قانوني|شبكات احترافية|كرات طائرة بجودة عالية|معدات حماية">
                <span class="sport-icon"> 🏐
                </span>
                <h3 class="font-semibold text-body mb-1">
                    كرة الطائرة
                </h3>
                <p class="font-semibold section-text-under">
                 اتقان المهارات الأساسية
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="السباحة"
            data-icon="🏊"
            data-desc="تعلم السباحة بأنماطها المختلفة من البداية حتى الاحتراف"
            data-benefits="تحسين اللياقة البدنية الكاملة|تقوية عضلات الجسم بالكامل|تحسين صحة القلب والأوعية|تخفيف التوتر والاسترخاء"
            data-skills="السباحة الحرة (الفري ستايل)|سباحة الظهر|سباحة الصدر|سباحة الفراشة|تقنيات التنفس الصحيحة"
            data-equipments="مسبح أولمبي مغطى|نظافة وتعقيم مستمر|معدات سباحة متنوعة|غرف تبديل فاخرة">
                <span class="sport-icon"> 🏊
                </span>
                <h3 class="font-semibold text-body mb-1">
                   السباحة
                </h3>
                <p class="font-semibold section-text-under">
                تعلم السباحة بأنماطها
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="التنس"
            data-icon="🎾"
            data-desc="تعلم أساسيات لعبة التنس وتطوير المهارات الفنية والتكتيكية"
            data-benefits="تطوير التركيز الذهني|تحسين المرونة والرشاقة|تقوية الذراعين والجذع|بناء القدرة على التحمل"
            data-skills="الإرسال القوي والدقيق|الضربة الأمامية|الضربة الخلفية|ضربات الشبكة|التكتيكات واستراتيجيات اللعب"
            data-equipments="ملاعب تنس احترافية|مضارب بجودة عالية|كرات تنس متنوعة|شبكات قانونية">
                <span class="sport-icon"> 🎾
                </span>
                <h3 class="font-semibold text-body mb-1">
                   التنس
                </h3>
                <p class="font-semibold section-text-under">
               أساسيات لعبة التنس
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="تنس الطاولة"
            data-icon="🏓"
            data-desc="تطوير مهارات تنس الطاولة وسرعة ردة الفعل"
            data-benefits="تحسين التركيز الذهني|تطوير سرعة ردة الفعل|تنشيط العقل والذاكرة|تحسين التنسيق بين اليد والعين"
            data-skills="الإرسال المتنوع|الضربات السريعة|تقنيات الدوران|اللعب الدفاعي والهجومي|استراتيجيات المباريات"
            data-equipments="طاولات تنس احترافية|مضارب بجودة عالية|كرات معتمدة|أرضية مناسبة">
                <span class="sport-icon"> 🏓
                </span>
                <h3 class="font-semibold text-body mb-1">
                   تنس الطاولة
                </h3>
                <p class="font-semibold section-text-under">
              تطوير سرعة ردة الفعل
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="الريشة الطائرة"
            data-icon="🏸"
            data-desc="إتقان لعبة الريشة الطائرة بمستوياتها المختلفة"
            data-benefits="تحسين المرونة والرشاقة|تطوير السرعة والحركة|تقوية عضلات الجسم|تحسين القدرة على التحمل"
            data-skills="الإرسال القصير والطويل|الضربة العالية|الإسقاط الدقيق|الدفاع السريع|حركات القدم الصحيحة"
            data-equipments="ملاعب احترافية بأرضية مناسبة|مضارب بأوزان مختلفة|ريش طائرة بجودة عالية|شبكات قانونية">
                <span class="sport-icon"> 🏸
                </span>
                <h3 class="font-semibold text-body mb-1">
                   الريشة الطائرة
                </h3>
                <p class="font-semibold section-text-under">
             إتقان اللعبة بمستوياتها
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="الجمباز"
            data-icon="🤸"
            data-desc="تعلم حركات الجمباز والتوازن بطريقة آمنة ومحترفة"
            data-benefits="تحسين المرونة بشكل كبير|تطوير التوازن والتنسيق|تقوية جميع عضلات الجسم|بناء الثقة والشجاعة"
            data-skills="القفز والشقلبات|وضعيات التوازن|الدوران والحركات الدائرية|الحركات الأرضية|استخدام الأجهزة"
            data-equipments="صالة جمباز مجهزة بالكامل|فرشات أمان سميكة|عارضة توازن|حصان القفز|أجهزة متنوعة">
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

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="اليوغا"
            data-icon="🧘"
            data-desc="ممارسة اليوغا للاسترخاء والمرونة والسلام الداخلي"
            data-benefits="تخفيف التوتر والقلق|تحسين المرونة بشكل ملحوظ|تعزيز السلام الداخلي|تحسين التنفس والتركيز"
            data-skills="وضعيات الوقوف الأساسية|وضعيات التوازن|التمدد العميق|تقنيات التنفس الصحيحة|التأمل والاسترخاء"
            data-equipments="استوديو يوغا هادئ|سجادات يوغا مريحة|وسائد دعم|موسيقى هادئة|إضاءة مناسبة">
               <span class="sport-icon"> 🧘
               </span>
                <h3 class="font-semibold text-body mb-1">
                    اليوغا
                </h3>
                <p class="font-semibold section-text-under">
                 استرخاء ومرونة
                </p>
            </div>

            <div class="card card-hover text-center cursor-pointer"
            onclick="openProgramPopup(this)"
            data-title="اللياقة البدنية"
            data-icon="💪"
            data-desc="برنامج شامل لتحسين اللياقة البدنية والقوة والصحة العامة"
            data-benefits="حرق السعرات الحرارية بفعالية|بناء وتقوية العضلات|تحسين الصحة العامة|زيادة الطاقة والنشاط"
            data-skills="تمارين القوة والمقاومة|تمارين الكارديو|تمارين المرونة|تمارين التحمل|التغذية الرياضية"
            data-equipments="صالة ألعاب كاملة|أوزان حرة متنوعة|أجهزة كارديو حديثة|أجهزة مقاومة|معدات وظيفية">
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
           <a href="{{ route('morning_register') }}"> {{ __('Join Now') }} </a>
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
            <a href="{{ route('evening_register') }}"> {{ __('Join Now') }} </a>
        </button>
    </div>
    @endisset

    
    

</div>


   </div>
  </section>
  </div>
</div>

<div id="programModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
  <div class="bg-white w-[420px] max-w-[95%] rounded-2xl p-6 relative animate-fade-up popup-content">

    <button onclick="closeProgramPopup()" class="absolute top-4 left-4 text-2xl">&times;</button>

    <div class="text-center mb-4">
      <div id="modalIcon" class="text-4xl mb-2"></div>
      <h2 id="modalTitle" class="text-2xl font-bold"></h2>
      <p id="modalDesc" class="text-sm text-gray-600 mt-2"></p>
    </div>

    <div class="bg-green-50 rounded-xl p-4 mb-3">
      <h4 class="font-semibold mb-2">🎯 الفوائد</h4>
      <ul id="modalBenefits" class="text-sm space-y-1"></ul>
    </div>

    <div class="bg-purple-50 rounded-xl p-4">
      <h4 class="font-semibold mb-2">⚡ المهارات المكتسبة</h4>
      <ul id="modalSkills" class="text-sm space-y-1"></ul>
    </div>

    <div class="bg-purple-50 rounded-xl p-4">
      <h4 class="font-semibold mb-2">🏋️ المعدات والمرافق</h4>
      <ul id="modalEquipments" class="text-sm space-y-1"></ul>
    </div>

  </div>
</div>
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

<script>
    const slider = document.querySelector('.items');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  
  // The position of the mouse relative to the left edge of
  // the slider:
  startX = e.pageX - slider.offsetLeft;
  
  // The scroll position of the slider:
  scrollLeft = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});

slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});

slider.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  
  // The position of the mouse relative to the left edge of
  // the slider:
  const x = e.pageX - slider.offsetLeft;
  
  // The new position minus the old position, multiplied by 3.
  const walk = (x - startX) * 3;
  slider.scrollLeft = scrollLeft - walk;
});
</script>
<script>
let popupJustOpened = false;

function openProgramPopup(card) {
    popupJustOpened = true;

    const modal = document.getElementById('programModal');
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    document.getElementById('modalTitle').innerText = card.dataset.title;
    document.getElementById('modalIcon').innerText = card.dataset.icon;
    document.getElementById('modalDesc').innerText = card.dataset.desc;

    document.getElementById('modalBenefits').innerHTML =
        card.dataset.benefits.split('|').map(b => `<li>• ${b}</li>`).join('');

    document.getElementById('modalSkills').innerHTML =
        card.dataset.skills.split('|').map(s => `<li>• ${s}</li>`).join('');

    document.getElementById('modalEquipments').innerHTML =
        card.dataset.equipments.split('|').map(s => `<li>• ${s}</li>`).join('');

    setTimeout(() => popupJustOpened = false, 0);
}

function closeProgramPopup() {
    document.getElementById('programModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('click', function (e) {
    if (popupJustOpened) return;

    const modal = document.getElementById('programModal');
    if (!modal || modal.classList.contains('hidden')) return;

    const popup = modal.querySelector('.popup-content');
    if (!popup) return;

    if (!popup.contains(e.target)) {
        closeProgramPopup();
    }
});
</script>
