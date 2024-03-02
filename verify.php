<?php
// verify.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Получаем email из формы
    $verification_code = $_POST['verification_code']; // Получаем код подтверждения из формы

    // Проверяем, существует ли файл с аккаунтами
    if (file_exists('accounts.txt')) {
        $accounts = file('accounts.txt');
        foreach ($accounts as $account) {
            list($registeredUsername, $registeredEmail, $registeredPassword, $registeredCode) = explode(',', $account);
            if ($registeredEmail == $email && trim($registeredCode) == $verification_code) {
                echo "Ваш аккаунт подтвержден!";
                // Здесь код для активации аккаунта пользователя
                exit();
            }
        }
    }

    echo "Неверный код подтверждения или email.";
}
?>
