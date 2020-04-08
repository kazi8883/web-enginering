<?php 
  session_start(); 

  if (!isset($_SESSION['email']))
  {
    header('location: login.php');
  }
?>
<?php
    $con = mysqli_connect('localhost','root','','ttblog');
    $limit = 4;  // Number of entries to show in a page. 
    $name=$_SESSION['username'];
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;

    $s= "select * from post where u_name='$name' LIMIT $start_from, $limit";
    $result = $con->query($s);
?>
<?php

include("includes/header.php");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title> TTblog</title>
</head>

<body>
  <div class="margin" style="height: 5vh; background-color:#F8F7F3;">

  </div>
  <!-- extra spc end -->

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





  <div class="container" style="margin-top: 4vh; margin-bottom: 2vh;">
    <div class="row">
      <div class="col-9" style=" height: 0.5vh;">
      </div>

      <div class="col-3" style=" border:4px solid #F8F7F3; height: 0.5vh;">
      </div>
    </div>
  </div>




  <!-- body1-->
 
      <div class="col-9">
        <h4>MY POST</h4>
        <hr>
        <br>

              <?php $i=1; while($row = $result->fetch_assoc()) {
                  ?>
        <div class="media">
          <div class="media-body">
            <a href="">
              <h5 class="mt-0" style="font-size: 160%;"><?php echo $row["title"]; ?></h5>
            </a> <br>
            <span><?php echo $row["created_at"]; ?></span> <br>
            <p style="font-size: 100%;"><?php echo $row["body"]; ?></p>
          </div>
        </div>
        <br>

        <hr>

        <br>
        <?php } ?>
        <ul class="pagination"> 
          <?php   
            $sql = "SELECT COUNT(*) FROM post";   
            $rs_result = mysqli_query($con,$sql);   
            $row = mysqli_fetch_row($rs_result);   
            $total_records = $row[0];   
              
            // Number of pages required. 
            $total_pages = ceil($total_records / $limit);   
            $pagLink = "";                         
            for ($i=1; $i<=$total_pages; $i++) { 
              if ($i==$pn) { 
                  $pagLink .= "<li class='active'><a href='userpost.php?page="
                                                    .$i."'>".$i."</a></li>"; 
              }             
              else  { 
                  $pagLink .= "<li><a href='userpost.php?page=".$i."'> 
                                                    ".$i."</a></li>";   
              } 
            };   
            echo $pagLink;   
          ?> 
          </ul> 


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php

include("includes/footer.php")

?>