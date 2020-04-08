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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letest News</title>
</head>

<body>

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

        <link rel="stylesheet" href="style.css">


        <title>Contact Us</title>
    </head>

    <body>

        <div class="design" style="background-color: #0369A3; height: 20vh;margin-top: 0px;padding-top: 0px;">

        </div>

        <!-- extra spc -->
        <div class="margin" style="height: 8vh; background-color:#F8F7F3; display:block; position:relative;">

            <h3 class="contact">LATEST NEWS</h3>

        </div>
        <!-- extra spc end -->

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

    <br><br><br>

    <!-- body1-->
    <div class="container" style="margin-top: 2vh; margin-bottom: 2vh; ">
        <div class="row">
            <div class="col-md-8 col-sm-12">
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
                              $pagLink .= "<li class='active'><a href='latest-news.php?page="
                                                                .$i."'>".$i."</a></li>"; 
                          }             
                          else  { 
                              $pagLink .= "<li><a href='latest-news.php?page=".$i."'> 
                                                                ".$i."</a></li>";   
                          } 
                        };   
                        echo $pagLink;   
                      ?> 
                      </ul> 

            </div>


            <div class="col-md-3 col-sm-12" style=" height: 100vh; font-size: 130%; ">
                <h4 style="font-size: 150%">Importent Links</h4><br>
                <div class="margin" style=" border: 3px solid  #F8F7F3"></div>
                <br><br><br>

                <a href="">
                    <h4>Facebook</h4>
                </a> <br>
                <hr> <br>

                <a href="">
                    <h4>Twitter</h4>
                </a> <br>
                <hr> <br>

                <a href="">
                    <h4>Github</h4>
                </a> <br>
                <hr> <br>


            </div>


        </div>

    </div>
    <!-- body1 end-->

</body>

</html>





<?php

include("includes/footer.php")

?>