<?php 

    // this page helps to delete the train from train table
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    //  query to select train data from train table
    $sql1 = "select train_no,train_name from train";

    $result1 = $conn->query($sql1);
    
    // when user clicked on delete btn then condition execute
    if (isset($_GET['show'])) {
        $train_no = $_GET['train_no'];

        // query for deleting train from train table
        $sql = "delete from train where train_no = '$train_no'";

        if($conn->query($sql)){
            echo "<script> alert('$train_no is deleted from database');</script>";
        }
        else{
            echo $conn->error;
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
        <div class="container-fluid">
            <form name="payForm" onsubmit="return(pnrvalid());" class="m-5 p-5 border bg-light" action="" method="get">
            <div class="row">
                <div class="col-12">
                    <h4 class="navbar-brand text-primary">Train Number:</h4>
                </div>
                <div class="col-8">
                   <select name="train_no" class="input-group form-control" value="trains">
                        <option class="form-control" value="all">All train</option>
                    <?php if($result1->num_rows > 0){
                        while($data1 = $result1->fetch_assoc()){
                     ?>
                        <option class="form-control" value="<?php echo $data1['train_no']; ?>"><?php echo "( ".$data1['train_no']." ) ".$data1['train_name'] ?></option>
                    <?php 
                        } }
                     ?>
                    </select>
                </div>
                <div class="col-4">      
                    <input type="submit" class="btn btn-dark text-light" value="Delete Train" name="show">
                </div>
                <div class="col-12">
                    <div class="text-danger text-bold bg-light">
                    <hr>     
                        <h6 class="font-weight-bold">
                            Note: Delete with Caution,<br>
                            if you delete the train then all records related to this train will be deleted. <br>
                            if any PNR number connected with this train no. then user will not get the PNR status
                        </h6>
                    <hr>     
                    </div>
                </div>
            </div>
            </form>

        <!-- table for trains records -->
    
        </div>
</body>
</html>



