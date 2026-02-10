@extends('layouts.app')

@section('title', 'Saudi Prime | التسجيل العام')

<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
<style>
       body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        height: 100svh;
        background-image: url('../img/ev-reg.webp') !important;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top center;
    }

    @media (max-width: 768px) {
    body::before {background-image: url('../img/ev-reg.webp') !important;
    background-size: cover; 
    height: 100%;
}
}
</style>
@section('content')

    <div class="reg-wrapper">

        <h1>نموذج التسجيل العام (مسائي)</h1>

        @if(session('success'))
            <div class="reg-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('evening_register.store') }}"
              enctype="multipart/form-data"
              class="reg-form">
            @csrf

            <div class="reg-group">
                <label>الاسم الكامل *</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}">
                @error('full_name') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>رقم الجوال *</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="phone-style" placeholder="+9665XXXXXXXX">
                @error('phone') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" class="email-style" placeholder="example@example.com">
                @error('email') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>البرنامج المختار *</label>
                <select name="program">
                    <option value="">اختر</option>
                    <option value="basketball">كرة سلة</option>
                    <option value="football">كرة قدم</option>
                    <option value="volleyball">كرة طائرة</option>
                    <option value="handball">كرة يد</option>
                    <option value="swimming_free">مسبح - سباحة حرة</option>
                    <option value="swimming_learn">مسبح - تعليم سباحة</option>
                    <option value="fitness">لياقة بدنية</option>
                    <option value="cardio">كارديو</option>
                    <option value="martial_arts">ألعاب قتالية</option>
                </select>
            </div>

            <div class="reg-group">
                <label>اليوم الأول *</label>
                <select name="day_one">
                    <option value="sunday">الأحد</option>
                    <option value="monday">الاثنين</option>
                    <option value="tuesday">الثلاثاء</option>
                    <option value="wednesday">الأربعاء</option>
                    <option value="thursday">الخميس</option>
                </select>
            </div>

            <div class="reg-group">
                <label>اليوم الثاني *</label>
                <select name="day_two">
                    <option value="sunday">الأحد</option>
                    <option value="monday">الاثنين</option>
                    <option value="tuesday">الثلاثاء</option>
                    <option value="wednesday">الأربعاء</option>
                    <option value="thursday">الخميس</option>
                </select>
            </div>

            <div class="reg-group">
                <label>الوقت *</label>
                <select name="time_slot">
                    <option value="09-10">9:00 - 10:00</option>
                    <option value="10-11">10:00 - 11:00</option>
                    <option value="11-12">11:00 - 12:00</option>
                    <option value="12-13">12:00 - 1:00</option>
                </select>
            </div>

            <div class="reg-group">
                <label>طريقة الدفع *</label>
                <select name="payment_method">
                    <option value="cash">كاش</option>
                    <option value="bank">تحويل بنكي</option>
                </select>
            </div>

            <div class="reg-group full">
                <label>رفع إثبات الدفع</label>
                <input type="file" name="payment_proof">
                @error('payment_proof') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group full reg-checkbox">
                <input type="checkbox" name="accepted_terms" value="1">
                <span><a onclick="openTerms()" class="terms">أوافق على الشروط والأحكام * </a></span>
            </div>
            @error('accepted_terms') <div class="reg-error full">{{ $message }}</div> @enderror

            <button type="submit" class="reg-submit full">
                إرسال التسجيل
            </button>
        </form>
    </div>
 
    <div id="termsModal" class="modal">
  <div class="modal-content">
    <h2>الشروط والأحكام</h2>
    <p>
      باستخدامك لهذا الموقع، فإنك توافق على الشروط والأحكام الخاصة بنا.
     </p>
<span>•	الغياب لا يعوض</span>
<span>•	إمكانية إلغاء الاشتراك بعد أول حصة من طرف النادي أو الأهل</span>
<span>•	في حال عدم تقبل الطفل للبرنامج يحق للنادي إلغاء الاشتراك ويحق للأهل الانسحاب واسترجاع المبلغ</span>
<span>•	النادي غير مسؤول عن الطفل بعد انتهاء وقت الحصة</span>
<span>•	الالتزام باللبس المحدد</span>
<span>•	يمنع حضور الطفل قبل موعده أو بقائه بعده</span>
    <div class="actions">
      <button onclick="closeTerms()">اغلاق</button>
    </div>
  </div>
</div>
@endsection

<script>
  function openTerms() {
    document.getElementById("termsModal").style.display = "block";
  }

  function closeTerms() {
    document.getElementById("termsModal").style.display = "none";
  }

  function acceptTerms() {
    alert("Terms accepted!");
    closeTerms();
  }
</script>

