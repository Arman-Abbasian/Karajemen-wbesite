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
    if (strlen($code) != 8) {
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
if (!validate_password($password)) {
    $code_error= "کد وارد شده معتبر نیست.";
}

if(empty($mobile_number_error) && empty($code_error)){
    $user = $db->prepare("SELECT * FROM users WHERE mobile_number=:mobile_number");
        $user->execute([' mobile_number' => $mobile_number]);
    if($user->rowCount()==1){
        die("found")
    }else{
        die("not found")
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
    <title>فرم ثبت‌ نام</title>
</head>
<body>
    <h2>فرم ثبت‌ نام</h2>
    <form action="signup.php" method="post">
        <div>
        <label for="first_name">نام:</label>
        <input type="text" id="first_name" name="first_name">
        <p ><?= $first_name_error ?></p>
        </div>

        <div>
        <label for="last_name">نام خانوادگی:</label>
        <input type="text" id="last_name" name="last_name">
        <p ><?= $last_name_error ?></p>
</div>


<div>
        <label for="birth_date">تاریخ تولد:</label>
        <input type="date" id="birth_date" name="birth_date">
        <p ><?= $birth_date_error ?></p>
</div>
<div>
        <label for="mobile_number">شماره موبایل:</label>
        <input type="tel" id="mobile_number" name="mobile_number" pattern="[0-9]{11}">
        <p ><?= $mobile_number_error ?></p>
</div>

<div>
        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password">
        <p ><?= $password_error ?></p>
</div>
<div>

        <label for="confirm_password">تکرار رمز عبور:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <p ><?= $confirm_password_error ?></p>
</div>

        <button type="submit" name='signup'>ثبت‌ نام</button>
    </form>
</body>
</html>