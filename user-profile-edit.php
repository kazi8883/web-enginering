
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

<div class="profile">
    <div class="sidebar">
        <img src="image/<?php echo $row["photo"] ?>" alt="">
        <a href="user-profile.php">View profile</a>
        <a class="active" href="user-profile-edit.php">Edit Profile</a>
        <a href="addpost.php">Add Post</a>
        <a href="userpost.php">Your Posts</a>
        <a href="logout.php">Log Out</a>
    </div>

    <div class="content">
        <div class="container">
            <form method="POST" action="server.php">
                <div class="form-group">
                    <label for="bio">Bio-Graphy</label>
                    <textarea type="text" class="form-control" id="bio" aria-describedby="bio" placeholder="Bio-Graphy" name="bio"><?php echo $row["bio"] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?php echo $row["name"] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="pass">Change Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row["password"] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="user_profile_update">Update</button>
            </form>
        </div> 

        <br>
        <br><br>

        <h2>Links</h2>
        <br>
        <br><br>
        <a href="">Facebook</a><br><br>
        <a href="">Twitter</a><br><br>
        <a href="">Github</a>
    </div>
</div>


</body>

</html>

<?php

include("includes/footer.php")

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="./js/wow.min.js"></script>
<script>
    new WOW().init();
</script>