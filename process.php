<?php
  if ($link = mysqli_connect('localhost','root','12345','login')) {
    if (isset($_POST['submit'])) {

      $movie = $_POST['movie'];
      $year = $_POST['year'];
      $actor = $_POST['actor'];
      $ratings = $_POST['ratings'];

      mysqli_query($link,"INSERT INTO movies_list(movie_name,year_of_release,actor,ratings) VALUES('$movie','$year','$actor','$ratings')") or die('wtf');
    }
  }

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($link,"DELETE FROM movies_list WHERE id = $id") or die(mysqli_error());
    header('location: movies_list.php');
  }

 ?>
