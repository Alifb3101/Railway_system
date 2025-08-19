<?php 

    session_start();
    include("DBConnection.php");

    // checked whther user login or logout
    if(isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            // echo "<script> alert('$uname'); </script>";
            include("header2.php");
    }
    else{
            include("header.html");
    }


 ?>

<!doctype html>
<html lang="en">
<head>
	<title>Rubi</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- :start of optional css-->

    <!-- font-awesome for icon -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="asset/css/animate.css">

    <!-- hover css animations -->
    <link rel="stylesheet" href="asset/css/hover-min.css">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">


    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style>

        .bg-black{
            background-color:black;
        }
        .bg-img{
            background-image: url('asset/img/stays/homebg.jpg');
            background-size: 100%;
            /*background-attachment: fixed;*/
        }
        .bg-img2{
            background-image: url('asset/img/stays/homebg.jpg');
            /*background-color: black;*/
            background-size: 100%;
            background-attachment: fixed;
        }
        .custom-img{    
            border: 1px solid white;
            border-radius: 5px;
            height: 200px;
            width: 300px;
        }
        .custom-mt{
            margin-top: 190px;
        }
        .carousel-inner {
            width: 100px;
        }
        .custom-text{
            font-size: 32px;
            margin-top: 100px;
            font-weight: bold;
            font-family: Arial Rounded MT Bold;
            color: #ddd;
        }

    </style>

</head>
<body class="bg-img">

	<!-- header navbar -->
  

<div class="container mb-5">

        <h5 class="text-center custom-text">Rubi Hotels</h5>

<!-- row -->
    <div class="row" >
        <div class="col-sm-12 custom-mt">
          <!-- *********************************** -->

            <div class="carousel slide" id="test" data-ride="carousel" data-interval="2000">
           

                <div class="carousel-inner pl-5">
                    
                    <div class="carousel-item active">
                        <div class="row">
                           
                            <div class="col-4">
                                <a href="" data-target="#delhi" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/01delhi.jpg">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" data-target="#raipur" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/02raipur.jpg">
                                </a>
                            </div>
                            
                            <div class="col-4">
                                <a href="" data-target="#digha" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/03digha.jpg">
                                </a>                            
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                           
                            <div class="col-4">
                                <a href="" data-target="#haridwar" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/04haridwar.jpg">
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="" data-target="#indore" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/05indore.jpg">
                                </a>
                            </div>
                            
                            <div class="col-4">
                                <a href="" data-target="#katra" data-toggle="collapse">
                                    <img class="custom-img" src="asset/img/stays/06katra.jpg">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="carousel-item">
                        <div class="row">
                           
                            <div class="col-4">
                                <a href="">
                                    <img class="custom-img" src="asset/img/stays/05indore.jpg">
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="">
                                    <img class="custom-img" src="asset/img/stays/06katra.jpg">
                                </a>                            
                            </div>
                            <div class="col-4">
                                <a href="">
                                    <img class="custom-img" src="asset/img/stays/07madurai.jpg">
                                </a>
                            </div>
                            
                        </div>
                    </div> -->
                   
                </div>


                <!-- controls -->
                <a href="#test" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#test" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div> <!-- col ends -->
    </div> <!-- row ends -->
</div> <!-- container ends -->

<div class="accordian bg-img2" id="acc">
<!-- card for showing the hotels in delhi -->
<div class="collapse" id="delhi" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/01delhi.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="delhi" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow hvr-grow" src="asset/img/stays/01delhi.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="delhi" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/01delhi.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>          
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="delhi" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/01delhi.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="delhi" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/01delhi.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
</div> <!-- container ends -->
</div>
<br>



<!-- card for showing the hotels in raipur -->
<div class="collapse" id="raipur" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/0201.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>           
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="raipur" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/0202.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="raipur" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/0203.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow ">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="raipur" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/0101.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow ">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="raipur" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/0301.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
</div> <!-- container ends -->
</div>
<br>




<!-- card for showing the hotels in digha -->
<div class="collapse" id="digha" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/03digha.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="digha" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/03digha.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="digha" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/03digha.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="digha" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/03digha.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="digha" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/03digha.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
</div> <!-- container ends -->
</div>
<br>









<!-- card for showing the hotels in haridwar -->
<div class="collapse" id="haridwar" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/04haridwar.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="haridwar" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/04haridwar.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="haridwar" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/04haridwar.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="haridwar" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/04haridwar.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="haridwar" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/04haridwar.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
</div> <!-- container ends -->
</div>
<br>





<!-- card for showing the hotels in indore -->
<div class="collapse" id="indore" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/05indore.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="indore" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/05indore.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="indore" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/05indore.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="indore" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/05indore.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="indore" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/05indore.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
</div> <!-- container ends -->
</div>
<br>





<!-- card for showing the hotels in katra -->
<div class="collapse" id="katra" data-parent="#acc">
<div class="container bg-light p-4" >
    <!-- new hotel -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/06katra.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div>  -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="katra" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/06katra.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="katra" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/06katra.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="katra" data-parent="#acc"> -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/06katra.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<br>
<!-- new hotel -->
    <!-- <div class="collapse" id="katra" data-parent="#acc">  -->
        <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- <div class="card-header"> -->
                            <img class="card-img-top hvr-grow" src="asset/img/stays/06katra.jpg" width="200">
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow hvr-shadow">
                        <div class="card-body">
                            <h5 class="text-primary">Collection O 44957 Landmark Square New Rajendra Nagar</h5>
                            <span><i class="fa fa-map-marker text-danger"></i>&nbsp;locationl</span>
                            <br><br>
                            <h6>
                                <span>start :&nbsp;</span>&nbsp;<b>12:00 - 20:00</b><br>
                                <span>stop :&nbsp;</span>&nbsp;<b>01:00 - 02:00</b>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 ">
                        <div class="card-footer text-center text-bold mt-5">
                           <span>900/-rs</span><br>
                           <span>Available</span>
                        </div>
                    </div>               
                </div>
        </div>
    <!-- </div> -->
<!-- <br> -->
</div> <!-- container ends -->
</div> 

</div> <!-- accordian ends -->



    <!-- Footer -->
    <?php include('footer.html') ?>




    <!-- modal for stays  -->
    <!-- 1st modal -->
    <div class="modal fade" style="width: 2000px;" id="delhi">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                    <h3 class="m-1 text-center">Goa</h3>
                <div class="modal-body">
                    
                       <!-- <div class="container"> -->
                           <!-- <div class="card">
                               <div class="row">
                                   <div class="col-4">
                                       <div class="card-header">
                                           <img src="asset/img/stays/01delhi.jpg">
                                       </div>
                                   </div>
                                   <div class="col-6">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        </div>
                                   </div>
                                   <div class="col-12 col-md-2">
                                       <div class="card-footer">
                                           <button class="btn btn-danger"></button>
                                       </div>
                                   </div>           
                               </div>
                           </div> -->
                       <!-- </div> -->

                </div>
                
            </div>
        </div>
    </div>
    <!-- 1st modal ends -->



	
</body>
</html>