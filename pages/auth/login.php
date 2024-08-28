<?php
//  به پایگاه داده متصل می شوید
include "../../configs/DBConfig.php";
// متغیرهای ارور

$mobile_number_error='';
$code_error='';

if (isset($_POST['login'])) {
// دریافت داده‌ها از فرم
$mobile_number = $_POST['mobile_number'];
$code = $_POST['code'];

// توابع اعتبارسنجی

function validate_mobile_number($mobile_number) {
    // تریم کردن ورودی
    $mobile_number = trim($mobile_number);

    // بررسی طول شماره
    if (strlen($mobile_number) !== 11) {
        return false;
    }

    // بررسی شروع شماره با 09
    if (substr($mobile_number, 0, 2) !== '09') {
        return false;
    }

    // بررسی اینکه تمام کاراکترها عدد باشند
    if (!is_numeric($mobile_number)) {
        return false;
    }

    return true;
}
function validate_code($code) {
    // تریم کردن ورودی
    $code = trim($code);
    // بررسی طول رمز عبور
    if (strlen($code) != 6) {
        return false;
    }

    // بررسی وجود حداقل یک حرف و یک عدد
    if (!preg_match('/[0-9]/', $code)) {
        return false;
    }

    return true;
}


// اعتبارسنجی شماره موبایل
if (!validate_mobile_number($mobile_number)) {
    $mobile_number_error= "شماره موبایل وارد شده معتبر نیست.";
}
// اعتبارسنجی کد 
if (!validate_code($code)) {
    $code_error= "کد وارد شده معتبر نیست.";
}

if(empty($mobile_number_error) && empty($code_error)){
    $user = $db->prepare("SELECT * FROM users WHERE mobile_number=:mobile_number");
    echo $mobile_number;
        $user->execute(['mobile_number' => $mobile_number]);
    var_dump($user);
    if($user->rowCount()==1){
        print_r($user['code']);
    }else{
        echo "yes";
        header("Location:login.php?msg=کاربری با این شماره موبایل موجود نیست؛ لطفا ابتدا ثبت نام کنید");
    }
// تنظیم Zone زمانی به تهران
date_default_timezone_set('Asia/Tehran');
// تاریخ انقضا را یک دقیقه بعد از زمان حال تنظیم می‌کنیم
$time = time();
// تاریخ انقضا را به فرمت TIMESTAMP تبدیل می‌کنیم
$expire_date = date('Y-m-d H:i:s', $expire_time);
}

}

?>

<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <title>فرم ورود</title>
</head>
<body>
    <h2>فرم  ورود</h2>
    <form action="login.php" method="post">
       
<div>
        <label for="mobile_number">شماره موبایل:</label>
        <input type="tel" id="mobile_number" name="mobile_number" pattern="[0-9]{11}">
        <p ><?= $mobile_number_error ?></p>
</div>

<div>
        <label for="code">رمز عبور:</label>
        <input type="code" id="code" name="code">
        <p ><?= $code_error ?></p>
</div>

        <button type="submit" name='login'>ورود</button>
    </form>
</body>
</html>