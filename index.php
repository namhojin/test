<?php
$conn = mysqli_connect("localhost","root","111111");
mysqli_select_db($conn,'webtest');
$result = mysqli_query($conn,'SELECT * FROM topic');

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css?ver=1">
    <title>TEST</title>
  </head>
  <body>
    <header>
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
      <h1>TEST WEB SERVER</h1>

    </header>
    <nav>
      <ol>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
        }
         ?>

      </ol>
    </nav>
    <div id="control">
      <input type="button" name="" value="white" onclick="body.className='white'">
      <input type="button" name="" value="blue" onclick="body.className='blue'">
      <input type="button" name="" value="black" onclick="body.className='black'">
      <input type="button" name="" value="write" onclick="location.href='index.php'">

    </div>
    <article>
      <?php
      if (empty($_GET['id'])) {
        echo "<form action='process.php' method='post'><p>title : <input type='text' name='title'></p><p>author : <input type='text' name='author'></p><p>description : <textarea name='description' rows='8' cols='21'></textarea></p><input type='submit' name='' value='submit'></form>";
      }
      else {
        $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
        echo '<p>'.htmlspecialchars($row['name']).'</p>';
        echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ul><ol><li>');
      }
       ?>

    </article>
  </body>
</html>
