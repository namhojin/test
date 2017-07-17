<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'],$config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn,'SELECT * FROM topic');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css?ver=1" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css?ver=1">
    <title>TEST</title>
  </head>
  <body>
    <div class="container">
      <header class="jumbotron text-center">
        <a href="index.php"><img src="logo.png" alt="LOGO" class="img-rounded" id="logo"></a>
        <h1>TEST WEB SERVER</h1>
      </header>
      <div class="row">
        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
            }
             ?>
          </ol>
        </nav>
        <div class="col-md-9">
          <article>
            <form action='process.php' method='post'>

              <div class="form-group">
                <label for="form-tytle">Title</label>
                <input type="text" class="form-control" name="title" id="form-tytle" placeholder="Input Title">
              </div>
              <div class="form-group">
                <label for="form-author">Author</label>
                <input type="text" class="form-control" name="author" id="form-author" placeholder="Input Author">
              </div>
              <div class="form-description">
                <label for="form-tytle">Description</label>
                <textarea type="text" class="form-control" rows="10" name="description" id="form-description" placeholder="Input Description"></textarea>
              </div>

              <input type='submit' name='' value='submit' class="btn btn-default btn-lg">


            </form>

          </article>
          <hr>
          <div id="control">
            <div class="btn-group" role="group" aria-label="...">
              <input type="button" name="" value="white" onclick="body.className='white'" class="btn btn-default"/>
              <input type="button" name="" value="blue" onclick="body.className='blue'" class="btn btn-default">
              <input type="button" name="" value="black" onclick="body.className='black'" class="btn btn-default">
            </div>
            <a href="write.php" class="btn btn-success">write</a>
          </div>


        </div>

      </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

    </div>

  </body>
</html>
