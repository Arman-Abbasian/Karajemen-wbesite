<?php
// فرض کنید به پایگاه داده متصل شده‌اید

// دریافت داده‌ها از فرم
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
// ... بقیه فیلدها
$first_name_error='';
$last_name_error='';
$birth_date_error='';
// اعتبارسنجی داده‌ها
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

// اعتبارسنجی نام و نام خانوادگی
if (!validateName($first_name)) {
    $first_name_error= "نام کوچک باید حداقل 3 و حداکثر 50 کاراکتر باشد.";
} if (!validateName($last_name)) {
    $last_name_error= "نام خانوادگی باید حداقل 3 و حداکثر 50 کاراکتر باشد.";
} 
if (!validateBirthDate($birth_date)) {
    echo "تاریخ تولد وارد شده معتبر نیست.";
}

// اعتبارسنجی بیشتر (مثال: طول رمز عبور، فرمت ایمیل، ...)

// هش کردن رمز عبور
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// درج داده‌ها در پایگاه داده
$sql = "INSERT INTO users (first_name, last_name, birth_date, mobile_number, email, password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $first_name, $last_name, $birth_date, $mobile_number, $email, $password_hash);
$stmt->execute();



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

        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">تکرار رمز عبور:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">ثبت‌نام</button>
    </form>
</body>
</html>