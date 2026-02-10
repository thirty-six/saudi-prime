@extends('layouts.app')

@section('title', 'Saudi Prime | تسجيل الأطفال')

<link rel="stylesheet" href="{{ asset('css/registration.css') }}">

<style>

    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    height: 100svh;
    background-image: url('../img/kids_sports.webp') !important;

}
@media (max-width: 768px) {
    body::before {background-image: url('../img/kids_mobile.webp') !important;
    background-size: cover; 
    height: 100%;
}
}
</style>

@section('content')

    <div class="reg-wrapper">

        <h1>نموذج تسجيل الأطفال (مسائي)</h1>

        @if(session('success'))
            <div class="reg-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('kids_register.store') }}"
              enctype="multipart/form-data"
              class="reg-form">
            @csrf

           
            <div class="reg-group">
                <label>اسم ولي الأمر *</label>
                <input type="text" name="guardian_name" value="{{ old('guardian_name') }}">
                @error('guardian_name') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>رقم جوال ولي الأمر *</label>
                <input type="text" name="guardian_phone" value="{{ old('guardian_phone') }}" placeholder="+9665XXXXXXXX" class="phone-style">
                @error('guardian_phone') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>بريد ولي الأمر</label>
                <input type="email" name="guardian_email" value="{{ old('guardian_email') }}" class="email-style" placeholder="example@example.com">
                @error('guardian_email') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

         
            <div class="reg-group">
                <label>اسم الطفل *</label>
                <input type="text" name="child_name" value="{{ old('child_name') }}">
                @error('child_name') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>تاريخ ميلاد الطفل *</label>
                <input type="date" name="child_dob" value="{{ old('child_dob') }}">
                @error('child_dob') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>الفئة العمرية *</label>
                <select name="age_group">
                    <option value="">اختر</option>
                    <option value="4-8">4-8 سنوات</option>
                    <option value="9-13">9-13 سنة</option>
                </select>
                @error('age_group') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

        
            <div class="reg-group">
                <label>البرنامج المختار *</label>
                <select name="program">
                    <option value="">اختر</option>
                    <option value="basketball">كرة سلة (600 ريال)</option>
                    <option value="football">كرة قدم (600 ريال)</option>
                    <option value="martial">ألعاب قتالية (600 ريال)</option>
                    <option value="gymnastics">جمباز (600 ريال)</option>
                    <option value="fitness">لياقة بدنية (600 ريال)</option>
                    <option value="swimming_learn">تعليم سباحة (1000 ريال)</option>
                    <option value="swimming_free">سباحة حرة (500 ريال)</option>
                </select>
                @error('program') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            
            <div class="reg-group">
                <label>المجموعة *</label>
                <select name="group_type">
                    <option value="">اختر</option>
                    <option value="A">المجموعة أ (سبت - اثنين - أربعاء)</option>
                    <option value="B">المجموعة ب (أحد - ثلاثاء - خميس)</option>
                </select>
                @error('group_type') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>وقت الحصة *</label>
                <select name="session_time">
                    <option value="">اختر</option>
                    <option value="4-6">4:00 - 6:00 م</option>
                    <option value="6-8">6:00 - 8:00 م</option>
                </select>
                @error('session_time') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>نوع الاشتراك *</label>
                <select name="subscription_type">
                    <option value="">اختر</option>
                    <option value="monthly">شهري (12 حصة)</option>
                    <option value="daily">دخول باليوم (115 ريال)</option>
                </select>
                @error('subscription_type') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group">
                <label>طريقة الدفع *</label>
                <select name="payment_method">
                    <option value="">اختر</option>
                    <option value="cash">كاش</option>
                    <option value="bank">تحويل بنكي</option>
                </select>
                @error('payment_method') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group full">
                <label>رفع إثبات الدفع </label>
                <input type="file" name="payment_proof">
                @error('payment_proof') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group full">
                <label>رفع موافقة ولي الأمر</label>
                <input type="file" name="guardian_approval">
                @error('guardian_approval') <div class="reg-error">{{ $message }}</div> @enderror
            </div>

            <div class="reg-group full reg-checkbox">
                <input type="checkbox" name="accepted_terms" value="1" id="myCheckbox">
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
