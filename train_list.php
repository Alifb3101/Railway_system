<?php 

    // this page showing train-list to user on there entered inputs
    session_start();

    include('DBConnection.php');
    include('Details.php');

    // checked whther user login or logout
    if(!isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            header("location: ./index.php?logout=1");
    }
    
    include("header2.php");
    
    //taking this data from index page and also from same page    
    $src = ucwords($_POST['src']);
    $dest = ucwords($_POST['dest']);
    $class = ucwords($_POST['class']);
    $date = ucwords($_POST['date']);
    
    // query for fetching data related to source and destination 
    $sql = "select t.train_no,t.train_name,s.source,s.arrival_time,s.destination,
            s.depart_time,s.duration,t.seat_avail,t.class,s.station_no,s.fare from train t,station s 
            where s.source = '$src' and s.destination = '$dest' and 
            s.train_no = t.train_no";

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

    <!-- :end of optional css -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>
    <style>

         #bg-custom{
            background-color:rgba(2,2,2,0.8);
        }
        #m-cust{
            margin-right: 250px;
            margin-top: 60px; 
        }
        .bg-black{
            background-color:black;
        }
        .bg-img{
            background-image: url('asset/img/7.jpg');
            /*background-repeat: no-repeat;*/
            background-size: 100%;
            max-width: 1300px;
            min-height: 700px;
            /*opacity: 0.8;*/
        }
        @media(max-width: 400px){
            .bg-img{
                background-image: url('asset/img/5.jpg');
                background-size: auto;
                background-repeat: no-repeat;
                /*background-position: center*/

            }
        }

        .bg-img2{
            background-image:url('asset/img/5.jpg'); 
            background-size: 100%;
        }
        .pnr{
            background-color: white;
            color: black;
            /*width: 340px;*/
            padding-top: 10px;
            box-shadow: 2px 2px 18px 10px #222;
            border-radius: 2px;
        }
        
        .fs-1{
            font-size: 42px;
            font-family: Tempus Sans ITC;
            margin-top: 50px;
        }
        .fs-2{
            font-size: 18px;
            font-family: Yu Gothic Light;
            font-weight: lighter;
            margin-bottom: 50px; 
        }
        .form-control{
            width: 80px;
        }
        

    </style>

</head>
<body class="bg-light">
    
    <!-- include header -->
	<!-- <?php //include('header2.php'); ?> -->


<div class="container-fluid bg-light shadow">
    <div class="row">
        <div class="col-12 col-sm-1 mt-5 pt-4">
            <img src="asset/img/logo/rail_icon.png">
        </div>
        <div class="col-12 col-sm-11 pt-5 pb-5">
            <form action="" method="post" class="row">
                <div class="col-3">
                    <label class="text-bold">Origin</label>
                    <input class="form-control" type="text" name="src" value="<?php echo $src; ?>" name="source">
                </div>
                <div class="col-3">
                    <label class="text-bold">Destinaion</label>
                    <input class="form-control" name="dest" type="text" value="<?php echo $dest; ?>" name="destination">
                </div>
                <div class="col-2">
                    <label class="text-bold">Journey Class</label>
                    <select class="custom-select hvr-shadow" name="class">
                                    <option class="" value=""><?php echo $class; ?></option>
                                    <option class="" value="ALL">All Classes</option>
                                    <option class="" value="AC">AC</option>
                                    <option class="" value="SL">Sleeper(SL)</option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="text-bold">Journey Date</label>
                    <input class="form-control" type="date" name="date" value="<?php echo $date; ?>">
                </div>
                <div class="col-2 mt-4 pt-2">
                    <input class="form-control btn-blue text-light hvr-shadow" type="submit" value="Modify Search" name="modify">
                </div>
            </form>
        </div>
    </div> <!-- row ends -->

</div> <!-- container-fluid ends -->


<!-- container 2nd -->
<div class="container bg-light border-left border-right mt-5">
    <!-- heading of booking card -->
       <div class="row border bg-white ml-1 mr-1 mb-2 text-bold p-1">
           <div class="col-1 col-sm-2 offset-1">
               Train name & no
           </div>
           <div class="col-2 col-sm-2 offset-1"><i class="sm-hide">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
               Departs
           </div>
           <div class="col-2 col-sm-1">
               Arrival
           </div>
           <div class="col-1 col-sm-1">
               Duration
           </div>
           <div class="sm-hide col-sm-2 offset-2 text-center">
               fare
           </div>
       </div>
       <!-- list of trains -->
       <?php 

            if($result->num_rows > 0){
                while($data = $result->fetch_assoc()){

        ?>
       <div class="card mb-2">
                <form action="./psg_details.php" method="post" class="row">
                    <div class="col-12 col-md-3 pt-4 pl-5 hvr-shadow">
                        <h6>
                            <img src="asset/img/logo/rail_icon.png" width="25">
                            <span><?php echo ucwords($data["train_name"]); ?></span>&nbsp;<span>(<?php echo ucwords($data["train_no"]); ?>)</span>
                        </h6>
                        <!-- send station number -->
                        <input type="hidden" name="station_no" value="<?php echo ucwords($data["station_no"]); ?>">
                        <h6 class="text-bold">
                            <?php echo ucwords($data["source"]); ?>&nbsp;<i class="fa fa-arrow-circle-right"></i>&nbsp;<?php echo ucwords($data["destination"]); ?>
                        </h6>
                        <h6 class="text-bold text-dark">Departs on: All Days</h6>
                    </div>
                    <div class="col-12 col-md-7 hvr-shadow">
                        <div class="card-body row">
                           <div class="col-2 offset-3">
                               <img src="asset/img/logo/depar.png" width="30"><br><br>
                               <span class="font-light"><?php echo $data["depart_time"]; ?></span>
                               <input type="hidden" name="dep_time" value="<?php echo $data['depart_time']; ?>">
                           </div>
                           <div class="col-2">
                               <img src="asset/img/logo/arrive.png" width="30"><br><br>
                               <span class="font-light"><?php echo $data["arrival_time"]; ?></span>
                               <input type="hidden" name="arr_time" value="<?php echo $data['arrival_time']; ?>">
                           </div>

                           <div class="col-2">
                               <img src="asset/img/logo/time.png" width="30"><br><br>
                               <span class="font-light">&nbsp;&nbsp;<?php echo $data["duration"]; ?></span>
                               <input type="hidden" name="duration" value="<?php echo $data['duration']; ?>">



                               <!-- send hidden fields to next page (psg_details.php-->
                               <input type="hidden" name="src" value="<?php echo $src; ?>">
                               <input type="hidden" name="dest" value="<?php echo $dest; ?>">
                               <input type="hidden" name="class" value="<?php echo $class; ?>">
                               <input type="hidden" name="date" value="<?php echo $date; ?>">
                               <input type="hidden" name="train_name" value="<?php echo $data["train_name"]; ?>">
                               <input type="hidden" name="train_no" value="<?php echo $data["train_no"]; ?>">
                               <input type="hidden" name="fare" value="<?php echo $data["fare"]; ?>">


                           </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-2 text-center mt-5 hvr-shadow">
                        <!-- <div class="card-footer "> -->
                            <?php 
                            // this is checked that seat is available or not for showing train if seat not available it disable the btn (else part)
                            $avail=$data["seat_avail"];
                            if ($avail > 0) { ?>
                           
                                <input type="submit" value="Book Now" name="book" class="btn btn-blue text-light hvr-shadow"><!-- Book Now</button> -->

                       <?php } else{ ?>
                           
                                <button type="button" disabled class="btn btn-blue  text-light hvr-shadow">Not Available</button>

                       <?php } 
                       ?>
                        <!-- </div> -->



                    </div>               
                </form>
        </div> <!-- card ends -->


  <!-- php code end of taking data from db -->
    <?php 
                } //end of while

            } //end of if
            else{
                echo "<script> alert('No Trains Available For Now'); </script>";
            }


            // stored this values into reservation class


    ?>



</div> <!-- container ends -->
    

    <?php 
        function avail(){
            return true;
        }
     ?>


    <!-- include footer -->
    <?php include('footer.html'); ?>
	



</body>
</html>