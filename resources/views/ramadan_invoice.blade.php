<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>فاتورة التسجيل</title>

<style>
body {
    font-family: Arial;
    direction: rtl;
    background: #f4f4f4;
    padding: 40px;
}
.invoice {
    background: #fff;
    padding: 40px;
    max-width: 800px;
    margin: auto;
    border-radius: 10px;
}
h2 {
    text-align: center;
}
.section {
    margin-bottom: 15px;
}
.price {
    background: #eee;
    padding: 15px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-top: 20px;
}
button {
    margin-top: 30px;
    padding: 10px 20px;
}
@media print {
    button { display: none; }
}
</style>
</head>

<body>

<div class="invoice">

<h2>فاتورة تسجيل مخيم رمضان</h2>

<div class="section">
    <strong>رقم الفاتورة:</strong> {{ $registration->invoice_token }} <br>
    <br>
    <strong>رقم الإيصال:</strong>
    {{ $registration->receipt_number }}
    <br><br>
    <strong>تاريخ التسجيل:</strong> {{ $registration->created_at->format('Y-m-d h:i A') }}
</div>

<hr>

<div class="section">
    <strong>ولي الأمر:</strong> {{ $registration->guardian_name }} <br><br>
    <strong>الجوال:</strong><span style="direction: ltr; text-align: right;"> {{ $registration->guardian_phone }}</span>
</div>

<hr>

<div class="section">
    <strong>اسم الطفل:</strong> {{ $registration->child_name }} <br><br>
    <strong>الفئة:</strong>
    {{ $registration->age_group == 'boys' ? 'الأولاد 5-8 سنوات' : 'البنات 5-15 سنة' }}
</div>

<hr>

<div class="section">
    <strong>أيام البرنامج:</strong>
    {{ $registration->session->days->getLabel() }} <br><br>

    <strong>الوقت:</strong><span style="direction: ltr; text-align: right;">
    {{ \Carbon\Carbon::parse($registration->session->start_time)->format('h:i A') }}
    -
    {{ \Carbon\Carbon::parse($registration->session->end_time)->format('h:i A') }}
    </span>
</div>

<div class="price">
    المبلغ المطلوب: {{ $registration->price }} ريال سعودي
</div>

<center>
<strong style="margin-bottom: 10px;">
   <p> التقط صورة للشاشة أو اطبع الفاتورة</p>

<button onclick="window.print()" style="font-size: 17px;font-weight:500; cursor: pointer;">طباعة الفاتورة</button>
</strong>
</center>

</div>

</body>
</html>
