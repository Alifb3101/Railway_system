<?php 

    // page helps to see tickets on different input
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    // execute when user clicked on view btn
    if (isset($_GET['show'])) {
        $date ='';
        $count = 0;
        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];
        $status = $_GET['ticket'];
    
        // if admin entered two date then this will execute
        if(!empty($date1) && !empty($date2)){
            // and also if user select status(booked/cancelled) execute this one
            if(!empty($status)){
                $sql = " select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date between '$date1' and '$date2' and ti.status = '$status' ";
            }
            else{
                // select data between two dates and status=all
                $sql = "select t.train_name, ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date between '$date1' and '$date2'";
            }

        } 
        else {

            // if admin select only one date
            if(!empty($date1)){
                $date = $date1;

            }
            else if(!empty($date2)){
                $date = $date2;
                    // echo "<script> alert('if2 $date'); </script>";

            }
            else{
                echo "<script> alert('select aat least one date'); </script>";
            }
            if(!empty($status)){
                // if not empty then select specific status data
                $sql = "select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date = '$date' and ti.status = '$status'";
            }
            else{
                $sql = "select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date = '$date'";

            }
        }
       


        $result = $conn->query($sql);
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
            <div class="container">
                <form name="payForm" onsubmit="" class="m-5 p-5 border bg-light" action="" method="get">
                <div class="row">
                    <div class="col-12">
                        <h4 class="navbar-brand text-primary">Ticket Details:</h4>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">From:</span>
                        <input class="form-control" type="date" value="<?php echo $date1; ?>" name="date1" id="date1">
                        <span id="er_date1" class="text-red"></span>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">To:</span>
                        <input class="form-control" type="date" value="<?php echo $date2; ?>" name="date2" id="date2">
                        <span id="er_date2" class="text-red"></span>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">Tickets:</span>
                        <select name="ticket" class="input-group form-control">
                        <option class="form-control" value="">All Tickets</option>
                        <option class="form-control" value="booked">Booked</option>
                        <option class="form-control" value="cancelled">Cancelled</option>
                    </select>
                        <span id="er_pnr" class="text-red"></span>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 col-sm-4 offset-8">      
                        <input type="submit" class="btn btn-dark text-light" value="View Tickets" name="show">
                    </div>
                </div>
                </form>
            </div>

        </div>
            <!-- table for trains records -->
            <div class="container">
                <div>
                    <?php
                     function setCount($count){ 
                        echo "<span class='text-bold bg-light p-2'><b class='text-dark'>Total Tickets:</b>  ".$count."</span>"; 
                    }?>
                </div>
                <table class="table table-hover bg-light text-center">
                    <?php 
                    if (isset($_GET['show'])) {

                      if($result->num_rows > 0){ ?>
                    <tr class="table-primary">
                        <th>PRN NO.</th>
                        <th>Status</th>
                        <th>Train No.</th>
                        <th>Train Name</th>
                        <th>Date</th>
                        <th>Mobile No.</th>
                        <th>Booked by</th>
                    </tr>
                     <?php   while($data = $result->fetch_assoc()){
                        $count++;
                     ?>
                    <tr>
                        <td><?php echo $data['ticket_no']; ?></td>
                        <td class="text-danger text-bold"><?php echo $data['status']; ?></td>
                        <td><?php echo $data['train_no']; ?></td>
                        <td><?php echo $data['train_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['phno']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                    </tr>
                    <?php 
                    } //while ends
                    setCount($count);
                    } // if ends
                    else{
                        echo "<script> alert('No tickets booked on this dates'); </script>";
                        echo $conn->error;
                    }
                    } //show ends 
                 ?>
                </table>
            </div>
    
        <!-- </div> -->
   
</body>
</html>



