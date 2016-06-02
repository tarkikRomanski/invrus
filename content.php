<?php
require_once 'Classes/db_connect.php';
use DataBase\Connect as conn;

$connect = new conn('InvRus');

if(isset($_GET['page'])):
  $content = $connect->getRowTable('pages', "id='".$_GET['page']."'");
  $title = $content[0]['title'];
  $con = $content[0]['content'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <link rel="stylesheet" href="/style/default/wbbtheme.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="/js/jquery.wysibb.min.js"></script>
  <script src="/js/ua.js"></script>
</head>
<body>
  <h2><?php echo $title; ?></h2>
  <div><?php echo $con; ?></div>
</body>
</html>

<?php endif; ?>