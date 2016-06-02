<?php

require_once 'User.php';
require_once 'Content.php';

$ContentObj = new Content();
$UserObj = new User();

if(isset($_POST['s'])){
  $name = $_POST['name'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $money = $_POST['money'];
  $userId = $_POST['userId'];
  $id = $_POST['id'];
  $content = $_POST['content'];
  $type = $_POST['type'];
  $img = $_POST['img'];

  $s = $_POST['s'];
  switch ($s) {
    case 'newUser':
      $r = $UserObj->newUser($name, $pass, $email);
      echo $r;
      break;
    case 'signIn':
      $r = $UserObj->signIn($name, $pass, true);
      echo $r;
      break;
    case 'signOut':
      $r = $UserObj->logOut();
      echo $r;
      break;
    case 'refill':
      $r = $UserObj->addMoney($money, $userId);
      echo $r;
      break;
    case 'newNews':
      $r = $ContentObj->setNews($name, $content, $type);
      break;
    case 'newNewsType':
      $r = $ContentObj->setNewsType($name);
      break;
    case 'deleteNews':
      $r = $ContentObj->deleteNews($id);
      break;
    case 'deleteNewsType':
      $r = $ContentObj->deleteNewsType($id);
      break;
    case 'updateNewsType':
      $r = $ContentObj->updateNewsType($id, $name);
      break;
  }
}
