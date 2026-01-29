@extends('layouts.app')

@section('title', 'Saudi Prime | حجز الملعب')

 <link rel="stylesheet" href="{{asset('css/playgrond.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<section class="programs-hero banner-on-load">
        <div>
            <h1>المرافق والبرامج الرياضية</h1>
            <p class="banner-text">
               مرافق رياضية متكاملة صُممت لتوفير بيئة تدريب آمنة، منظمة، ومناسبة لمختلف الفئات
            </p>
        </div>
    </section>
<div class="seat-wrapper" dir="rtl">
    <div class="seat-card">
        <h1>حجز المقاعد</h1>
        <p class="subtitle">اختر المقاعد المطلوبة (مثل A1، A2)</p>

        <form method="POST" action="">
            @csrf

            <div class="seating-area">
                @php
                    $rows = ['A','B','C','D'];
                    $cols = 8;
                    $reserved = ['A3','B4','C2']; // مثال مقاعد محجوزة مسبقاً
                @endphp

                @foreach($rows as $row)
                    <div class="seat-row">
                        <span class="row-label">{{ $row }}</span>

                        @for($i = 1; $i <= $cols; $i++)
                            @php $seat = $row.$i; @endphp

                            <label class="seat 
                                {{ in_array($seat, $reserved) ? 'reserved' : '' }}">
                                
                                <input type="checkbox"
                                       name="seats[]"
                                       value="{{ $seat }}"
                                       {{ in_array($seat, $reserved) ? 'disabled' : '' }}>
                                <span>{{ $seat }}</span>
                            </label>
                        @endfor
                    </div>
                @endforeach
            </div>

            <button type="submit" class="submit-btn">
                تأكيد الحجز
            </button>
        </form>
    </div>
</div>
@endsection
