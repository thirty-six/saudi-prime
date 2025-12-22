<section class="relative h-screen snap-start flex items-center justify-center text-center 
    text-white bg-cover bg-center"
    style="background-image: url({{ asset('/img/stadium.jpeg') }});">

    <div class="absolute inset-0 bg-deep/75"></div>

    <div class="relative z-10 px-spacing-app-md">
        <img src="{{ asset('img/logo-temp.png') }}" alt="{{ config('app.name') }} Logo" class="inline-block h-16 ml-2 align-middle"/>
        <h1 class="text-display font-bold mb-spacing-app-md">سعودي برايم</h1>
        <h2 class="text-title mb-spacing-app-sm">نادي رياضي نسائي</h2>
        <p class="text-body mb-spacing-app-lg">
            نادي متكامل داخل الكلية – برامج رياضية لجميع الفئات
        </p>

        <a class="btn btn-primary mt-app-lg">
            سجلي الآن 
        </a>
    </div>

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 animate-bounce">
        <span class="text-3xl opacity-60">
            <x-heroicon-c-arrow-down-circle class="size-10"/>
        </span>
    </div>
</section>
{{-- <section class="bg-sand text-deep py-spacing-app-xl text-center">
    <div class="max-w-size-container mx-auto px-spacing-app-md">

        <img src="/images/logo-temp.jpg" class="w-40 mx-auto mb-spacing-app-md" alt="Logo"/>

        <h1 class="text-display font-bold mb-spacing-app-md">سعودي برايم</h1>
        <h2 class="text-title mb-spacing-app-sm">نادي رياضي نسائي 🏋️‍♀️</h2>
        <p class="text-body mb-spacing-app-lg">
            مرحباً بك في نادي سعودي برايم داخل الكلية – برامج رياضية متنوعة لجميع الأعمار
        </p>
        
        <a class="bg-deep hover:bg-forest text-white px-spacing-app-lg py-spacing-app-sm 
            rounded-md inline-block">
            سجلي الآن
        </a>

    </div>
</section> --}}
