<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Администратор</title>
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <link rel="stylesheet" href="/style/default/wbbtheme.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="/js/jquery.wysibb.min.js"></script>
  <script src="/js/ua.js"></script>
  <script>
    var wbbOpt = {
      lang: "ua"
    }
    $(function() {
      $("#editor").wysibb(wbbOpt);
    })
  </script>
</head>
<body>

<?php
  if (isset($_COOKIE['user'])):
    $get_cockie = unserialize($_COOKIE['user']);

    if($get_cockie['admin'] == 1):
  
      require_once 'Classes/Content.php';
      require_once 'Classes/User.php';
      $Content = new Content();
      $UserObj = new User();
    
      $types = $Content->getNewsTypes();
      $news = $Content->getAllNews();
      $logs = $Content->getAllLogs();
    ?>
    
    <div class="adminNav">
      <div id="newsBtn"><button><i class="material-icons">create</i></button><p>Новости</p></div>
      <div id="logsBtn"><button><i class="material-icons">attach_money</i></button><p>История платежей</p></div>
    </div>
    <div id="adminContents">
      <div class="adminBlock" id="news">
        <div class="adminNav">
          <div id="newsTypesBtn"><button><i class="material-icons">bubble_chart</i></button><p>Типы новостей</p></div>
          <div id="allNewsBtn"><button><i class="material-icons">archive</i></button><p>Опубликованные новости</p></div>
          <div id="createNewsBtn"><button><i class="material-icons">add</i></button><p>Создать новость</p></div>
        </div>
    
        <div class="block" id="newsTypes">
          <h2>Типы новостей</h2>
          <table>
            <thead>
              <td style="width:80%">Название</td>
              <td style="width:9%">Удалить</td>
              <td style="width:9%">Редактировать</td>
            </thead>
            <tbody>
            <?php
            foreach ($types as $type):
                echo "<tr>";
                echo "<th>".$type['name']."</th>";
                echo "<td class='deleteNewsType' data-id='".$type['id']."'><i class=\"material-icons\">delete</i></td>";
                echo "<td class='updateNewsType' data-id='".$type['id']."' data-name='".$type['name']."'><i class=\"material-icons\">update</i></td>";
                echo "</tr>";
              endforeach;
            ?>
            </tbody>
          </table>
    
          <p>Добавить новый тип:</p>
          <input type="text" id="newNewsType" placeholder="Название типа">
          <button id="addNewsType">Добавить</button>
        </div>
    
        <div class="block" id="allNews">
          <h2>Все новости</h2>
          <?php if($news != null): ?>
          <table>
            <thead>
            <tr>
              <td style="width: 80%">Заголовок</td>
              <td style="width: 5%">Удалить</td>
              <td style="width: 15%">Тип</td>
            </tr>
            </thead>
          <?php
            foreach ($news as $oneNews):
              $newsType = $Content->getNewsTypeFromId($oneNews['type']);
    
              echo "<tr>";
                echo "<td>$oneNews[title]</td>";
                echo "<td data-id='$oneNews[id]'><i class=\"material-icons\">delete</i></td>";
                echo "<td>$newsType</td>";
              echo "</tr>";
            endforeach;
          else:
            echo "<p>Пока новостей нет</p>";
          endif;
          ?>
          </table>
        </div>
        
        <div class="block" id="createNews">
          <h2>Создать новость</h2>
          <p>
            <label for="newTitle">Заголовок новости</label>
            <input type="text" id="newsTitle" placeholder="Текст заголовка">
          </p>
          <p><select id="newsType">
              <?php
                $Content->getNewsTypesList();
              ?>
            </select></p>
          <p><textarea name="bb" id="editor" style="height: 400px;"></textarea></p>
    
          <button id="addNews">Добавить новость</button>
        </div>
      </div>
    
      <div class="adminBlock" id="logs">
        <table>
          <thead>
          <tr>
            <td style="width:25%">Пользователь</td>
            <td style="width:25%">Дата</td>
            <td style="width:25%">Сума</td>
            <td style="width:25%">Примечание</td>
          </tr>
          </thead>
          <tbody>
          <?php
            foreach ($logs as $log):
              $user = $UserObj->isUserId($log['user_id']);
              $user = $user['nickname'];
              echo '<tr>';
              echo "<td>$user</td>";
              echo "<td>$log[date]</td>";
              echo "<td>$log[replenished]</td>";
              echo "<td>$log[other]</td>";
              echo '</tr>';
            endforeach;
          ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <script>
      $('#newsBtn').click(function () {
        $('.adminBlock').each(function () {
          $(this).css({'display':'none'});
        });
        $('#news').css({'display':'block'});
      });
    
      $('#newsTypesBtn').click(function () {
        $('.block').each(function () {
          $(this).css({'display':'none'});
        });
        $('#newsTypes').css({'display':'block'});
      });
    
      $('.deleteNewsType').click(function () {
        var typesId = $(this).attr('data-id');
        $.post(
          'Classes/api.php',
          {
            s:'deleteNewsType',
            id:typesId
          },
          function (data) {
            alert('Запись успешно удалена');
            location.href = location.href;
          }
        );
      });
    
      $('.updateNewsType').click(function () {
        var id = $(this).attr('data-id');
        var oldValue = $(this).attr('data-name');
        var value = prompt('Введите название', oldValue);
        if(value != null && value != oldValue){
          $.post(
            'Classes/api.php',
            {
              s:'updateNewsType',
              id:id,
              name:value
            },
            function (data) {
              alert("Запись успешно обновленна");
              location.href = location.href;
            }
          );
        }
      });
    
      $('#addNewsType').click(function () {
        var name = $('#newNewsType').val();
        $.post(
          'Classes/api.php',
          {
            s:'newNewsType',
            name: name
          },
          function(data){
            alert("Запись успешно добавлена");
            location.href = location.href;
          }
        )
      });
    
      $('#allNewsBtn').click(function () {
        $('.block').each(function () {
          $(this).css({'display':'none'});
        });
        $('#allNews').css({'display':'block'})
      });
      
      $('#createNewsBtn').click(function () {
        $('.block').each(function () {
          $(this).css({'display':'none'});
        });
        $('#createNews').css({'display':'block'});
      });
    
      $('#addNews').click(function () {
        var content = $('.wysibb-text-editor').html();
        var title = $('#newsTitle').val();
        var type = $('#newsType').val();
        $.post(
          'Classes/api.php',
          {
            s:'newNews',
            name:title,
            content:content,
            type:type
          },
          function (data) {
            alert('Новость добавленна');
            location.href = location.href;
          }
        );
      });
    
      $('#logsBtn').click(function () {
        $('.adminBlock').each(function () {
          $(this).css({'display':'none'});
        });
        $('#logs').css({'display':'block'});
      });
    
    </script>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>
