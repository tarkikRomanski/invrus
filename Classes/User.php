<?php
require_once 'db_connect.php';

use DataBase\Connect as conn;


class User {

  private $connect;

  public function __construct(){
      $this->connect = new conn('InvRus');
  }

  /**
   * Добавление нового пользователя
   * @param  string $newName     Новый никнейм пользователя (уникальность проверяется в методе)
   * @param  string $newPassword Пароль нового пользователя, в методе производится кодирование
   * @param  string $newEmail    Почтовый адрес нового пользователя
   * @return [type]              На выходе 1 или ошибка u2 - данный никнейм занят
   */
  public function newUser($newName, $newPassword, $newEmail) {
    if($this->isUser($newName) == null) {
      $values = array($newName, $newEmail, md5(trim($newPassword)));
      $columns = array('nickname', 'email', 'password');
      $result = $this->connect->insertDataTable('users', $values, $columns);
      return $result;
    } else {
      return 'u2';
    }
  }

  /**
   * Проверка существует ли пользователь с данным именем
   * @param  string  $name Никнейм который нужно проверить
   * @return boolean       Масив с пользователем, если пользователь существует, в противном случае false
   */
  protected function isUser($name) {
    $users = $this->connect->getRowTable('users', "nickname='".$name."'");
    if($users != null)
      return $users[0];
    else
      return false;
  }

    /**
   * Проверка существует ли пользователь с данным id
   * @param  int  $name id который нужно проверить
   * @return boolean       Масив с пользователем, если пользователь существует, в противном случае false
   */
  public function isUserId($id) {
    $users = $this->connect->getRowTable('users', "id=".$id);
    if($users != null)
      return $users[0];
    else
      return false;
  }

  /**
   * Аутинфикация пользоветеля
   * @param  string  $userName     Имя пользователя
   * @param  string  $userPassword Пароль пользователя
   * @param  boolean $remember     Запомнить пользователя
   * @return [type]                Если все удачно- true,неверный пароль -u1,неверный логин -u2
   */
  public function signIn($userName, $userPassword, $remember = false){
    $user = $this->isUser($userName);
    if($user != null){
      if($user['password'] == md5(trim($userPassword))){
        setcookie('user', serialize($user), 0x6FFFFFFF, '/' ,'invrus.ru');
        return true;
      } else {
        return 'u1';
      }
    } else {
      return 'u2';
    }
  }

  public function addMoney($sum, $uId){
    $user = $this->isUserId($uId);
    $i = 0;
    if($user != null){
      $newMoney = $user['money'] + $sum;
      $user['money'] = $newMoney;
      setcookie('user', serialize($user), 0x6FFFFFFF, '/' ,'invrus.ru');
      $this->connect->setDataTable('users', 'money', $newMoney, 'id='.$uId);
      $nowDate = date('Y-m-d H:i:s');
      $values = array($nowDate, $uId, $sum, $i);
      $columns = array('date', 'user_id', 'replenished', 'other');
      $this->connect->insertDataTable('logs', $values, $columns);
    } else {
      echo 'u2';
    }
  }

  public function removeMoney($sum, $uId){
     $user = $this->isUserId($uId);
    if($user != null){
      $newMoney = $user['money'] - $sum;
      $user['money'] = $newMoney;
      setcookie('user', serialize($user), 0x6FFFFFFF, '/' ,'invrus.ru');
      $this->connect->setDataTable('users', 'money', $newMoney, 'id='.$uId);
      $nowDate = date('Y-m-d H:i:s');
      $values = array($nowDate, $uId, $sum, 'Вычисление с счёта');
      $columns = array('date', 'user_id', 'replenished', 'other');
      $this->connect->insertDataTable('logs', $values, $columns);
    } else {
      echo 'u2';
    }
  }

/**
 * Организация выхода пользователя
 * @return [type] Метод нечего не возвращает
 */
public function logOut(){
  setcookie("user", 'invrus', time()-3600, '/' ,'invrus.ru');
  }
}

//tarkik ☮ 2016
