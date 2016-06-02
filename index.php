<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>InvRus</title>
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="js/jquery.film_roll.min.js"></script>
</head>
<body>
  <?php
    require_once 'Classes/Content.php';
    $Content = new Content();
  ?>


  <div id="mainBanner" class="blur">
    <div id="banner0" class="banners">
      <video autoplay="autoplay" loop="loop">
        <source src="3433190.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
      </video>
    </div>
    <div id="banner1" class="banners">
      <video autoplay="autoplay" loop="loop">
        <source src="3771959.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
      </video>
    </div>
    <div id="banner2" class="banners">
      <video autoplay="autoplay" loop="loop">
        <source src="350879117.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
      </video>
    </div>
  </div>

  <div id="navigationPanel">
    <div class="menuItem">
      <?php
        if (!isset($_COOKIE['user'])):

      ?>
       <a href="enter.php">Личный кабинет</a>
      <?php else:
          $get_cockie = unserialize($_COOKIE['user']);
          ?>
          <?php if($get_cockie['admin'] == 0): ?>
            <a href="personal.php">Личный кабинет</a>
          <?php else: ?>

            <a href="admin.php">Личный кабинет</a>
          <?php endif; ?>
      <?php endif ?>
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
        <a href="content.php?page=neft">Нефть</a>
        <a href="content.php?page=gas">Газ</a>
        <a href="content.php?page=build">Строительство</a>
        <a href="content.php?page=industr">Производство</a>
        <a href="content.php?page=agrar">Аграрии</a>
        <a href="content.php?page=finance">Финансы</a>
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
        <?php $Content->getNewsMenu(); ?>
      </div>
     </div>
    <div class="menuItem">
      <a class="last" href="#">InvRus</a>
      <div class="submenu">
        <a href="content.php?page=about">О нас</a>
        <a href="#">Офисы</a>
        <a href="content.php?page=license">Лицензии</a>
        <a href="#">Обратная связь</a>
      </div>
    </div>
  </div>
  <?php if (!isset($get_cockie['nickname'])): ?>

    <div id="showSigninPanel"><i class="material-icons">person</i></div>
    <div id="signinPanel">
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
  <?php else: ?>
    <p id="userNamePanel"><?php echo $get_cockie['nickname']; ?></p>

  <?php endif ?>

  <div id="mainContent">
    <h2>Индексы</h2>
    <div id="film_roll">
    <div class="rollM">
      <p>Индекс ММВБ</p>
      <center>
      <img src="http://www.moex.com/cs/engines/stock/markets/index/boardgroups/9/securities/MICEXINDEXCF.png?c.width=339&z1.width=339&z1_c.width=339&c.height=169.5&z1.height=169.5&z1_c.height=169.5&template=adv_no_volume&_=1463000842865&compare=&compare_template=adv_no_volume_comp&candles=72&interval=10" alt="">
    </center>
    </div>
        <div class="rollM">
      <p>Индекс РТС</p>
      <center>
      <img src="http://www.moex.com/cs/engines/stock/markets/index/boardgroups/9/securities/RTSI.png?c.width=339&z1.width=339&z1_c.width=339&c.height=169.5&z1.height=169.5&z1_c.height=169.5&template=adv_no_volume&_=1463001329218&compare=&compare_template=adv_no_volume_comp&candles=72&interval=10" alt="">
      </center>
    </div>

        <div class="rollM">
      <p>Широкий рынок</p>
      <center>
      <img src="http://www.moex.com/cs/engines/stock/markets/index/boardgroups/9/securities/MICEXBMI.png?c.width=339&z1.width=339&z1_c.width=339&c.height=169.5&z1.height=169.5&z1_c.height=169.5&template=adv_no_volume&_=1463001392013&compare=&compare_template=adv_no_volume_comp&candles=72&interval=10" alt="">
      </center>
    </div>
        <div class="rollM">
      <p>Голубые фишки</p>
      <center>
      <img src="http://www.moex.com/cs/engines/stock/markets/index/boardgroups/9/securities/RTSSTD.png?c.width=339&z1.width=339&z1_c.width=339&c.height=169.5&z1.height=169.5&z1_c.height=169.5&template=adv_no_volume&_=1463001430863&compare=&compare_template=adv_no_volume_comp&candles=72&interval=10" alt="">
      </center>
    </div>
        <div class="rollM">
      <p>Индекс RVI</p>
      <center>
      <img src="http://www.moex.com/cs/engines/stock/markets/index/boardgroups/9/securities/RVI.png?c.width=339&z1.width=339&z1_c.width=339&c.height=169.5&z1.height=169.5&z1_c.height=169.5&template=adv_no_volume&_=1463001449759&compare=&compare_template=adv_no_volume_comp&candles=72&interval=10" alt="">
    </div>
    </center>
  </div>


  </div>

  <div id="logo">
      <img src="style/img/logo.png">
      <p>Может быть еще какая-то надпись</p>
  </div>

<script>
   jQuery(window).load(function() {
    var film_roll = new FilmRoll({
        configure_load: true,
        container: '#film_roll',
      });
  });
</script>
<script src="js/animation.js"></script>
<script src="js/function.js"></script>
</body>
</html>
