<?php 
    
    // page for view feedbacks that were sent by users
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    // select data from contact page
    $sql = "select *from contact";
    $result = $conn->query($sql);


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

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>
    <style>




        .logo{
            border-radius: 1000px;
        }
        div.shadow-cust{
            width: 230px;
            background-color: #DCEEFF;
       }
       .shadow-cust{
            box-shadow: 3px 3px 5px 0px #333;
       }
       i.fa-circle{
            box-shadow:inset 0px 0px 3px 0px #222;
            border-radius: 10px;  
       }

          /* Admin Menu */
          .admin-menu {
            background-color: #f4f4f4; /* Deep Blue */
            color: white;
            padding: 20px;
            text-align: center;
        }

        .admin-menu a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .admin-menu a:hover {
            background-color: #1abc9c; /* Bright Teal */
        }

    </style>

</head>
<body class="bg-img">
    <div class="admin-menu">    
	   <?php include("adminmenu.html"); ?>
    </div>
    <div class="container-fluid col-12 col-sm-8 bg-white mt-5 border-radius">
        <?php if($result->num_rows > 0){ ?>
        <div class="row text-bold-16 fs-18 bg-ccc p-3 border-radius">
            <div class="col-1">ID</div>
            <div class="col-3">NAME</div>
            <div class="col-4">EMAIL</div>
            <div class="col-4">MESSAGE</div>
        </div>
        <div class="col-12"><hr></div>
        <?php while($data = $result->fetch_assoc()){ ?>
        <div class="row text-dark fs-16 font-arial">
            <div class="col-1 col-sm-1"><?php echo $data['id'] ?></div>
            <div class="col-2 col-sm-3"><?php echo $data['name'] ?></div>
            <div class="col-6 col-sm-4"><?php echo $data['email'] ?></div>
            <div class="col-12 col-sm-4"><?php echo $data['message'] ?></div>
        </div>
        <div class="col-12"><hr></div>
    <?php }} ?>
    </div>
    
</body>
</html>



