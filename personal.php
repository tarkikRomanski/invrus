<!DOCTYPE html>
<?php
if (isset($_COOKIE['user'])):
$get_cockie = unserialize($_COOKIE['user']);
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Личный кабинет</title>
     <link rel="stylesheet" type="text/css" href="style/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body id="personal">
<?php if (!isset($_GET['page'])): ?>
  <div class="myCard">
    <h3>
      Приветствуем, <?php echo $get_cockie['nickname']; ?>
    </h3>
    <img src="" alt="" id="ava">
    <?php if (isset($get_cockie['userPIP'])): ?>
      <p><?php echo $get_cockie['userPIP']; ?></p>
    <?php endif ?>

    <i class="material-icons">settings</i>
    <span id="signOut">Выйти</span>
  </div>

  <div class="myCard">
    <a href="?page=refill">
      <h3>
        Пополнить счёт
      </h3>
      <p>
        <?php echo $get_cockie['money']; ?> руб.
      </p>
    </a>
  </div>

  <div class="myCard myCard21">
    <h3>Новости</h3>
    <a href="#">
      Какая-то новость, последняя или нет, рандомная или нет, и разницы нет...
    </a>
  </div>

  <div class="myCard">
    <h3>
      Синие фишки
    </h3>
    <p>
      Что-то про фишки
    </p>
  </div>
<?php else: ?>
    <div id="personalNav">
      <a href="personal.php"><div class="pNavItem  <?php $active = ($_GET['page']=='') ? 'pNavActive' : ''; echo $active;?>"><?php echo $get_cockie['nickname'] ?></div></a>
      <a href="personal.php"><div class="pNavItem <?php $active = ($_GET['page']=='') ? 'pNavActive' : ''; echo $active; ?>">Новости</div></a>
      <a href="?page=refill"><div class="pNavItem <?php $active = ($_GET['page']=='refill') ? 'pNavActive' : ''; echo $active; ?>">Пополнить счёт</div></a>
      <a href="personal.php"><div class="pNavItem <?php $active = ($_GET['page']=='') ? 'pNavActive' : ''; echo $active; ?>">Синие фишки</div></a>
    </div>
    <div id="personalContent">
      <?php
        switch ($_GET['page']):
          case 'refill':
            include "refill.php";
            break;

        endswitch;
      ?>
    </div>
<?php endif ?>

  <script src="js/animation.js"></script>
  <script src="js/function.js"></script>
</body>
</html>
<?php endif ?>
