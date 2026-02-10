@extends('layouts.app')

@section('title', 'اشترك الآن')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/subscriptions.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')

<section class="join-hero banner-on-load">
    <div class="join-hero-overlay"></div>

    <div class="join-hero-content">
        <h1>الاشتراكات الرياضية</h1>
        <p>
          أنظمة اشتراك مصممة بعناية لتناسب مختلف الفئات والاحتياجات
        </p>
    </div>
</section>

<div class="subs-wrapper">

    <section class="subs-grid">

        <article class="subs-card pricing-table card card-hover card-alt animate-on-load">
            <div class="subs-tag muted"> <i class="fa-solid fa-graduation-cap"></i> طالبات فقط</div>
            <h2>الاشتراكات الصباحية</h2>
            <p class="subs-desc">
                اشتراك مخصص للطالبات مع نظام حضور منظم وسعة محدودة
                لضمان جودة التدريب.
            </p>

            <div class="subs-info">
                <div><span>عدد الحصص</span><strong>8 شهريًا</strong></div>
                <div><span>النظام</span><strong>حصتان أسبوعيًا</strong></div>
                <div><span>السعر</span><strong>200 ريال </strong></div>
                <div><span>السعة</span><strong>16 طالبة</strong></div>
            </div>

            <div class="subs-note">
               <span>ملاحظات :</span>
               <ul>
                <li> يتطلب إدخال الرقم الجامعي. </li>
                <li>الأوقات : ساعة يومياً ما بين ال 9 صباحاً - 1 ظهراً</li>
                <li> مزايا إضافية: أسعار خاصة للصالون، حجز ساعة لعب بـ 30 ريال، وتذكرة مدرج بـ 15 ريال.</li>
               </ul>
            </div>

            <a class="subs-btn outline" href="{{ route('morning_register') }}">
                الانتقال إلى التسجيل
            </a>
        </article>

        <article class="subs-card pricing-table card card-hover card-alt animate-on-load">
            <div class="subs-tag muted"> <i class="fa-solid fa-users"></i> للعامة</div>

            <h2>الاشتراكات المسائية</h2>
            <p class="subs-desc">
                برامج مسائية مرنة متاحة لجميع الفئات
                دون الحاجة لأي متطلبات جامعية.
            </p>

            <div class="subs-info">
                <div><span>عدد الحصص</span><strong>12 شهريًا</strong></div>
                <div><span>النظام</span><strong>3 حصص أسبوعيًا</strong></div>
                <div><span>السعر</span><strong>500 ريال</strong></div>
                <div><span>السعة</span><strong>16 مشترك</strong></div>
            </div>

           <div class="subs-note">
               <span>ملاحظات :</span>
               <ul>
                <li>الفئات العمرية: جمباز (4-8 سنوات، 9-14 سنة، 14 فما فوق للسيدات، 8 فما فوق للأولاد).</li>
                <li>لا تتوفر خصومات جامعية في هذا القسم.</li>
               </ul>
            </div>

            <a class="subs-btn outline" href="{{ route('evening_register') }}">
                الانتقال إلى التسجيل
            </a>
        </article>

        <article class="subs-card pricing-table card card-hover card-alt animate-on-load">
            <div class="subs-tag muted"> <i class="fa-solid fa-child"></i> أطفال</div>

            <h2>اشتراكات الأطفال (مساءً)</h2>
            <p class="subs-desc">
                برنامج شامل للأطفال يعتمد على جداول دقيقة
                وإشراف تدريبي كامل.
            </p>

            <div class="subs-info">
                <div><span>عدد الحصص</span><strong>12 شهرياً</strong></div>
                <div><span>النظام</span><strong>3 حصص </strong></div>
                <div><span>السعر</span><strong>800 ريال بدون ضريبة</strong></div>
               <div><span>السعة</span><strong>حسب البرنامج</strong></div>
            </div>

            <div class="subs-note">
               <span>ملاحظات :</span>
               <ul>
                <li>مدة الحصة ساعتان (ساعة لعبة أساسية + ساعة لياقة/فنون/ حسب الجدول).</li>
                <li>الفئات العمرية: 4–8 سنوات و9–13 سنة.</li>
                <li>أيام الاشتراك: (السبت/الاثنين/الأربعاء أو الأحد/الثلاثاء/الخميس).</li>
                <li>الدخول اليومي للأطفال بسعر 100 ريال.</li>
                <li>10 حصص تعليم سباحة 900 ريال بدون ضريبة</li>
               </ul>
            </div>

            <a class="subs-btn outline" href="{{ route('kids_register') }}">
                الانتقال إلى التسجيل
            </a>
        </article>

    </section>

</div>
@endsection
