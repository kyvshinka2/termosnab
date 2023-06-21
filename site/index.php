<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Термоснаб - Главная страница</title>
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/carkas.css">
</head>
<body>
    <div class="div-logo">
        <img title="Термоснаб" src="./img/logotype.png">
    </div>
    <header>
        <nav>
            <a href="https://yandex.ru/maps/56/chelyabinsk/house/kozhzavodskaya_ulitsa_4/YkgYdQ5kT00DQFtvfX14c3tiZw==/?ll=61.394685%2C55.192713&z=16.65">ООО "Термоснаб", г.Челябинск, улица Кожзаводская, дом 4</a>
        </nav>
    </header>

    <!-- меню -->
    <div class="wrapper">
        <ul class="navigation">
          <li><a href="./index.php">Главная</a></li>
          <li><a href="./page/o-nas.html">О нас</a></li>
          <li><a href="./page/product.html">Товары</a>
            <ul>
              <li><a href="./page/kotel.html">Котлы</a></li>
              <li><a href="./page/zap.html">Запчасти для котлов</a></li>
              <li><a href="./page/radiator.html">Радиаторы</a></li>
              <li><a href="./page/nasos.html">Насосы</a></li>
            </ul>
          </li>
          <li><a href="./page/dostavka.html">Доставка и оплата</a></li>
          <li><a href="./php/profile.php">Профиль</a></li>
          <li><a href="./page/registr.html">Регистрация, авторизация</a></li>
          <div class="clear"></div>
        </ul>  
    </div>

    <!-- контент -->
    <!-- карта -->
    <center><p class="map-p">Постройте маршрут и приезжайте к нам в гости</p></center>
    <center><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A1120cd1b4270e6b7e16db088fea904db5cb0b0719deaa5fa0ee4cc6bf024994d&amp;source=constructor" width="840" height="400" frameborder="0"></iframe></center>

    <!-- контент -->
    <div class="content-novosty">
        <div>
          <h3>Снижение цен на ROMMER</h3>
          <p>С 14.06.2022 года снижаются цены на секционные радиаторы, циркуляционные насосы, шаровые краны Rommer на 5%</p>
        </div>
        <div>
            <h3>Черная пятница 10.10.23</h3>
            <p>Скидки на всю продукцию 15%</p>
        </div>
        <div>
            <h3>Опт</h3>
            <p>Оптовые заказы от 10 штук</p>
        </div>
    </div>

    <!-- отзывы -->
    <!-- форма для заполнения -->
    <center>
    <form class="form" action="./php/otzav.php" method="post">
        <input type="text" class="form-inp" name="login" id="login" placeholder="Введите логин"><br>
        <input type="text" class="form-inp-2" name="content" id="content" placeholder="Введите отзыв"><br>
        <input type="submit" class="batton" value="Отправить">
    </form><br>
    </center>

    <!-- вывод отзыва -->
    <div class="otzav">
    <!-- вывод отзывов из бд -->
    <?php
    // подключение к бд
    $mysql = new mysqli('localhost', 'root', '', 'termosnab');
    $mysql->set_charset('utf8');
    if($mysql->connect_error){
        die("Ошибка: " . $mysql->connect_error);
    }

$sql = "SELECT Log_In, Comment FROM Feedback";
$result2 = $mysql->query($sql);
// вывод отзывов
    ?>
    <p><?php 
    while ($row = mysqli_fetch_assoc($result2)) {
        echo "<b>".$row['Log_In']."</b>"."<br>";
        echo $row['Comment']."<br>"."<br>";
    }

mysqli_close($mysql);
?>

    <!-- футер -->
    <footer>
        <div>
            <p>Покупайте у нас товары выгодно и без сожаления!</p>
            <p class="prob-txt">Design and programmer BY @KyvshinkaLay</p>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>
</html>