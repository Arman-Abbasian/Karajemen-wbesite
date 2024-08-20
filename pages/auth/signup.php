<?php
//  به پایگاه داده متصل می شوید
include "../../configs/DBConfig.php";

if (isset($_POST['signup'])) {
// دریافت داده‌ها از فرم
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birth_date = $_POST['birth_date'];
$mobile_number = $_POST['mobile_number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
// متغیرهای ارور
$first_name_error='';
$last_name_error='';
$birth_date_error='';
$mobile_number_error='';
$password_error='';
$confirm_password_error='';
// توابع اعتبارسنجی
function validateName($name) {
    // تریم کردن ورودی
    $name = trim($name);
    // بررسی طول نام
    if (strlen($name) < 3 || strlen($name) > 50) {
        return false;
    }
    return true;
};
function validateBirthDate($birthDate) {
    // بررسی اینکه آیا تاریخ وارد شده خالی است یا خیر
    if (empty($birthDate)) {
        return false;
    }

    // بررسی فرمت تاریخ (اینجا از فرمت YYYY-MM-DD استفاده شده است)
    $dateParts = explode('-', $birthDate);
    if (count($dateParts) !== 3) {
        return false;
    }

    // بررسی اینکه آیا هر بخش تاریخ عددی است یا خیر
    if (!is_numeric($dateParts[0]) || !is_numeric($dateParts[1]) || !is_numeric($dateParts[2])) {
        return false;
    }

    // بررسی اینکه آیا تاریخ وارد شده معتبر است یا خیر
    if (!checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
        return false;
    }

    return true;
}
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
function validate_password($password) {
    // تریم کردن ورودی
    $password = trim($password);

    // بررسی طول رمز عبور
    if (strlen($password) < 8) {
        return false;
    }

    // بررسی وجود حداقل یک حرف و یک عدد
    if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        return false;
    }

    return true;
}
function validate_confirm_password($password, $confirm_password) {
    return $password === $confirm_password;
}

// اعتبارسنجی نام و نام خانوادگی
if (!validateName($first_name)) {
    $first_name_error= "نام کوچک باید حداقل 3 و حداکثر 50 کاراکتر باشد.";
    // اعتبارسنجی نام و نام خانوادگی
} if (!validateName($last_name)) {
    $last_name_error= "نام خانوادگی باید حداقل 3 و حداکثر 50 کاراکتر باشد.";
} 
// اعتبارسنجی نام و نام خانوادگی
if (!validateBirthDate($birth_date)) {
    $birth_date_error= "تاریخ تولد وارد شده معتبر نیست.";
}
// اعتبارسنجی شماره موبایل
if (!validate_mobile_number($mobile_number)) {
    $mobile_number_error= "شماره موبایل وارد شده معتبر نیست.";
}
// اعتبارسنجی پسوورد 
if (!validate_password($password)) {
    $password_error= "شماره موبایل وارد شده معتبر نیست.";
}
if (!validate_confirm_password($password,$confirm_password)) {
    $confirm_password_error= "تکرار پسوورد با پسوورد یکسان نیست.";
}

if(empty($first_name_error) && empty($last_name_error) && empty($birth_date_error) && empty($mobile_number_error) && 
empty($password_error) && empty($confirm_password_error)){
    // هش کردن رمز عبور
$password_hash = password_hash($password, PASSWORD_DEFAULT);
//تولید کد
$code=mt_rand(100000, 999999);
// درج داده‌ها در پایگاه داده
$userInsert=$db->prepare("INSERT INTO posts (first_name, last_name, birth_date, mobile_number, password, code) VALUES
 (:first_name, :last_name, :birth_date, :mobile_number, :password)");
$postInsert->execute(['first_name' => $first_name, 'last_name' => $last_name, 'birth_date' => $birth_date, 
'mobile_number' => $mobile_number, 'password' => $password,'code'=>$code]);
header("Location:login.php");
exit();
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>فرم ثبت‌ نام</title>
</head>
<body>
    <h2>فرم ثبت‌ نام</h2>
    <form action="register.php" method="post">
        <label for="first_name">نام:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">نام خانوادگی:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="birth_date">تاریخ تولد:</label>
        <input type="date" id="birth_date" name="birth_date" required>

        <label for="mobile_number">شماره موبایل:</label>
        <input type="tel" id="mobile_number" name="mobile_number" pattern="[0-9]{11}" required>

        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">تکرار رمز عبور:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" name='signup'>ثبت‌ نام</button>
    </form>
</body>
</html>