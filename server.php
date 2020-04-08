<?php
  session_start(); 
  $con = mysqli_connect('localhost','root','','ttblog');
  $errors = array();
  $success = array();

  //User Registration 
  if (isset($_POST['signup'])) {
    $name = $_POST['user'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    if (empty($name)) {
        array_push($errors, "Name is required");
      }
    if (empty($birthday)) {
      array_push($errors, "Birthday is required");
    }
    if (empty($gender)) {
        array_push($errors, "Gender is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone)) {
      array_push($errors, "Phone number is required");
    }
    if (count($errors) == 0){
      $s= "select * from registration where name = '$name'";
      $result = mysqli_query($con, $s);
      $num = mysqli_num_rows($result);
      if($num == 1){
          echo"Username Already Taken";
      }
      else{
          $reg = "insert into registration(name , birthday , gender , email , password , phone ) values ('$name' , '$birthday' , '$gender' , '$email' , '$password' , '$phone') ";
          mysqli_query($con, $reg);
          array_push($success,"Registration Successfull");
          header('location:login.php');
      }
    }
    
  }

  if(isset($_POST['user_login']))
  {
    $name = $_POST['user'];
    $password = $_POST['pass'];
    if (empty($name)) {
        array_push($errors, "Name is required");
      }
    if (empty($password)) {
          array_push($errors, "Password is required");
      }
    if (count($errors) == 0){
      $s= "select * from registration where name = '$name' && password = '$password' ";
      $result = mysqli_query($con, $s);
      $num = mysqli_num_rows($result);
      if($num == 1){
          $_SESSION['username'] = $name;
          header('location:index.php');
      }
      else{
          array_push($errors, "Password or Username is invalid");
          // header('location:login.php');
      }
    }
  }

  if (isset($_POST['upload'])) {
    $name=$_SESSION['username'];
      // Get image name
      $image = $_FILES['image']['name'];
      $images = $_SESSION['username'].$image;
      // Get text

      // image file directory
      $target = "image/".basename($images);


      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
         $sql = "UPDATE registration SET photo ='$images' where name='$name'";
         mysqli_query($con, $sql);
          header('location: user-profile.php');
      }else{
       array_push($errors, "Photo can not upload");
       header('location: user-profile.php');
      }
    }

  if(isset($_POST['user_profile_update'])){
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $bio = mysqli_real_escape_string($con, $_POST['bio']);
  
        $user = $_SESSION['username'];
        $sql = "UPDATE registration SET  bio='$bio', password='$password' WHERE name='$user'";
        // echo $sql;
        // die();
          $results = mysqli_query($con, $sql);
          header('location:user-profile.php');
  }

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

      // image file directory
      $target = "image/".basename($images);
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
            $addpost = "insert into post( cat_name , u_name , title , image , body ) values ('$cat_name' , '$user' , '$title' , '$image1' , 'body' )";
            echo $addpost;
            die();
            mysqli_query($con, $reg);
            array_push($success,"Registration Successfull");
            header('location:login.php');
          }
          else
          {

          }
      }
    }

?>