<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Пополнение счёта</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body id="refill">
<?php 
  if (isset($_COOKIE['user'])):
    $get_cockie = unserialize($_COOKIE['user']);
?>
    <p class="userinf" id="cUserId"><?php echo $get_cockie['id'] ?></p>
  <h1>На вашем счету: <?php echo $get_cockie['money'] ?> рублей </h1>
  <input type="text" id="refillSum" placeholder="Введите суму">
  <button id="sendRefillData">Пополнить</button>

<?php else: ?>

  <h1>Вам нужно <a href="index.php">войти</a></h1>

<?php endif ?>

<script src="js/function.js"></script>

</body>
</html>
