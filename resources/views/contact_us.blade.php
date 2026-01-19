@extends('layouts.app')

@section('title', 'Saudi Prime')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
 <link rel="stylesheet" href="{{asset('css/contact.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


@section('content')

<section class="contact-hero">
    <div class="contact-hero-overlay"></div>

    <div class="contact-hero-content">
        <h1>{{ __(key: 'Contact Us') }}</h1>
        <p>
            خطوتك الأولى نحو تدريب احترافي تبدأ من هنا
        </p>
    </div>
</section>

<section class="contact-section">
    <div class="contact-container">

        <div class="contact-info">
            <h2>للتواصل والاستفسار</h2>
            <p>
                سواء كنت تبحث عن برامج تدريب للأطفال، أو تدريب للبالغين، أو تدريب شخصي، فإن فريقنا جاهز لمساعدتك.
            </p>

            <ul>
                <li>
                    <span>رقم الجوال</span>
                   <p style="direction:ltr;text-align: right;"> +966 50 123 4567</p>
                </li>
                <li>
                    <span>الايميل</span>
                    <p>info@saudiprime.sa</p>
                </li>
                <li>
                    <span>الموقع</span>
                   <p> الرياض - السعودية </p>
                </li>
                <li>
                    <span>أوقات العمل</span>
                   <p> السبت - الخميس | 8:00 صباحاً – 09:00 مساءاً </p>
                </li>
            </ul>
        </div>


        <div class="contact-form">
             @if(session('success'))
                <div class="alert alert-success">
                  تم ارسال الرسالة بنجاح!
                </div>
                @endif
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="full_name" autocomplete="off">
                    @error('full_name') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>رقم الجوال</label>
                    <input type="tel" name="phone" autocomplete="off" placeholder="+966 XXXXXXXXX">
                    @error('phone') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>البرامج</label>
                    <select name="program" class="select-program">
                        <option>تدريب الطالبات (صباحاً)</option>
                        <option>تدريب الأطفال (مساءاً)</option>
                        <option>تدريب البالغين (مساءاً)</option>
                        <option>حجز الملعب</option>
                    </select>
                    @error('program') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>نص الرسالة</label>
                    <textarea name="message" rows="4" autocomplete="off"></textarea>
                    @error('message') <small class="error">{{ $message }}</small> @enderror
                </div>

                <button type="submit">
                    ارسال
                </button>
            </form>
        </div>

    </div>
</section>

@endsection