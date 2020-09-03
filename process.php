<?php

  session_start();

  if ($link = mysqli_connect('localhost','root','your_password','login')) {

    $movie = '';
    $year = '';
    $actor = '';
    $ratings = '';
    $update = false;
    if (isset($_POST['save'])) {

      $movie = $_POST['movie'];
      $year = $_POST['year'];
      $actor = $_POST['actor'];
      $ratings = $_POST['ratings'];

      mysqli_query($link,"INSERT INTO movies_list(movie_name,year_of_release,actor,ratings) VALUES('$movie','$year','$actor','$ratings')") or die('wtf');

      $_SESSION['message'] = "Record has been saved";
      $_SESSION['msg_type'] = "success";

      header('location: movies_list.php');
    }
  }

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($link,"DELETE FROM movies_list WHERE id = $id") or die(mysqli_error());

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header('location: movies_list.php');
  }

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = mysqli_query($link,"SELECT * FROM movies_list WHERE id = $id") or die(mysqli_error());

      $row = mysqli_fetch_array($result);
      $movie = $row['movie_name'];
      $year = $row['year_of_release'];
      $actor = $row['actor'];
      $ratings = $row['ratings'];
  }

  if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $movie = $_POST['movie'];
    $year = $_POST['year'];
    $actor = $_POST['actor'];
    $ratings = $_POST['ratings'];

    mysqli_query($link,"UPDATE movies_list SET movie_name='$movie',year_of_release='$year',actor='$actor',ratings='$ratings' WHERE id=$id") or die(mysqli_error());

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header('location: movies_list.php');
  }

 ?>
