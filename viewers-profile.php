<?php 
  session_start(); 

  if (!isset($_SESSION['email']))
  {
    header('location: login.php');
  }
?>
<?php
$con = mysqli_connect('localhost','root','','ttblog');
$email=$_SESSION['email'];
$id = $_GET['id'];
$s= "select * from registration where id=$id";
$result = $con->query($s);
$row = mysqli_num_rows($result);
if($row<1)
{
    header("HTTP/1.0 404 Not Found", true, 404);
    header("Location: index.php");
die;
}
$row = $result->fetch_assoc();
?>
<!-- <?php //include("includes/header.php"); ?> -->


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

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <!-- <a href="./admin/index.php" class="navbar-brand">Blogen</a> -->
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="./admin/index.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="./admin/posts.php" class="nav-link">Posts</a>
          </li>
          <li class="nav-item px-2">
            <a href="./admin/categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item px-2">
            <a href="./admin/users.php" class="nav-link active">Users</a>
          </li>
          <li class="nav-item px-2">
            <a href="index.php" class="nav-link">Home</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="adminProfile.php" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Welcome <?php echo $row["name"] ?>
            </a>
            <div class="dropdown-menu">
              <a href="profile.php" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
              </a>
              <a href="settings.php" class="dropdown-item">
                <i class="fas fa-cog"></i> Settings
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
 <!-- HEADER -->
  <header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-users"></i> <?=$row["name"]?></h1>
        </div>
      </div>
    </div>
  </header>
<br><br>

<div class="profile">
    <div class="sidebar">
        <img src="image/<?=$row["photo"]?>" alt="photo">
    </div>

    <div class="content">
        <h2>Description</h2><br><br>
        <hr><br><br>
        <p><?=$row["bio"]?></p>
            
            <br><br>

        <h2>About</h2>
        <br>
        <hr>
        <br>
        <h5>Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span><?=$row["name"]?></span> </h5><br>
        <h5>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?=$row["email"]?></span></h5><br>
        <h5>Gender :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?=$row["gender"]?></span></h5>
        <br><br>
        <hr>
        <br><br>

        <h2>Links</h2>
        <br><br>
        <hr>
        <br><br>

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