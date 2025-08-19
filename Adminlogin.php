 <?php 


    // admin login page
    session_start();
    include('DBConnection.php');

    if(isset($_POST['logbtn'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        // query for checked admin username and password available or not in admin table
        $sql="select *from admin where username = '$uname' AND password = '$pass'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION["adminuname"] = $uname;
           header("location: admin_dashboard.php");

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

    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>


    

    <!-- custom style -->
    <style>
    	#bg-custom{
            background-color:rgba(2,2,2,0.8);
        }
        .bg-custom{
            background-color:rgba(2,2,2,0.8);
        }
        .bg-img{
        	background-image:url('asset/img/5.jpg'); 
        	background-size: 100%;
        }
        .bg-img2{
            background-image:url('asset/img/5.jpg'); 
            background-size: 100%;
        }
        .m-cust{
        	margin-right: 250px;
        	margin-top: 60px; 
        }
    </style>

</head>
<body class="bg-img2">

	

	<!-- include header -->
   	<?php include('adminheader1.html') ?>
	
	<!--  Admin Login Page -->
	<div class="container " id="id1">
        
        <div class="modal-dialog" id="m-cust">
            <div class="modal-content bg-custom" id="bg-custom">
                <div class="modal-header">
                    <img src="asset/img/8.jpg" width="480">
                </div>
                <div class="modal-body">
                <span class=" text-danger fs-18 badge badge-light offset-5" id="er_username"></span>
                <span class="fs-18 text-danger badge badge-light offset-5" id="er_password"></span>
                    <!-- form -->
                    <div  class="text-red">
                                <span ><?php if (isset($er_invalid)){ echo "$er_invalid"; }?></span>
                            </div>
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="logForm" onsubmit="return(logvalidation());">
                        <div class="input-group">   
                            <!-- username label -->
                            <div class="input-group-prepend">
                                <span class="input-group-text alert-danger text-dark">Username</span>
                            </div>
                            <input type="text" name="username" id="uname" class="form-control" placeholder="Enter Username"> 
                        </div><!-- group1 ends -->
                        <br>
                        <div class="input-group">
                            <!-- password label -->
                            <div class="input-group-prepend">
                                 <span class="input-group-text alert-danger text-dark">
                                Password    
                                </span>
                            </div>
                            <input type="password" name="password" id="pass" class="form-control" placeholder="Enter Password">
                        </div> <!-- group2 ends -->  
                        <br>
                        <div class="input-group">
                            <input class="btn btn-success btn-block" type="submit" value="login" name="logbtn">
                        </div>  
                            
                    </form>
                </div><!-- modal-body ends -->

                <div class="modal-footer">
                    <span id="error"></span>
                    <!-- <a href="" class=" badge-pill badge-dark">Forget Password</a> -->
                </div>

            <!-- modal-content -->
            </div>
        <!-- modal-dialog ends -->
        </div>

    <!-- modal ends -->
    </div>
<!-- admin login ends -->

</body>
</html>