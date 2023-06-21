<?php
// Удаляет все лишнее и записываем значение в переменную
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

// проверка на пустые поля
if(empty($login) || empty($password)) {
    echo "Не оставляйте пустые поля!";
    exit();
}

// проверка на наличие пробелов
if(stristr($login," ")) {
    echo "Логин содержит пробельные символы, уберите их";
    exit();
}

if(stristr($login," ")) {
    echo "Пароль содержит пробельные символы, уберите их";
    exit();
}

// проверка длин строк
if (mb_strlen($login) > 20) {
    echo "Недопустимая длина логина (от 5 до 20 символов)";
    // после этой строчки код не будет работать дальше
} else if (mb_strlen($password) > 25) {
    echo "Недопустимая длина пароля (от 5 до 25 символов)";
    exit();
}

// хеширование пароля
$hash = password_hash($password, PASSWORD_DEFAULT);
// var_dump($hash); 

// подключение к бд
$mysql = new mysqli('localhost', 'root', '', 'termosnab');
$mysql->set_charset('utf8');
if($mysql->connect_error){
    die("Ошибка: " . $mysql->connect_error);
    exit();
} else {
    echo "Успешное подключение <br>";
}

// проверка логина на совпадение данных
$proverka = "SELECT count(Log_In) as users FROM `Client` WHERE `Log_In` = '$login';";
$res = $mysql->query($proverka);
// Получение строки результирующей таблицы в виде массива
$row = $res->fetch_row();
$count = $row[0];
// выполнение запроса
if($count) {
    echo "Данный логин уже есть, придумайте другой";
    exit();
} else {
    echo "такого пользователя нет";

    $query = "INSERT INTO Client (`Log_In`, `Password`) VALUES ('$login', '$hash')";
    if($mysql->query($query) === TRUE){
       echo "Данные успешно добавлены";
    } else{
       echo "Ошибка: ";
    }
}


$mysql->close();

// переход на страницу с авторизацией
header('Location: ../page/autor.html');

// прекращение выполнения кода
exit();
?>