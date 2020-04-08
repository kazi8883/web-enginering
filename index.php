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
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;

    $s= "select * from post LIMIT $start_from, $limit";
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
  <div class="container" style="margin-top: 2vh; margin-bottom: 2vh;">
    <div class="row">
      <div class="col-9">
        <h4>WELCOME TO TTblog</h4><br>
        <hr>
        <p>Lorem ipsum dolor sit amet, te eos aeque soluta, eros semper percipit te est. Ad eam ignota suavitate
          moderatius. Ne nam duis nemore, vel id vero congue, cum no labore inermis oportere. Te sit vocent inermis,
          mea ex dicta deleniti mediocrem. Ad pri graece appetere disputationi, omnesque maiestatis qui te, option
          recusabo torquatos an duo.Id eum vero iudico assueverit. Pro facer vidisse ex. Ius ad sumo magna praesent.
          Eu duo hinc dolorem phaedrum, at mel torquatos cotidieque, his te modo vitae forensibus.Quis vero audiam
          te est. Idque omnesque an eam, ei aliquam pertinax abhorreant sit, alienum tincidunt rationibus usu et.
          Id graeco propriae persecuti usu. Habeo melius singulis et his, quo ad laoreet efficiendi. In aliquid indoctum
          dissentiunt eos, per bonorum principes in. Convenire omittantur mea ad, duo at iusto postulant. Sea ne tibique
          scriptorem.Eam tollit albucius ad, sea solum justo rationibus ut, sed oratio explicari no. Regione instructior
          id vix, nec cu definiebas scripserit contentiones. Iriure lobortis pertinacia mel ut. Eam ea choro vituperata,
          recteque sapientem evertitur est an. Ne lucilius inimicus has, ea duo alia aliquid.Sit at aperiri indoctum </p>
      </div>



      <div class="col-3 " style=" height: 35vh; background-color: #F8F7F3; font-weight: bold ; text-align:center;">
        <a href="">
          <h4 style="margin-top: 1vh; color:#0369A3">LIKE US ON FACEBOOK</h4>
        </a>
      </div>

    </div>

  </div>
  <!-- body1 end-->


  <!-- body2-->
  <div class="container" style="margin-top: 2vh; margin-bottom: 2vh;">
    <div class="row">

      <!-- body2 posts-->
      <div class="col-9">
        <h4>Latest News</h4>
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
                  $pagLink .= "<li class='active'><a href='index.php?page="
                                                    .$i."'>".$i."</a></li>"; 
              }             
              else  { 
                  $pagLink .= "<li><a href='index.php?page=".$i."'> 
                                                    ".$i."</a></li>";   
              } 
            };   
            echo $pagLink;   
          ?> 
          </ul> 

        <!-- body2 posts end-->


      </div>
      <div class="col-3" style="height: 35vh; margin: auto; display:block;">
        <div class="row"><br><br><br>
          <div class="col-md-12 col-sm-12 post" style="text-align: center; background-color:#F8F7F3;"> <a href="addpost.php" class="media-box"><h4 style="font-weight: bold;  margin-top:35px;">Creat Post</h4></a></div>
        </div><br><br>
        <hr><br><br>
        <div class="row">
          <div class="col-md-12 col-sm-12 gallery" style="text-align: center;background-color:#F8F7F3;"> <a href="donate.php" class="media-box" ><h4 style="font-weight: bold; margin-top:35px;";>Gallery</h4> </a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- body2 end-->


  <!-- body3-->
  <div class="container">
    <div class="row">
      <div class="col-9" style="text-align: center">
        <br>
        <hr>
        <a href="latest-news.php">
          <h4>-All News-</h4>
        </a>
        <hr><br>
      </div>
      <div class="col-3">

      </div>

    </div>
  </div>
  <!-- body3 end-->



  <!-- body4-->

  <div class="body3" style="height: 25vh; width: 100%; border: 1px solid black; margin-bottom: 2vh; background-color: #0369A3; ">

  </div>
  <!-- body4 end-->








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