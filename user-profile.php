
<?php 
  session_start(); 

  if (!isset($_SESSION['username']))
  {
    header('location: login.php');
  }

?>
<?php

include("includes/header.php");

?>
<?php
$con = mysqli_connect('localhost','root','','ttblog');
$name=$_SESSION['username'];
$s= "select * from registration where name = '$name'";
$result = $con->query($s);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
</head>


<!-- Slider -->
<section id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item carousel-image-1 active">
                <div class="container">
                    <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-image-2">
                <div class="container">
                    <div class="carousel-caption d-none d-sm-block mb-5">
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-image-3">
                <div class="container">
                    <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    </div>
                </div>
            </div>
        </div>

        <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
            <span class="carousel-control-prev-icon"></span>
        </a>

        <a href="#myCarousel" data-slide="next" class="carousel-control-next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>
<!-- Slider end -->
<br>
 <!-- <?php //include("errors.php"); ?> -->
<div class="profile">
    <div class="sidebar">
        <img src="image/<?php echo $row["photo"] ?>" alt="">
        <a class="active" href="user-profile.php">View profile</a>
        <a href="user-profile-edit.php">Edit Profile</a>
        <a href="addpost.php">Add Post</a>
        <a href="userpost.php">Your Posts</a>
        <a href="logout.php">Log Out</a>
    </div>

    <div class="content">
        <h2>BIO-GRAPHY</h2><br><br>
        <hr><br><br>
        <p><?php echo $row["bio"] ?>
        </p>    
        <br><br>
        <?php if($row["photo"]==NULL){?>
            <form method="POST" action="server.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                  <input type="file" name="image">
                </div>
                <div>
                    <button type="submit" name="upload">POST</button>
                </div>
              </form>
        <?php }
        else {
            echo "<h2>Profile Photo</h2><br>";
            echo "<img src=image/".$row['photo'].">";
         } ?> 
         <br><br>  
        <h2>About</h2>
        <br>
        <hr>
        <br>
        <h5>Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row["name"] ?> </h5><br>
        <h5>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?php echo $row["email"] ?></span></h5><br>
        <h5>Gender :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?php echo $row["gender"] ?></span></h5>
        <h5>Gender :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?php echo $row["photo"] ?></span></h5>
        <br><br>
        <hr>
        <h2>Links</h2>
        <br><br>
        <hr>
        <a href="">Facebook</a><br><br>
        <a href="">Twitter</a><br><br>
        <a href="">Github</a>


    </div>
</div>

<br>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="./js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>

</html>

<?php

include("includes/footer.php")

?>