<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Термоснаб - Главная страница</title>
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/carkas.css">
</head>
<body>
<?php
session_start();
?>
    <div class="div-logo">
        <img title="Термоснаб" src="../img/logotype.png">
    </div>
    <header>
        <nav>
            <a href="https://yandex.ru/maps/56/chelyabinsk/house/kozhzavodskaya_ulitsa_4/YkgYdQ5kT00DQFtvfX14c3tiZw==/?ll=61.394685%2C55.192713&z=16.65">ООО "Термоснаб", г.Челябинск, улица Кожзаводская, дом 4</a>
        </nav>
    </header>

    <!-- меню -->
    <div class="wrapper">
        <ul class="navigation">
          <li><a href="../index.php">Главная</a></li>
          <li><a href="../page/o-nas.html">О нас</a></li>
          <li><a href="../page/product.html">Товары</a>
            <ul>
              <li><a href="../page/kotel.html">Котлы</a></li>
              <li><a href="../page/zap.html">Запчасти для котлов</a></li>
              <li><a href="../page/radiator.html">Радиаторы</a></li>
              <li><a href="../page/nasos.html">Насосы</a></li>
            </ul>
          </li>
          <li><a href="../page/dostavka.html">Доставка и оплата</a></li>
          <li><a href="../php/profile.php">Профиль</a></li>
          <li><a href="../page/registr.html">Регистрация, авторизация</a></li>
          <div class="clear"></div>
        </ul>  
    </div>

    <!-- контент -->
    <!-- блок -->
    <div class="block-reg">
        <p>Здравствуйте, 
        <?php 
          echo $_SESSION['name']; 
        ?> </p>
    </div>


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