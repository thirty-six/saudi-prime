@extends('layouts.app')

@section('title', 'Saudi Prime | نبذة عنا')
 <link rel="stylesheet" href="{{asset('css/about.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<section class="about-hero banner-on-load">
        <div>
            <h1>امتلك الملعب</h1>
            <p class="banner-text">
                مهارة، سرعة، ثقة
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container about-grid">
            <div class="about-text right-grid">
                <h2>نبذة عنا</h2>
                <p>
                     مركز رياضي وترفيهي وخدمي يقع داخل الكلية التقنية للبنات، ويقدم خدمات متكاملة لجميع فئات المجتمع تحت شعار سعودي برايم وجهة عائلية … بروح رياضية. يشمل ذلك الاشتراكات الصباحية للطالبات، والاشتراكات المسائية للعامة والأطفال، بالإضافة إلى خدمات حجز الملاعب والمدرج، الصالون، الحضانة، والدعم والخدمات الإضافية. 
                </p>
                <p>
                    يهدف الموقع إلى تقديم بوابة إلكترونية متطورة تسهل إدارة الاشتراكات والحضور، وتوفر حجز المرافق، وجداول الأطفال، وتصنيف الفئات العمرية، وشروط الرياضة، والصلاحيات، والمدفوعات، والتذاكر، والخصومات، وسياسة الخصوصية، ورفع الإيصالات، وإدارة التشغيل والطاقة الاستيعابية.
                </p>
            </div>

            <div class="about-image left-grid">
                <img src="{{ asset('img/stadium_about.webp') }}" alt="Training Session">
            </div>
        </div>
    </section>

    <section class="section values animate-on-load">
        <div class="container">
        
            <div class="values-grid">
                <div class="arrow_box box_one">
                  <p class="logo_text"><i class="fa fa-map-marker"></i> داخل الكلية التقنية للبنات</p>
                </div>

                <div class="arrow_box box_one">
                  <p class="logo_text"><i class="fa fa-users"></i> وجهة عائلية متكاملة</p>
                </div>

                <div class="arrow_box box_one">
                  <p class="logo_text"><i class="fa fa-credit-card"></i> اشتراكات مرنة وخدمات متعددة</p>
                </div>
        </div>
    </section>

    <section class="section stats animate-on-load">
        <div class="container stats-grid">
            <div class="stat">
            <h4 class="counter" data-target="10">0</h4>
            <span class="stat-label">سنوات الخبرة</span>
        </div>

        <div class="stat">
            <h4 class="counter" data-target="200">0</h4>
            <span class="stat-label">رياضيون تم تدريبهم</span>
        </div>

        <div class="stat">
            <h4 class="counter" data-target="20">0</h4>
            <span class="stat-label">مدربون محترفون</span>
        </div>

        <div class="stat">
            <h4 class="counter" data-target="10">0</h4>
            <span class="stat-label">البرامج التدريبية</span>
        </div>
        </div>
    </section>
@endsection

<script>
document.addEventListener("DOMContentLoaded", () => {

    const counters = document.querySelectorAll(".counter");

    const animateCounter = (counter) => {
        const target = +counter.dataset.target;
        const duration = 1800;
        const startTime = performance.now();

        const update = (time) => {
            const progress = Math.min((time - startTime) / duration, 1);
            counter.textContent = Math.floor(progress * target);

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                counter.textContent = target;
            }
        };

        requestAnimationFrame(update);
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target); // run once
            }
        });
    }, { threshold: 0.6 });

    counters.forEach(counter => observer.observe(counter));
});
</script>



