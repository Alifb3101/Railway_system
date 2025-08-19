<?php 
    session_start();
    include('DBConnection.php');

    //check is login btn cliked or not
    if(isset($_POST['logbtn'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        //check entered username and password is in db
        $sql="select *from user where username = '$uname' AND password = '$pass'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION["uname"] = $uname;
            
            //redirect to index page with success=1
           header("location: index.php?success=1");

        }
        else{
            $er_invalid = "invalid username & password";
        }
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

         #bg-custom{
            background-color:rgba(2,2,2,0.8);
        }
        #m-cust{
            margin-right: 250px;
            margin-top: 60px; 
        }
        .bg-black{
            background-color:black;
        }
        .bg-img{
            background-image: url('asset/img/7.jpg');
            /*background-repeat: no-repeat;*/
            background-size: 100%;
            max-width: 1300px;
            min-height: 700px;
            /*opacity: 0.8;*/
        }
        @media(max-width: 400px){
            .bg-img{
                background-image: url('asset/img/5.jpg');
                background-size: auto;
                background-repeat: no-repeat;
                /*background-position: center*/

            }
        }

        .bg-img2{
            background-image:url('asset/img/5.jpg'); 
            background-size: 100%;
        }
        .pnr{
            background-color: white;
            color: black;
            /*width: 340px;*/
            padding-top: 10px;
            box-shadow: 2px 2px 18px 10px #222;
            border-radius: 2px;
        }
        
        .fs-1{
            font-size: 42px;
            font-family: Tempus Sans ITC;
            margin-top: 50px;
        }
        .fs-2{
            font-size: 18px;
            font-family: Yu Gothic Light;
            font-weight: lighter;
            margin-bottom: 50px; 
        }
        .main-name{
            font-size: 50px;
            font-family: Arial Rounded MT Bold;
            margin-top: 0px;
            background-color: rgba(2,2,2,0.2);
            /*background-color: #116;*/
            border-radius: 5px;
            width:560px;
            padding-left: 50px;

        }

    </style>

</head>
<body class="bg-black">
    
    <!-- include header -->
    <?php include('navbar1.html') ?>



    <!-- container -->
    <!-- 1st row -->
    <!-- its show box for serching train and image that used @background -->
    <div class="row bg-img text-light">

        <!-- col 1 -->
        <div class="col-12 col-sm-12 col-md-4 offset-1">
            <!-- PNR status box -->
            <div class="row pnr m-5 text-center">
                    <div class="col-12 mt-3">
                        <span><img src="asset/img/logo/rail_icon.png"></span><br>
                        <span class="fs-1">Login</span>
                    </div>
                    <div class="col-12 mt-4">
                       <!-- form tag -->
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" name="logForm" onsubmit="return(logvalidation());" method="post">
                            <div  class="text-red">
                                <span ><?php if (isset($er_invalid)){ echo "$er_invalid"; }?></span>
                            </div>
                            <div class="input-group">   
                                <!-- <div class="prepend">
                                    <span class="input-group-text">Username</span>
                                </div> -->
                                <input type="text" name="username" class="text-center form-control" placeholder="Enter Username" id="uname">  
                            </div><!-- group1 ends -->
                            <!-- er_pass1 code -->
                            <div  class="text-red">
                                <span id="er_username"></span>
                            </div>
                            
                            <br>
                            <div class="input-group">
                                <input type="password" name="password" class="text-center form-control" placeholder="Enter Password" id="pass">
                            </div> <!-- group2 ends-->  
                            <!-- er_pass1 code -->
                            <div  class="text-red">
                                <span id="er_password"></span>
                            </div>
                            <br>

                            <div class="input-group">
                                <input type="submit" name="logbtn" class="btn text-light bg-blue btn-block" value="Login">
                            </div>
                            <div class="col-8 offset-5 mt-2">
                                <a href="" class="text-dark btn btn-light p-0" style="text-decoration: none; ">forget password</a>
                            </div><br>  
                        </form>
                    </div>
            </div>                    
        </div>


        <!-- col 2 and title of system-->
        <div class="sm-hide col-sm-6 offset-0">
            <div class="text-left main-name">
                <span>Rubi Enterprises</span>
            </div>
        </div>
        
    </div> <!-- ends of row first -->



    <!-- include footer -->
    <div class="row wd ">
            <div class="col-12 text-light text-center bg-black p-3">
                Copyright &copy; 2020 | All rights reserved <br>
                Developed by sal student
            </div>
       </div> 
</body>
</html>