<?php 

    //header which has logout btn and also have username who have been currently login
    // session_start();

    include('DBConnection.php');

    $uname = $_SESSION['uname'];
    //take data of user who currently login from the user table
    $sql = "select * from user where username = '$uname'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            //taking first & last name of user
            $name = $row["first_name"]." ".$row["last_name"];
        }
    }
    else{
        echo $conn->error;
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

    <style>

        /*.bg-img{
            background-image: url('asset/img/7.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }*/

    </style>

</head>
<body>
<div class="bg-black">
    <nav class="navbar bg-dark navbar-dark navbar-expand-sm mb-1">

        <button class="navbar-toggler" data-target="#myNav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand ml-auto"><a href="index.php" class="text-light hvr-grow" style="text-decoration: none;">Rubi enterprises</a></div>
        <div class="navbar-collapse collapse" id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link">welcome, <?php echo $name ?></a></li>
                <li class="nav-item"><a href="" class="nav-link">
                    <script type="text/javascript">
                        var today = new Date();
                        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                        var time = " [ " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()+ " ]";
                        var dateTime = date+' '+time;
                        document.write(dateTime);
                    </script></a></li>
                <li class="nav-item"><a href="logout.php?logout=1" class="nav-link text-light ">Logout</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link text-light">Register</a></li>
                <li class="nav-item"><a href="Adminlogin.php" class="nav-link text-danger">Admin Login</a></li>
            </ul>
        </div>
    </nav>

<!-- get system current time script -->
<script type="text/javascript">
    function dateTime(){
    var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
    return dateTime;
}
</script>

    <nav class="navbar  navbar-dark navbar-expand-sm">
        
        <div class="navbar-brand ml-auto">
            <img class="" src="asset/img/logo/passangerW.png">
            Rubi
        </div>
                
        <div class="navbar-collapse collapse" id="myNav">
            <ul class="navbar-nav ml-5">
                <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i></a></li>
                <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Trains</a>
                    <div class="dropdown-menu">
                        <a href="trainschedule.php" class="dropdown-item">Train Schedule</a>
                        <a href="pnrstatus.php" class="dropdown-item">PNR Status</a>
                        <a href="pnrstatus.php" class="dropdown-item">Cancel Ticket</a>
                        <a href="index.php" class="dropdown-item">Book Ticket</a>
                    </div>
                </li><li class="nav-item"><a href="places.php" class="nav-link">Historical Places</a></li>
                <li class="nav-item"><a href="stays.php" class="nav-link">Stays</a></li>
                </li><li class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    
    </nav>
</div>
</body>
</html>