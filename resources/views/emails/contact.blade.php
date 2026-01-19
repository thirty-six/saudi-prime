<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;direction:rtl;text-align:right;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" style="background:#ffffff; padding:20px; direction:rtl;">
                    <tr>
                        <td>
                            <h3 style="color:#1B4273;">استفسار / رسالة</h3>
                            <p><strong style="color:#1B4273;">الاسم: </strong> {{ $data['full_name'] }}</p>
                            <p><strong style="color:#1B4273;">رقم الجوال: </strong> {{ $data['phone'] }}</p>
                            <p><strong style="color:#1B4273;">نوع البرنامج: </strong> {{ $data['program'] }}</p>
                            <p><strong style="color:#1B4273;">نص الرسالة: </strong></p>
                            <p>{{ $data['message'] }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>