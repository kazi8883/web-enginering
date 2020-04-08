<?php 
session_start(); 
$con = mysqli_connect('localhost','root','','ttblog');
$errors = array();
if(isset($_POST['addpost']))
  {
      $title = $_POST['title'];
      $cat_name = $_POST['category'];
      // $image1 = $_POST['image'];
      $body = $_POST['body'];
      
      $image = $_FILES['image']['name'];
      $images = $_SESSION['username'].$image;
      $user= $_SESSION['username'];
      // Get text
        $date = date('Y-m-d H:i:s');
      // image file directory
      $target = "post/".basename($images);
      if (empty($title)) {
          array_push($errors, "Title is required");
        }
      if (empty($cat_name)) {
        array_push($errors, "Category is required");
      }
      if (empty($image)) {
          array_push($errors, "Image is required");
      }
      if (empty($body)) {
        array_push($errors, "Body is required");
      }

      if (count($errors) == 0){

         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $addpost = "insert into post( cat_name , u_name , title , image , body ,created_at ) values ('$cat_name' , '$user' , '$title' , '$image' , '$body','$date' )";
            // echo $addpost;
            // die();
            mysqli_query($con, $addpost);
            array_push($success,"Add Post Successfull");
            header('location:index.php');
          }
          else
          {
            header('location:addpost.php');
          }
      }
    }
 ?>
<?php 

  if (!isset($_SESSION['username']))
  {
    header('location: login.php');
  }

?>
<?php include("includes/header.php"); ?>
<?php
$con = mysqli_connect('localhost','root','','ttblog');
$name=$_SESSION['username'];
$s= "select * from registration where name = '$name'";
$sql = "select * from categories";
$result = $con->query($s);
$result1 = $con->query($sql);
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


<div class="container">
    <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Post</h5>
        </div>
        <div class="modal-body">
          <form method="Post" enctype="multipart/form-data" >
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="category">

                <?php $i=1; while($row1 = $result1->fetch_assoc()) {
                  ?>
                <option value="<?php echo $row1["cat_name"];?>"><?php echo $row1["cat_name"];?></option>
            <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="image">Upload Image</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label for="image" class="custom-file-label">Choose File</label>
              </div>
              <small class="form-text text-muted">Max Size 1mb</small>
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="addpost">ADD POST</button>
          </form>
</div>





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