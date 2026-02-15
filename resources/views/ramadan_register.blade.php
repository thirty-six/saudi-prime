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
        width: 100%;
        background-image: url('../img/kids_sports.webp') !important;
        background-size: cover;
        z-index: -1;
    }

   

    @media (max-width: 768px) {
        body::before {
            background-image: url('../img/kids_mobile.webp') !important;
        }
    }
</style>

@section('content')

<div class="reg-wrapper">

    <h1>نموذج تسجيل مخيم رمضان</h1>

    @if(session('success'))
        <div class="reg-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('ramadan_register.store') }}"
          class="reg-form">
        @csrf

        {{-- Guardian --}}
        <div class="reg-group">
            <label>اسم ولي الأمر *</label>
            <input type="text" name="guardian_name"
                   value="{{ old('guardian_name') }}" autocomplete="off">
            @error('guardian_name')
                <div class="reg-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="reg-group">
            <label>رقم جوال ولي الأمر *</label>
            <input type="text" name="guardian_phone"
                   value="{{ old('guardian_phone') }}" placeholder="+9665XXXXXXXX" class="phone-style" autocomplete="off">
            @error('guardian_phone')
                <div class="reg-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="reg-group">
            <label>بريد ولي الأمر</label>
            <input type="email" name="guardian_email"
                   value="{{ old('guardian_email') }}" autocomplete="off" placeholder="example@example.com" class="email-style">
        </div>

        {{-- Child --}}
        <div class="reg-group">
            <label>اسم الطفل *</label>
            <input type="text" name="child_name"
                   value="{{ old('child_name') }}" autocomplete="off">
            @error('child_name')
                <div class="reg-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="reg-group">
            <label>تاريخ ميلاد الطفل *</label>
            <input type="date" name="child_dob"
                   value="{{ old('child_dob') }}">
            @error('child_dob')
                <div class="reg-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Age Group --}}
        <div class="reg-group">
            <label>الفئة العمرية *</label>
            <select name="age_group">
                <option value="">اختر</option>
                <option value="boys" {{ old('age_group')=='boys'?'selected':'' }}>
                    الأولاد 5-8 سنوات
                </option>
                <option value="girls" {{ old('age_group')=='girls'?'selected':'' }}>
                    البنات 5-15 سنة
                </option>
            </select>
            @error('age_group')
                <div class="reg-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- اختيار الأيام --}}
<div class="reg-group">
    <label>اختر أيام البرنامج *</label>
    <select id="daysSelect">
        <option value="">اختر</option>
        @foreach($days as $day)
            <option value="{{ $day['value'] }}">
                {{ $day['label'] }}
            </option>
        @endforeach
    </select>
</div>

      {{-- اختيار الوقت --}}
<div class="reg-group">
    <label>اختر الوقت *</label>
    <select name="ramadan_session_id" id="timeSelect">
        <option value="">اختر</option>
    </select>
</div>

{{-- عرض السعر --}}
<div class="reg-group">
    <label>السعر</label>
    <input type="text" id="priceDisplay" readonly>
</div>
        {{-- Payment --}}
        <div class="reg-group">
            <label>طريقة الدفع *</label>
            <select name="payment_method">
                <option value="">اختر</option>
                <option value="cash" {{ old('payment_method')=='cash'?'selected':'' }}>
                    كاش
                </option>
            </select>
                    <span>ملاحظة : الدفع كاش بمعنى انك تستطيع الدفع بداخل المركز كاش او فيزا او تحويل بنكي</span>
        </div>

            {{-- التصوير --}}
<div class="reg-group full">
    <label>التصوير والنشر</label>

    <div>
        <input type="radio" name="media_consent" value="agree"
               {{ old('media_consent')=='agree'?'checked':'' }}>
        <span>أوافق على تصوير طفلي ونشر صوره في حسابات التواصل الاجتماعي الخاصة بالنادي.</span>
    </div>

    <div>
        <input type="radio" name="media_consent" value="refuse"
               {{ old('media_consent')=='refuse'?'checked':'' }}>
        <span>لا أوافق على تصوير طفلي أو نشر صوره لأي سبب كان.</span>
    </div>

       @error('media_consent')
        <div class="reg-error">{{ $message }}</div>
       @enderror
     </div>

        {{-- Terms --}}
        <div class="reg-group full reg-checkbox">
            <input type="checkbox"
                   name="accepted_terms"
                   value="1"
                   {{ old('accepted_terms')?'checked':'' }}>
            <span>
                <a onclick="openTerms()" class="terms">
                    أوافق على الشروط والأحكام *
                </a>
            </span>
        </div>
    

        @error('accepted_terms')
            <div class="reg-error full">{{ $message }}</div>
        @enderror

        <button type="submit" class="reg-submit full">
            إرسال التسجيل
        </button>

    </form>
</div>

<div id="termsModal" class="modal">
  <div class="modal-content">
    <h2>الشروط والأحكام</h2>
    <p>
      باستخدامك لهذا الموقع، فإنك توافق على الشروط والأحكام الخاصة بنا لتسجيل الأطفال في النادي
     </p>
    <span>بإكمالكم لعملية التسجيل وسداد الرسوم، يعتبر ذلك موافقة نهائية وملزمة على البنود والشروط التالية:</span>

<span>1. الفئات العمرية المسموح بها</span>
<span>• الإناث: من عمر 5 سنوات حتى 15 سنة.</span>
<span>• الذكور: من عمر 5 سنوات حتى 8 سنوات فقط.</span>

<span>2. الأوقات والالتزام</span>
<span>• مدة التواجد: مدة الاشتراك اليومي هي ساعتان فقط تبدأ من وقت تسجيل دخول الطفل للنادي.</span>
<span>• سياسة الاستلام: يُرجى الالتزام التام بموعد الاستلام المحدد. في حال تأخر الأهل لأكثر من 15 دقيقة، سيتم احتساب رسوم إضافية عن كل ساعة تأخير.</span>
<span>• دخول المرافقين: يُمنع دخول الأهالي لمنطقة الأنشطة واللعب لضمان انسيابية البرنامج وتركيز الأطفال، ويقتصر تواجد الأهل في منطقة الاستقبال فقط.</span>

<span>3. سياسة الرسوم والاسترداد</span>
<span>• قيمة الاشتراك الكامل: تبلغ رسوم الاشتراك 950 ريالاً سعودياً.</span>
<span>• عدم الاسترداد أو التعويض: الرسوم المدفوعة غير مستردة نهائياً، كما لا يوجد تعويض (أيام بديلة) في حال غياب الطفل عن الدوام.</span>
<span>• اليوم التجريبي: تكلفته 115 ريالاً. وفي حال الاستمرار والتحويل للاشتراك الكامل، يتم خصم هذا المبلغ من الإجمالي (ليصبح المبلغ المتبقي للسداد 835 ريالاً).</span>
<span>• حق الإلغاء الإداري: يحق لإدارة النادي إلغاء عضوية الطفل بعد اليوم الأول في حال عدم تأقلمه مع الأنظمة، وفي هذه الحالة فقط يتم خصم قيمة يوم واحد (115 ريالاً) واسترجاع باقي المبلغ للأهل.</span>

<span>4. الأجهزة الإلكترونية والمقتنيات</span>
<span>• منع الأجهزة: يُمنع منعاً باتاً استخدام أجهزة الموبايل أو الأجهزة الإلكترونية داخل النادي.</span>
<span>• قسم الأمانات: في حال إحضار الطفل لهاتفه الخاص، يجب تسليمه فور الدخول لموظف الاستقبال لوضعه في قسم الأمانات، ويتم استلامه عند المغادرة.</span>
<span>• المسؤولية: النادي غير مسؤول عن فقدان أو تلف أي مقتنيات ثمينة (ساعات، مجوهرات) يتم إحضارها.</span>

<span>5. الصحة والسلامة العامة</span>
<span>• الإفصاح الصحي: يجب إبلاغ الإدارة عن أي حالات صحية خاصة، حساسية، أو احتياجات معينة للطفل عند التسجيل.</span>
<span>• الحالات المرضية: نعتذر عن استقبال أي طفل تظهر عليه أعراض مرضية حفاظاً على سلامة الجميع.</span>
<span>• الطوارئ: في حال حدوث أي طارئ لا قدر الله، سيتم التواصل مع الأهل فوراً لاتخاذ الإجراءات اللازمة.</span>

<span>6. المظهر العام والسلوك</span>
<span>• الزي الرسمي: يجب حضور الطفل بملابس رياضية مريحة وسهلة الحركة مع حذاء رياضي مناسب.</span>
<span>• قواعد السلوك: يحق للنادي اتخاذ الإجراء المناسب في حال صدور سلوك عدواني متكرر من الطفل تجاه زملائه أو الكادر التدريبي.</span>

<span>أقر أنا ولي الأمر بأنني قرأت كافة الشروط والأحكام المذكورة أعلاه وأوافق عليها تماماً.</span>

    <div class="actions">
      <button onclick="closeTerms()">اغلاق</button>
    </div>
  </div>
</div>

<script>
const sessions = @json($sessions);

const daysSelect = document.getElementById('daysSelect');
const timeSelect = document.getElementById('timeSelect');
const priceDisplay = document.getElementById('priceDisplay');

daysSelect.addEventListener('change', function () {

    const selectedDay = this.value;

    timeSelect.innerHTML = '<option value="">اختر</option>';
    priceDisplay.value = '';

    if (!selectedDay) return;

    const filtered = sessions.filter(s => s.days === selectedDay);

    filtered.forEach(session => {

        const option = document.createElement('option');

        const start = new Date('1970-01-01T' + session.start_time);
        const end = new Date('1970-01-01T' + session.end_time);

        const startFormatted = start.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute:'2-digit'
        });

        const endFormatted = end.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute:'2-digit'
        });

        option.value = session.id;
        option.textContent = startFormatted + ' - ' + endFormatted;
        option.dataset.price = session.price;

        timeSelect.appendChild(option);
    });

});

timeSelect.addEventListener('change', function () {

    const selectedOption = this.options[this.selectedIndex];

    if (selectedOption.dataset.price) {
        priceDisplay.value = selectedOption.dataset.price + ' ريال';
    } else {
        priceDisplay.value = '';
    }

});
</script>


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

