<?php
// verify_handler.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_code = $_POST["verification_code"];
    $email = $_SESSION['email']; // Email, который был использован при регистрации

    // Поиск пользователя и его кода подтверждения в файле
    $accounts = file("accounts.txt");
    foreach ($accounts as $account) {
        list($username, $registeredEmail, $password, $verification_code) = explode(",", $account);
        if ($email == $registeredEmail && trim($verification_code) == $input_code) {
            echo "Регистрация подтверждена!";
            // Здесь код для активации аккаунта пользователя
            exit();
        }
    }
    echo "Неверный код подтверждения.";
}
?>
