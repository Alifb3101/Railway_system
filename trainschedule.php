<?php 
    
    // this page shows the trains that available 
    session_start();
    include("DBConnection.php");

    // checked whther user login or logout
    if(isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            include("header2.php");
    }
    else{
            include("header.html");
    }

    // count var is used for sr.no
    $count = 1;

    // this query used to fetch train_name and train_no from train table
    // and shows train_no and name into seach box
    $sql1 = "select train_no,train_name from train";

    $result1 = $conn->query($sql1);
    
    // if execute when user clicked on show btn
    // so that it shows train details
    if (isset($_GET['schedule'])) {
        $train_no = $_GET['train_no'];
        $sql2 = "select t.train_no,t.train_name,s.source,s.arrival_time,s.destination,
                s.depart_time,s.duration,s.station_no from train t,station s 
                where s.train_no = t.train_no and t.train_no = '$train_no'";

        $result2 = $conn->query($sql2);
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

    </style>

</head>
<body class="bg-light">

	<!-- header navbar -->

<!-- search button for train -->
    <div class="container">
        <form class="m-5" action="" method="get">
        <div class="row">
            <div class="col-12">
                <h4 class="navbar-brand text-primary">Train Shedule:</h4>
            </div>
            <div class="col-8">
                <select name="train_no" class="input-group form-control" value="trains">
                    <option class="form-control" value="">Select train</option>
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
                <input type="submit" class="btn btn-dark text-light" value="Search" name="schedule">
            </div>
        </div>
        </form>
    </div>

<!-- table for trains records -->
    <div class="container">
        <table class="table table-bordered table-hover text-center">
            <?php 
                 if (isset($_GET['schedule'])) {

                if($result2->num_rows > 0){ ?>
            <tr class="table-primary">
                <th>Sr.no</th>
                <th>Train Name</th>
                <th>Train No.</th>
                <th>Source Location</th>
                <th>Destination location</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
            </tr>
             <?php   while($data2 = $result2->fetch_assoc()){
             ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $data2['train_name']; ?></td>
                <td><?php echo $data2['train_no']; ?></td>
                <td><?php echo $data2['source']; ?></td>
                <td><?php echo $data2['destination']; ?></td>
                <td><?php echo $data2['depart_time']; ?></td>
                <td><?php echo $data2['arrival_time']; ?></td>
            </tr>
            <?php $count++; }}} ?>
        </table>
    </div>



    <!-- Footer -->
    <?php include('footer.html') ?>
	
</body>
</html>