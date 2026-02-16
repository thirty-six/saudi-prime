<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>فاتورة تسجيل مخيم رمضان</title>
</head>

<style>
    p{
        text-align: right;
        direction: rtl;
    }
</style>
<body style="
    margin:0;
    padding:0;
    background-color:#f3f4f6;
    font-family:Tahoma, Arial, sans-serif;
    direction:rtl;
    text-align:right;
">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="
    background:#ffffff;
    border-radius:8px;
    padding:25px;
">

<tr>
<td style="text-align:right;">

<h2 style="margin-top:0; color:#1f2937;">
فاتورة تسجيل مخيم رمضان
</h2>

<p>
<strong>رقم الفاتورة:</strong>
{{ $registration->invoice_token }}
</p>

<p>
<strong>رقم الإيصال:</strong>
{{ $registration->receipt_number }}
</p>

<p>
<strong>اسم الطفل:</strong>
{{ $registration->child_name }}
</p>

<p>
<strong>ولي الأمر:</strong>
{{ $registration->guardian_name }}
</p>

<p>
<strong>أيام الجلسة:</strong>
{{ $registration->session->days->getLabel() }}
</p>

<p>
<strong>الوقت:</strong>
{{ \Carbon\Carbon::parse($registration->session->start_time)->format('h:i A') }}
-
{{ \Carbon\Carbon::parse($registration->session->end_time)->format('h:i A') }}
</p>

<p>
<strong>المبلغ:</strong>
{{ number_format($registration->price, 2) }} ريال
</p>

<p>
<strong>تاريخ التسجيل:</strong>
{{ $registration->created_at->format('Y-m-d h:i A') }}
</p>

<hr style="margin:20px 0;">

<p style="color:#6b7280;">
نشكر ثقتكم بنا ونتمنى لطفلكم تجربة ممتعة وآمنة 🌙
</p>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
