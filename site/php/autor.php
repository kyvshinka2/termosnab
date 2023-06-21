<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
// хеширование пароля
$hash = password_hash($password, PASSWORD_DEFAULT);

// проверка на пустые поля 
if(empty($login) || empty($password)) {
    echo "Не оставляйте пустые поля!";
    exit();
}

// подключение к бд
$mysql = new mysqli('localhost', 'root', '', 'termosnab');
$mysql->set_charset('utf8');
if($mysql->connect_error){
    die("Ошибка: " . $mysql->connect_error);
}

// обратное хеширование для проверки пароля
// $newPass = password_verify($password, $hash);
// $query ="SELECT * FROM `Student` WHERE `Log_In` = '$login' AND `Password` = '$newPass'";

$query = "SELECT `Log_In`, `Password` FROM Client WHERE Client.Log_In = '$login'";
// выполнение запроса
$result = $mysql->query($query);

if($result) {
    foreach($result as $row) {
        $proverka_password = $row["Password"];
        // проверка хешированного пароля
        if(password_verify($password, $proverka_password)) {
            echo session_id(); 
            $_SESSION ['name']= $login;
            header('Location: ./profile.php');
        } else {
            echo "Пароль неверный";
        }
    }
}

$mysql->close();
?>