
<?php
  if(array_key_exists('username',$_POST) AND array_key_exists('password',$_POST)){
    $link = mysqli_connect("localhost","root","12345","login");

    if(mysqli_connect_error()){
      die("problem in connecting with database");
    }

    if($_POST['username']==''){
      echo "usrname is required";
    }elseif ($_POST['password']=='') {
      echo "password incorrect";
    }else {
        $query = "SELECT * FROM members WHERE username = '".mysqli_real_escape_string($link,$_POST['username'])."'";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_array($result);

        if (mysqli_real_escape_string($link,$_POST['password']== isset($row['password']))){
          echo "Access Granted";
          header("refresh:1; url=index.html");
        }else {
          echo "Enter correct password";
        }
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <div class="hero">
      <div class="container">
        <h2>Welcome to movie review</h2>
        <form method="post">
          <div class="row">
            <div class="col-md-6 offset-md-3 my-3">
              <input type="text" name="username" class="form-control" placeholder="User name" required>
            </div>
            <div class="col-md-6 offset-md-3 my-3">
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
          </div>
          <div type="submit" class="button">
            <button href="">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
