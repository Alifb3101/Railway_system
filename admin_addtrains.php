<?php 

    // this page helps admin to add trains in db
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    // when user clicked add btn then if execute
    if(isset($_POST['add'])){
        $train_no = $_POST['trainno'];
        $train_name  = ucwords($_POST['trainname']);
        $seat  = $_POST['seat'];
        $class  = $_POST['class'];
        $src  = ucwords($_POST['src']);
        $dest  = ucwords($_POST['dest']);
        $depart  = $_POST['depart'];
        $arr  = $_POST['arr'];
        $fare  = $_POST['fare'];

        // calculate the duration between time
        $duration = round(abs(strtotime($depart) - strtotime($arr)) / 3600,1);

        // funtion for executing insert query
        function insertQuery($conn,$sql){
            if($conn->query($sql) == true){
                echo "<script>alert('New Train Added');</script>";
            }
            else{
                // echo "<script>alert('already inserted');</script>";
                echo $conn->error;
            }
        }

        // query for inserting data into train table
        $sql1 = "insert into train values('$train_no','$train_name','$seat','$class')";

        // call to insertQuery()
        insertQuery($conn,$sql1);
        

        // query for select data from train table for checking whether train is alredy addded or not 
        // if not added then execute else part and add train-details
        $sql2 = "select * from station s,train t where s.train_no = t.train_no and s.source = '$src' and s.destination = '$dest' and duration = '$duration'";

        $result = $conn->query($sql2);
        if($result->num_rows > 0){
                echo "<script>alert('Train Already Added');</script>";
        }
        else{
            $sql3 = "insert into station values('','$src','$dest','$fare','$arr','$depart','$duration','$train_no')";
            unset($_POST['add']);
            insertQuery($conn,$sql3);
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
       .text-main h5, .text-main{
            font-size: 16px;
            font-weight: bold;
            color: #333;
            font-family: serif;
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
        
        body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin: 40px auto;
    }

    .text-main h5 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control,
    .custom-select {
        border: 1px solid #ced4da;
        border-radius: 8px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus,
    .custom-select:focus {
        border-color: #2c3e50;
        box-shadow: 0 0 5px rgba(44, 62, 80, 0.5);
    }

    .btn-success {
        background-color: #2c3e50;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .btn-success:hover {
        background-color: #1a252f;
    }

    .text-red {
        color: #e74c3c;
        font-size: 0.85rem;
    }

    hr {
        border-top: 1px solid #dee2e6;
        margin: 20px 0;
    }


    </style>

</head>
<body class="bg-img">
        <div class="admin-menu">    
    	   <?php include("adminmenu.html"); ?>
        </div>

        <div class="container-fluid">
    <form action="" method="post" name="train" onsubmit="return(validtrain())">
        <div class="form-container row">
            <!-- Train No -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Train No<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="trainnoid" name="trainno" maxlength="5">
                <span id="er_trainno" class="text-red"></span>
            </div>

            <!-- Train Name -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Train Name<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input name="trainname" type="text" id="trainnameid" class="form-control">
                <span id="er_trainname" class="text-red"></span>
            </div>

            <div class="col-12"><hr></div>

            <!-- Seat Availability -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Seat Availability<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input type="text" id="seatid" name="seat" class="form-control">
                <span id="er_seat" class="text-red"></span>
            </div>

            <!-- Class -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Class<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <select class="custom-select" name="class">
                    <option value="ALL">All Classes</option>
                    <option value="AC">AC</option>
                    <option value="SL">Sleeper(SL)</option>
                </select>
                <span id="er_class" class="text-red"></span>
            </div>

            <div class="col-12"><hr></div>

            <!-- Source -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Source<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="srcid" name="src">
                <span id="er_src" class="text-red"></span>
            </div>

            <!-- Destination -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Destination<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="destid" name="dest">
                <span id="er_dest" class="text-red"></span>
            </div>

            <div class="col-12"><hr></div>

            <!-- Departure Time -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Departure Time<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="departid" name="depart">
                <span id="er_depart" class="text-red"></span>
            </div>

            <!-- Arrival Time -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Arrival Time<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="arrid" name="arr">
                <span id="er_arr" class="text-red"></span>
            </div>

            <div class="col-12"><hr></div>

            <!-- Fare -->
            <div class="col-sm-6 col-md-3">
                <div class="text-main">
                    <h5>Fare<span class="text-red">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <input class="form-control" type="text" id="fareid" name="fare">
                <span id="er_fare" class="text-red"></span>
            </div>

            <!-- Submit -->
            <div class="col-sm-6 col-md-3 offset-1 mt-4">
                <input class="btn btn-success" type="submit" value="Add Details" name="add">
            </div>
        </div>
    </form>
</div>

</body>
</html>

