<?php 
    
    // page for checking pnr status and details of pnr
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");


    // execute when admin clicked on show btn 
    if (isset($_GET['show'])) {

        $pnr = $_GET['pnr'];

        // select details of pnr number from db
        $sql = "select count(p.pno) as passangers, t.train_no,t.train_name,s.source,s.destination,ti.ticket_no,
                ti.phno,ti.status,s.depart_time,s.arrival_time,ti.date, ti.username from train 
                t, station s, ticket ti, passanger p where p.ticket_no = ti.ticket_no and t.train_no = s.train_no and
                s.station_no = ti.station_no  and ti.ticket_no = '$pnr'";

        $result = $conn->query($sql);

        // select separate data from passanger table that list out all passanger have journey with specific pnr number
        $sql1 = "select *from passanger p,ticket t where t.ticket_no = p.ticket_no and t.ticket_no = '$pnr'";

        $result1 = $conn->query($sql1);
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
                <form name="payForm" onsubmit="return(pnrvalid());" class="m-5 p-5 border bg-light" action="" method="get">
                <div class="row">
                    <div class="col-12">
                        <h4 class="navbar-brand text-primary">PNR Status/cancel ticket:</h4>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="text" placeholder="Enter PNR Number" name="pnr" id="pnr" maxlength="5">
                        <span id="err_pnr" class="text-red"></span>
                    </div>
                    <div class="col-4">      
                        <input type="submit" class="btn btn-dark text-light" value="Get Status" name="show">
                    </div>
                </div>
                </form>
            </div>

        </div>
            <!-- table for trains records -->
            <div class="container">
                <table class="table table-hover bg-light text-center">
                    <?php 
                    if (isset($_GET['show'])) {

                      if($result->num_rows > 0){ ?>
                    <tr class="table-primary">
                        <th>PRN NO.</th>
                        <th>Status</th>
                        <th>No. Of Passangers</th>
                        <th>Train No.</th>
                        <th>Train Name</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Date</th>
                        <th>Mobile No.</th>
                        <th>Booked by</th>
                    </tr>
                     <?php   while($data = $result->fetch_assoc()){
                     ?>
                    <tr>
                        <td><?php echo $data['ticket_no']; ?></td>
                        <td class="text-danger text-bold"><?php echo $data['status']; ?></td>
                        <td><?php echo $data['passangers']; ?></td>
                        <td><?php echo $data['train_no']; ?></td>
                        <td><?php echo $data['train_name']; ?></td>
                        <td><?php echo $data['source']; ?></td>
                        <td><?php echo $data['destination']; ?></td>
                        <td><?php echo $data['depart_time']; ?></td>
                        <td><?php echo $data['arrival_time']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['phno']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                    </tr>
                    <?php 
                    } //while ends
                    } // if ends
                    else{
                        echo "<script> alert('invalid pnr'); </script>";
                    }
                    } //show ends 
                 ?>
                </table>
            </div>
    

            <!-- table for passanger records -->
            <div class="container">
                <table class="table table-hover bg-light text-center">
                    <?php 
                    if (isset($_GET['show'])) {

                      if($result1->num_rows > 0){ ?>
                    <tr class="table-primary">
                        <th>PNO</th>
                        <th>Name</th>
                        <th>Age </th>
                        <th>Gender </th>
                        <th>Seat No.</th>
                    </tr>
                     <?php   while($data1 = $result1->fetch_assoc()){
                     ?>
                    <tr>
                        <td><?php echo $data1['pno']; ?></td>
                        <td><?php echo $data1['p_name']; ?></td>
                        <td><?php echo $data1['p_age']; ?></td>
                        <td><?php echo $data1['p_gender']; ?></td>
                        <td><?php echo $data1['seat_no']; ?></td>
                    </tr>
                    <?php 
                    } //while ends
                    } // if ends
                    else{
                        echo "<script> alert('invalid pnr'); </script>";
                    }
                    } //show ends 
                 ?>
                </table>
            </div>


        <!-- </div> -->
</body>
</html>



