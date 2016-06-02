<?php
require_once 'db_connect.php';

use DataBase\Connect as conn;


class Content {
  private $connect;

  public function __construct(){
    $this->connect = new conn('InvRus');
  }

  public function getNewsMenu(){
    $types = $this->connect->getColumnTable('types');
    foreach ($types as $type) {
      echo "<a href='news.php?id=".$type['id']."'>".$type['name']."</a>";
    }
  }

  public function getNewsTypesList(){
    $types = $this->connect->getColumnTable('types');
    foreach ($types as $type) {
      echo "<option value='".$type['id']."'>".$type['name']."</option>";
    }
  }

  public function getNewsTypeFromId($id){
    $r = $this->connect->getRowTable('types', 'id='.$id);
    return $r[0]['name'];
  }

  public function getNewsTypes(){
    return $this->connect->getColumnTable('types');    
  }
  
  public function updateNewsType($id, $value){
    return $this->connect->setDataTable('types', 'name', $value, "id='".$id ."'");
  }

  public function setNewsType($name){
    $value = $name;
    $column = "name";
    return $this->connect->insertDataTable('types', $value, $column);
  }

  public function deleteNewsType($id){
    return $this->connect->deleteRow('types', "id='".$id ."'");
  }

  public function getNewsFromId($id){
    return $this->connect->getRowTable('news', "id='".$id ."'");
  }

  public function getNewsFromType($type){
    return $this->connect->getRowTable('news', 'type='.$type);
  }

  public function getAllNews(){
    return $this->connect->getColumnTable('news');
  }

  public function selectNNews($newsArray, $n){
    $count = count($newsArray);
    $last = $count - 1;
    $i = 0;

    while($i < $n && $last >= 0){
      $nNews[$i] = $newsArray[$last];
      $last--;
    }

    return $last;
  }

  public function setNews($title, $content, $type, $img = null){
    $date = date('Y-m-d H:i:s');
    $values = array($title, $content, $type, $img, $date);
    $columns = array('title', 'content', 'type', 'img', 'date');
    $this->connect->insertDataTable('news', $values, $columns);
  }
  
  public function deleteNews($id){
    return $this->connect->deleteRow('news', 'id='.$id);
  }

  public function getAllLogs(){
    return $this->connect->getColumnTable('logs');
  }

  public function updatePage($id, $value){
    return $this->connect->setDataTable('pages', 'content', $value, "id='".$id ."'");
  }
}
