<?php
// registration_handler.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // В реальном приложении пароль должен быть захеширован

    // Проверка валидности электронной почты
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Неверный формат электронной почты");
    }

    // Проверка, зарегистрирован ли уже этот email
    if (file_exists("accounts.txt")) {
        $accounts = file_get_contents("accounts.txt");
        if (strpos($accounts, $email) !== false) {
            die("Этот email уже зарегистрирован");
        }
    }

    // Генерация и отправка кода подтверждения
    $verification_code = rand(100000, 999999);
    mail($email, "Код подтверждения", "Ваш код подтверждения: $verification_code");

    // Сохранение данных пользователя
    $file = fopen("accounts.txt", "a");
    fwrite($file, "$username,$email,$password,$verification_code\n");
    fclose($file);

    // Перенаправление на страницу подтверждения
    header("Location: verify.php");
    exit();
}
?>
