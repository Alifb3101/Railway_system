<?php 

    session_start();

    include('DBConnection.php');
    include('Details.php');

    // checked whther user login or logout
    if(!isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            header("location: ./index.php?logout=1");
    }
    include("header2.php");
    $train_no = '';

    //checked is show btn is clicked or not
    if (isset($_GET['show'])) {

        //stored the user entered pnr number
        $pnr = $_GET['pnr'];

        //query for fatching data related to pnr number
        $sql = "select t.train_no,t.train_name,s.source,s.destination,ti.ticket_no,
                ti.phno,ti.status,s.depart_time,s.arrival_time,ti.date, ti.username from train 
                t, station s, ticket ti where t.train_no = s.train_no and 
                s.station_no = ti.station_no and ti.ticket_no = '$pnr'";



        $result = $conn->query($sql);
    }


    //checked is user clicked cancel btn or not
    if(isset($_POST['cticket'])){

        // here also get pnr number
        $pnr = $_GET['pnr'];
        
          // stored train_number from session['train_no']
          $train_no = $_SESSION['train_no'];

                    // if ticket alredy cancel then the query not reexecute on
                    //resubmit of page 
                    //first time this is session is not set so it execute else part and cancel the ticket and increase set_avil in db
                    if(isset($_SESSION['update'])){
                        echo "<script> alert('ticket alredy cancel'); </script>";
                        // unset($_SESSION['update']);
                        // we can unset this session in index page also
                    }
                    else{

                        // instead of deleting data we used status col 
                        //if ticket cancel it going to set cancclled
                        $sql = "update ticket set status = 'cancelled' where 
                                ticket_no = '$pnr'";
                        if($conn->query($sql) == true){

                            // after update ticket status then increase set_avail by one for related train with ticket
                             $sql5 = "update train set seat_avail =  seat_avail+1 where train_no = '$train_no'";

                            if($conn->query($sql5) == true){
                                //set train_no session null, no use futher
                                $_SESSION['train_no'] = null;
                                unset($_SESSION['train_no']);

                                // set update session true so after resubmiting this page it execute the if part that is above and show msg i.e ticket is already cancelled
                                $_SESSION['update'] = true;
                            }
                            else{
                                echo $conn->error;
                            }
                            echo "<script> alert('ticket cancel'); </script>";
                        }   
                        else{
                            echo $conn->error;

                        }
                    } //session update else ends                   

    } //ends of cticket
   
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
<body class="alert-light">

	<!-- header navbar -->

<!-- search button for train -->
    <div class="container">
        <form name="payForm" onsubmit="return(pnrvalid());" class="m-5 p-5 border bg-light" action="" method="get">
        <div class="row">
            <div class="col-12">
                <h4 class="navbar-brand text-primary">PNR Status/cancel ticket:</h4>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" placeholder="Enter PNR Number" name="pnr" id="pnr" maxlength="5">
                <span id="er_pnr" class="text-red"></span>
            </div>
            <div class="col-4">      
                <input type="submit" class="btn btn-dark text-light" value="Get Status" name="show">
            </div>
        </div>
        </form>
    </div>

<!-- table for trains records -->
    <div class="container">
        <table class="table table-bordered text-center">
            <?php 
            if (isset($_GET['show']) || isset($_POST['cticket'])) {

              if($result->num_rows > 0){ ?>
            <tr class="table-primary">
                <th>PRN NO.</th>
                <th>Status</th>
                <th>Train No.</th>
                <th>Train Name</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Date</th>
                <th>Mobile No.</th>
                <th>Booked by</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
             <?php   while($data = $result->fetch_assoc()){
             ?>
            <tr>
                <td><?php echo $data['ticket_no']; ?></td>
                <td class="text-danger text-bold"><?php echo $data['status']; ?></td>
                <td><?php echo $data['train_no']; ?></td>
                <?php $_SESSION['train_no'] = $data['train_no']; ?>
                <td><?php echo $data['train_name']; ?></td>
                <td><?php echo $data['source']; ?></td>
                <td><?php echo $data['destination']; ?></td>
                <td><?php echo $data['depart_time']; ?></td>
                <td><?php echo $data['arrival_time']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['phno']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="trainno" value="<?php echo $data['train_no'] ;?>">
                        <button name="cticket" class="text-light btn btn-dark hvr-grow"> Cancel Ticket</button>
                    </form>
                </td>
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



    <!-- Footer -->
    <?php include('footer.html') ?>
	
</body>
</html>



<script type="text/javascript">

    function pnrvalid(){
            // alert("call in validation");
            var pnr = document.payForm.pnr.value;

            var numbers = /^[0-9]+$/;

            if (pnr == "" ) {
                document.getElementById("er_pnr").innerHTML="ENTER PRN NO";
                document.getElementById("pnr").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pnr").focus();
                return false;
            }
            else{
                document.getElementById("er_pnr").innerHTML="";
                document.getElementById("pnr").style="border:none;box-shadow:none";           
            }

            if (!pnr.match(numbers)) {
                document.getElementById("er_pnr").innerHTML="enter only numbers";
                document.getElementById("pnr").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pnr").focus();
                return false;
            }
            else{
                document.getElementById("er_pnr").innerHTML="";
                document.getElementById("pnr").style="border:none;box-shadow:none";           
            }
            // if (pnr.length > 5 || pnr.length < 5) {
            //     document.getElementById("er_pnr").innerHTML="enter 5 digit valid number";
            //     document.getElementById("pnr").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
            //     document.getElementById("pnr").focus();
            //     return false;
            // }
            // else{
            //     document.getElementById("er_pnr").innerHTML="";
            //     document.getElementById("pnr").style="border:none;box-shadow:none";           
            // }
            return true;


        }


</script>