<?php 

    session_start();
    include("DBConnection.php");

    // checked whther user loggedin or loggedout
    if(isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            include("header2.php"); //if login add header2.php
    }
    else{
            include("header.html"); //otherwise add header.php
    }

    //check is button contact clicked or not
    if(isset($_POST['contact'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $msg = $_POST['msg'];

      //check that the same contact details is stored in db or not 
      // if not then add name email and msg to db
      $sql1 = "select *from contact where name='$name' and email = '$email' and message = '$msg'";

      $result = $conn->query($sql1);
      if($result->num_rows > 0){
        echo "<script> alert('You already contact us');</script>";
      }
      else{
        $sql = "insert into contact values('','$name','$email','$msg')";

        if($conn->query($sql) == true){
          echo "<script> alert('thanks for contact us');</script>";
        }
        else{
          echo $conn->error;

        }
      }
    } //ends of post->contact

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
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">


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
        	background-image:url('asset/img/10.jpg'); 
        	background-size: 100%;
        }
        .bg-img2{
            background-image:url('asset/img/18.jpg'); 
            background-size: 100%;
        }
        .m-cust{
        	margin-right: 250px;
        	margin-top: 60px; 
        }
        

  .container {
    padding: 60px 60px;
    margin: 60px;
    border-radius: 10px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .row{
    border-radius: 10px;
  }
  
  

  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
    </style>

</head>
<body class="bg-img2">


	<!-- include header -->
	
	<!-- Container (Contact Section) -->
<div id="contact" class="container bg-img">
  <h2 class="text-center">CONTACT</h2> <span id="error" class="text-danger text-bold offset-8"></span>
  <div class="row bg-grey pt-3">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="fa fa-map-marker"></span> Ahmedabad, India</p>
      <p><span class="fa fa-phone"></span> +91 9909085071</p>
      <p><span class="fa fa-envelope"></span>alifb3101@gmail.com</p>
    </div>
    <!-- on submitting of this form check the validation by calling to contactvalid(); -->
    <form action="" method="post" name="conForm" onsubmit="return(contactvalid());" class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" >
        </div>
        <div class="col-sm-6 form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="email"  >
        </div>
      </div>
      <textarea class="form-control" id="msg" name="msg" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <input type="submit" value="Send" name="contact" class="btn btn-dark btn-block pull-right" >
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>


<script type="text/javascript">
  
  function contactvalid(){
            var name = document.conForm.name.value;
            var email= document.conForm.email.value;
            var msg= document.conForm.msg.value;
            var alpha = /^[a-zA-Z]+$/;
            if (name == "") {
                 document.getElementById("error").innerHTML="enter name";
                document.getElementById("name").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("name").focus();
                return false;
            }
            else{
                document.getElementById("error").innerHTML="";
                document.getElementById("name").style="border:none;box-shadow:none";           
            } 


            if (email == "" ) {
                document.getElementById("error").innerHTML="enter email id";
                document.getElementById("email").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("email").focus();
                return false;
            }
            else{
                document.getElementById("error").innerHTML="";
                document.getElementById("email").style="border:none;box-shadow:none";           
            }
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
         
            if (atpos < 1 || ( dotpos - atpos < 2 )) {
                document.getElementById("error").innerHTML="please enter correct email id";
                document.getElementById("email").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("email").focus();
                return false;
            }
            else{
                document.getElementById("error").innerHTML="";
                document.getElementById("email").style="border:none;box-shadow:none";           
            }

            if (msg == "") {
                 document.getElementById("error").innerHTML="enter somthing";
                document.getElementById("msg").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("msg").focus();
                return false;
            }
            else{
                document.getElementById("error").innerHTML="";
                document.getElementById("msg").style="border:none;box-shadow:none";           
            }
            return true; 
  } 

</script>