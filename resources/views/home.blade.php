@extends('layouts.user')

@section('title', 'Welcome')

 <link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('content')

<div class="header-wrapper prime-banner">
  <div class="gallery">
    <div class="i1 photo"></div>
    <div class="i2 photo"></div>
    <div class="i3 photo"></div>
    <div class="i4 photo"></div>
    <div class="i5 photo"></div>
    <div class="i6 photo"></div>
    <div class="i7 photo"></div>
    <div class="i8 photo"></div>
  </div>
    <h1></h1>

      <div class="blue-ring ring"></div>
      <div class="yellow-ring ring"></div>
      <div class="black-ring ring"></div>
      <div class="green-ring ring"></div>
      <div class="red-ring ring"></div>
    </div>
  </div>
</div>

<section id="hero" class="slide-section flex items-center bg-neutral-light">
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
                    Saudi Prime
                    <span class="block text-forest mt-2">
                        وجهة رياضية وخدمية متكاملة بروح عائلية
                    </span>
                </h1>

                <p class="mt-6 text-body text-neutral-dark leading-relaxed max-w-xl">
                    بوابة إلكترونية متكاملة لإدارة الاشتراكات والحضور وحجز المرافق،
                    تقدم اشتراكات صباحية للطالبات ومسائية للعامة والأطفال،
                    مع خدمات رياضية وترفيهية في بيئة منظمة وآمنة.
                </p>

                {{-- CTA --}}
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#pricing" class="btn btn-primary">
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
                    <x-heroicon-o-academic-cap class="w-8 h-8 mx-auto text-accent mb-2" />
                    <p class="font-semibold">اشتراكات الطالبات</p>
                </div>

                <div class="card card-hover text-center">
                    <x-hugeicons-user-group class="w-8 h-8 mx-auto text-accent mb-2" />
                    <p class="font-semibold">العائلات والأطفال</p>
                </div>

                <div class="card card-hover text-center">
                    <x-hugeicons-football class="w-8 h-8 mx-auto text-accent mb-2" />
                    <p class="font-semibold">حجز الملاعب</p>
                </div>

                <div class="card card-hover text-center">
                    <x-hugeicons-ticket-01 class="w-8 h-8 mx-auto text-accent mb-2" />
                    <p class="font-semibold">حجز تذاكر المدرج</p>
                </div>
            </div>


        </div>
    </div>
</section>
<section id="audience" class="py-20 bg-neutral-light">
    <div class="container mx-auto px-6">

        {{-- Section Heading --}}
        <div class="max-w-xl mb-12">
            <h2 class="text-title font-bold text-neutral-dark">
                لمن خدماتنا؟
            </h2>
            <p class="mt-3 text-body text-neutral-muted">
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
                <p class="text-small text-neutral-muted">
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
                <p class="text-small text-neutral-muted">
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
                <p class="text-small text-neutral-muted">
                    برامج رياضية وترفيهية للأطفال 4-13 سنة
                </p>
            </div>

        </div>
    </div>
</section>

{{-- <x-sections.hero /> --}}
{{-- <x-sections.stats />
<x-sections.about />
<x-sections.features />
<x-sections.programs />
<x-sections.trainers />
<x-sections.gallery />
<x-sections.faq />
<x-sections.contact /> --}}
<x-sections.pricing />

@endsection