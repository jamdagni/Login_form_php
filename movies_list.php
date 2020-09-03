<?php
  /*session_start();
  echo isset($_SESSION['username']);
  echo '<p>Hello</p>';
  session_destroy();*/
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MOVIE PAGE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <style media="screen">
    body{
      background: #e2eafc;
    }
    table tr th{
      border:1px solid black;
    }
    table tr td{
      border:1px solid grey;
    }
  </style>
  <body>

    <?php require_once 'process.php' ?>
    <?php
      if (isset($_SESSION['message'])):?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif;  ?>
    <?php
      $link = mysqli_connect('localhost','root','your_password','login') or die(mysqli_error());
      $result = mysqli_query($link,"SELECT * FROM movies_list") or die(mysqli_error());
     ?>

     <div class="container" style="border:1px solid black;margin-top:20px">
       <div class="row justify-content-center">
         <table class="table">
           <thead>
             <tr style="background:wheat">
               <th scope="col">MOVIE</th>
               <th scope="col">YEAR</th>
               <th scope="col">ACTOR</th>
               <th scope="col">RATINGS</th>
               <th scope="col">BUTTONS</th>
             </tr>
           </thead>

             <?php
                while($row = mysqli_fetch_assoc($result)):?>
                    <tr style="background:#eddcd2">
                      <td><?php echo $row['movie_name']; ?></td>
                      <td><?php echo $row['year_of_release']; ?></td>
                      <td><?php echo $row['actor'];?></td>
                      <td><?php echo $row['ratings']; ?></td>
                      <td><a href="movies_list.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning my-1">EDIT</a>
                      <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
                      </td>
                    </tr>
              <?php endwhile;?>
         </table>
       </div>
     </div>
     <div class="container" style="margin-top:50px">
      <form action="process.php" method="post" class="container offset-md-2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-row justify-content-center" style="display:block">
            <div class="col-md-2 offset-md-3 my-2">
              <input type="text" name="movie" class="form-control" placeholder="MOVIE" value="<?php echo $movie; ?>" required>
            </div>
            <div class="col-md-2 offset-md-3 my-2">
              <input type="text" name="year" class="form-control" placeholder="YEAR" value="<?php echo $year; ?>" required>
            </div>
            <div class="col-md-2 offset-md-3 my-2">
              <input type="text" name="actor" class="form-control" placeholder="ACTOR" value="<?php echo $actor; ?>" required>
            </div>
            <div class="col-md-2 offset-md-3 my-2" style="text-align:center" value="<?php echo $options; ?>" required>
              <label class="text" for="inputGroupSelect01" style="color:orange">RATING</label><br>
              <select class="custom-select" id="inputGroupSelect01" name="ratings">
                <option value="">--SELECT--</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
              </select>
            </div>
            <div class="col-md-2 offset-md-3 my-2" style="text-align:center;">
              <?php
                if ($update==true):?>
              <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
              <?php else: ?>
              <button type="submit" name="save" class="btn btn-primary">SAVE</button>
            <?php endif; ?>
            </div>
          </div>
      </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
