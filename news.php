<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Новини</title>
  <?php if(isset($_GET['id'])):
    require_once 'Classes/Content.php';
    //require_once 'Classes/User.php';
    $Content = new Content();
    //$UserObj = new User();

    $news = $Content->getNewsFromType($_GET['id']);
  ?>

    <h1>Новости</h1>

    <?php
      foreach ($news as $one):
        echo "<h3>$one[title]</h3>";
        echo "<div>$one[content]</div>";
        echo "<p>$one[date]</p>";
        echo "<hr>";
      endforeach;
    ?>

  <?php endif; ?>
</head>
</html>