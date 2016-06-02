<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>InvRus | Вход в личный кабинет</title>
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
  <?php if (isset($_COOKIE['user'])): ?>
    <?php header("Location:personal.php"); ?>
  <?php endif ?>
   <div id="signinWindow">
      <div id="registration">
        <h2>Регистрация</h2>/<h4 class="accountMode">вход</h4>
        <p><input type="text" id="newName" placeholder="Ваше имя"></p>
        <p><input type="password" id="newPassword" placeholder="Придумайте пароль"></p>
        <p><input type="password" id="confirmPassword" placeholder="Повторите пароль"></p>
        <p><input type="text" id="newEmail" placeholder="Ваш емейл"></p>
        <button id="sendRegistrationData">Зарегистрироватся</button>
      </div>

      <div id="enter">
        <h2>Вход</h2>/<h4 class="accountMode">регистрация</h4>
        <p><input type="text" id="userName" placeholder="Ваш логин"></p>
        <p><input type="password" id="userPassword" placeholder="Ваш пароль"></p>

        <button id="sendSigninData">Войти</button>
      </div>
    </div>

<div id="navigationPanel">
    <div class="menuItem">
      <a href="index.php">Главная</a>
    </div>
    <div class="menuItem">
      <a href="#">Аукционеру</a>
      <div class="submenu">
        <a href="#">Стать аукционером</a>
        <a href="#">Инвест портфели</a>
        <a href="#">Ценные бумаги К/П</a>
        <a href="#">Девидендная политика</a>
        <a href="#">ПАММ програма</a>
      </div>
    </div>
    <div class="menuItem">
      <a href="#">Отечественное производство</a>
      <div class="submenu">
        <a href="#">Нефть</a>
        <a href="#">Газ</a>
        <a href="#">Строительство</a>
        <a href="#">Производство</a>
        <a href="#">Аграрии</a>
        <a href="#">Финансы</a>
      </div>
    </div>
    <div class="menuItem">
      <a href="#">Аналитика</a>
      <div class="submenu">
        <a href="#">Голубые фишки</a>
        <a href="#">Стабильные инстр</a>
        <a href="#">Ликвидные инстр</a>
        <a href="#">Компании выигр. тен</a>
      </div>
    </div>
    <div class="menuItem">
      <a href="#">Новости</a>
      <div class="submenu">
        <a href="#">Валютный рынок</a>
        <a href="#">Голубые фишки</a>
        <a href="#">Импортозамещение</a>
        <a href="#">Сырыевой рынок</a>
        <a href="#">Лидеры производства</a>
      </div>
     </div>
    <div class="menuItem">
      <a class="last" href="#">InvRus</a>
      <div class="submenu">
        <a href="#">О нас</a>
        <a href="#">Офисы</a>
        <a href="#">Лицензии</a>
        <a href="#">Обратная связь</a>
      </div>
    </div>
  </div>
    <script src="js/animation.js"></script>
    <script src="js/function.js"></script>
</body>
</html>
