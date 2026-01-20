@extends('layouts.app')

@section('title', 'المرافق والبرامج الرياضية')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
 <link rel="stylesheet" href="{{asset('css/program.css')}}">

@section('content')

<section class="programs-hero banner-on-load">
        <div>
            <h1>المرافق والبرامج الرياضية</h1>
            <p class="banner-text">
               مرافق رياضية متكاملة صُممت لتوفير بيئة تدريب آمنة، منظمة، ومناسبة لمختلف الفئات
            </p>
        </div>
    </section>

<!-- FACILITIES -->
<section class="fs-section animate-on-load">
    <div class="fs-container">

        <div class="fs-header">
            <h2>مرافقنا</h2>
            <p class="font-semibold section-text-under">بطاقات تعريفية بالمرافق المتاحة مع خيارات الاشتراك المناسبة</p>
        </div>

        <div class="fs-grid animate-on-load">

            <!-- Swimming Pool -->
            <div class="fs-card">
                <img src="{{ asset('img/swimming_pool.webp') }}" alt="المسبح">
                <div class="fs-card-body">
                    <h3>المسبح</h3>
                    <p>
                        مسبح مجهز للتدريب والأنشطة المائية وفق أعلى معايير السلامة.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

            <!-- Football Field -->
            <div class="fs-card">
                <img src="{{ asset('img/football_stad.webp') }}" alt="ملعب كرة قدم">
                <div class="fs-card-body">
                    <h3>ملعب كرة قدم</h3>
                    <p>
                        ملعب مخصص للتدريب الجماعي والمباريات وفق تنظيم احترافي.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

            <!-- Multi Hall -->
            <div class="fs-card">
                <img src="{{ asset('img/hall.webp') }}" alt="الصالة متعددة الاستخدامات">
                <div class="fs-card-body">
                    <h3>الصالة متعددة الاستخدامات</h3>
                    <p>
                        مساحة مرنة تناسب مختلف الأنشطة الرياضية والفعاليات.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

            <!-- Gymnastics -->
            <div class="fs-card">
                <img src="{{ asset('img/gymnastics.webp') }}" alt="صالة الجمباز">
                <div class="fs-card-body">
                    <h3>صالة الجمباز</h3>
                    <p>
                        صالة مخصصة لتنمية المرونة والتوازن والمهارات الحركية.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

            <!-- Taekwondo -->
            <div class="fs-card">
                <img src="{{ asset('img/tak.webp') }}" alt="صالة التايكواندو">
                <div class="fs-card-body">
                    <h3>صالة التايكواندو</h3>
                    <p>
                        بيئة تدريب آمنة لرياضات الدفاع عن النفس بإشراف متخصصين.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

            <!-- Stand -->
            <div class="fs-card">
                <img src="{{ asset('img/grandstand.webp') }}" alt="المدرج">
                <div class="fs-card-body">
                    <h3>المدرج</h3>
                    <p>
                        مدرج مخصص للمتابعة، الفعاليات، والأنشطة الجماهيرية.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn primary full">عرض التفاصيل</a>
                    </div>
                </div>
            </div>

            <!-- Fitness Rooms -->
            <div class="fs-card">
                <img src="{{ asset('img/sport_hall.webp') }}" alt="غرف اللياقة البدنية">
                <div class="fs-card-body">
                    <h3>غرف اللياقة البدنية</h3>
                    <p>
                        غرف مجهزة بأدوات حديثة لتحسين اللياقة والصحة العامة.
                    </p>

                    <div class="fs-actions">
                        <a href="#" class="btn outline">اشتراك صباحي</a>
                        <a href="#" class="btn primary">اشتراك مسائي</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
