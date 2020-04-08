<?php

include("includes/header.php");

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

    <link rel="stylesheet" href="style.css">


    <title>Contact Us</title>
</head>
<body>

    <div class="design"  style="background-color: #0369A3; height: 20vh;margin-top: 0px;padding-top: 0px;" >

    </div>


    <!-- extra spc -->
    <div class="margin" style="height: 8vh; background-color:#F8F7F3; display:block; position:relative;">

        <h3 class="contact">CONTACT US</h3>

    </div>
    <!-- extra spc end -->
    <br>

<!--map-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12283.372529487215!2d90.37885090052774!3d23.75206820539032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ada2664e21%3A0x3c872fd17bc11ddb!2sCSE%20Building%2C%20Daffodil%20International%20University!5e0!3m2!1sen!2sus!4v1582352300538!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>

            <div class="col-md-4">
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
    <!--map end-->
    <br>


    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" id="contactform" name="contactform" class="contact-form" action="">
                    <div class="container" style="margin-top: 2vh; margin-bottom: 2vh;">
                        <div class="row">
                            <div class="col-md-4 col-sm-12" >
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control input-lg" placeholder="Name*">
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email*">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <textarea cols="6" rows="7" name="message" class="form-control input-lg" placeholder="Message"></textarea>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-3 col-sm-12">
                            <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm" value="Submit now" style="font-size: 120%;">
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!--form end-->




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