<?php 
    
    // user can checked his entered details here
    session_start();

    include('DBConnection.php');
    include('Details.php');

    // checked whther user login or logout
    if(!isset($_SESSION["uname"])){
            header("location: ./index.php?logout=1");
    }
    include("header2.php");

    // this session set on psg_details.php page for avoiding reinsertion in db bcoz of resubmiting the page
    if(isset($_SESSION["temp"])){
        $temp = $_SESSION["temp"];
    }
    $uname = $_SESSION["uname"];
           
            // true this condition if user clicked on continue btn
        if(isset($_POST['continue'])){

                // this variable is used for showing the how many travellers in journey
                $count=0;

                $src = $_POST['src'];
                $dest = $_POST['dest'];
                $class = $_POST['class'];
                $date = $_POST['date'];
                $station_no = $_POST['station_no'];
                $train_name = $_POST['train_name'];
                $train_no = $_POST['train_no'];
                $dep_time = $_POST['dep_time'];
                $arr_time = $_POST['arr_time'];
                $duration = $_POST['duration'];
                $email = $_POST['email'];
                $phno = $_POST['phno'];
                $fare = $_POST['fare'];


                // insert into ticket table
                // if condition is execute when session['temp']=true
                if($_SESSION["temp"] == true){
                    $sql = "insert into ticket values('','booked','$date','$phno','$email','$train_no','$station_no','$uname');";
                    if($conn->query($sql) == TRUE){
                      
                    }
                    else{
                       echo $conn->error;

                    }
                }

                // this query is used for taking ticket number of current user
                // here is bug because of $data
                $sql1 = "select *from ticket where date = '$date'"; 
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows > 0){
                        while($data = $result1->fetch_assoc()){
                            $ticket_no = $data['ticket_no'];
                            if(isset($ticket_no)){
                                $pnr  = $ticket_no;
                                //stored pnr into seesion 
                                $_SESSION['pnr'] = $pnr;  
                            }
                        }
                    }

            // if condition is execute when session['temp']=true
            if($_SESSION["temp"] == true){
                // function for inserting data in pasasnger table
                function insertData($name,$age,$gender,$pnr,$conn,$train_no){
                    $sql2 = "insert into passanger values('','$name','$age','$gender','','$pnr');";
                    if($conn->query($sql2) == TRUE){
                        
                        // this query decrement the seat_avil col value by one
                        $sql5 = "update train set seat_avail =  seat_avail-1 where train_no = '$train_no'";

                        if($conn->query($sql5) == true){

                            // echo "<script> alert('updated');</script>";
                        }
                        else{
                            echo $conn->error;
                            // echo "<script> alert('not updated');</script>";
                        }
                          // make session['temp']=false so that there will not reinsertion in db on resubmitting the page
                          $_SESSION["temp"] = false;
                    }
                }
            

                // take this value from psd_details and passed to insertData()
                // it takes upto 5 traveller details and increment count so that we get the travellers number
                if(!empty($_POST['name1']) || !empty($_POST['age1']) || !empty($_POST['gender1'])){
                        insertData($_POST['name1'],$_POST['age1'],$_POST['gender1'],$pnr,$conn,$train_no);
                        $count++;
                }
                if(!empty($_POST['name2']) || !empty($_POST['age2']) || !empty($_POST['gender2'])){
                        insertData($_POST['name2'],$_POST['age2'],$_POST['gender2'],$pnr,$conn,$train_no);
                        $count++;
                }
                if(!empty($_POST['name3']) || !empty($_POST['age3']) || !empty($_POST['gender3'])){
                        insertData($_POST['name3'],$_POST['age3'],$_POST['gender3'],$pnr,$conn,$train_no);
                        $count++;
                }
                if(!empty($_POST['name4']) || !empty($_POST['age4']) || !empty($_POST['gender4'])){
                        insertData($_POST['name4'],$_POST['age4'],$_POST['gender4'],$pnr,$conn,$train_no);
                        $count++;
                }
                if(!empty($_POST['name5']) || !empty($_POST['age5']) || !empty($_POST['gender5'])){
                        insertData($_POST['name5'],$_POST['age5'],$_POST['gender5'],$pnr,$conn,$train_no);
                        $count++;
                }
            } // ends of session['temp']
        }       


 ?>



<!doctype html>
<html lang="en">
<head>
	<title>Rubibi</title>
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
    </style>

</head>
<body class="bg-light">
    
    <!-- include header -->
	


    <!-- box shows process logo -->
    <div class="container border border-primary mt-5 mb-5 p-4">
        <div class="row">
            <div class="col-2 offset-1 sm-hide">
                <div  class="bg-primary p-3 text-center logo border border-primary">
                    <img src="asset/img/logo/passangerW.png">            
                </div>
            </div>
                <i class="sm-hide fa fa-arrow-circle-right text-primary mt-4 pl-5"></i>
            <div class="col-8 col-sm-2 offset-1">
                <div class=" p-3 text-center logo border border-primary">
                    <img src="asset/img/logo/reviewG.png">
                </div>
            </div>
                <i class="sm-hide fa fa-arrow-circle-right mt-4 text-lightdark pl-5"></i>
            <div class="col-2 offset-1 sm-hide">
                <div class=" p-3 text-center logo border">
                    <img class="text-danger" src="asset/img/logo/cardG.png">
                </div>
            </div>
        </div>
    </div>


<!-- input the details -->
<div class="container-fluid pl-5 pb-5 ">
    <div class="row">
        <!-- col-8 left side -->
        <div class="col-8">
            <h5 class="text-bold-16">
                <span class="text-blue"><?php echo $train_name; ?></span>&nbsp;
                <span class="text-black">(<?php echo $train_no; ?>)</span>
                <span class="strong fs-12 text-666 font-light"><b><?php echo $class; ?> | <?php echo $count; ?> Traveller</b></span>
            </h5>
            <h6 class="strong fs-12 text-666">
                <span class=""><b>From Station</b></span>
                <span class="offset-4"><b>Arrival Station</b></span>
            </h6>
            <h5 class="text-bold-16 text-black">
                <span class="">
                    <img src="asset/img/logo/rail_icon.png" width="20" class="sm-hide">
                    <?php echo $src; ?>
                </span>
                <span class="offset-3">
                    &nbsp;&nbsp;&nbsp;<img src="asset/img/logo/rail_icon.png" width="20" class="sm-hide">
                    <?php echo $dest; ?>
                </span>
            </h5>
            <h6 class="strong fs-12 text-666">
                <span class=""><b> Departure: <?php echo $date; ?> | <?php echo $dep_time; ?> AM</b></span>
                <span class="offset-2"> <b>Arrival: <?php echo $date; ?> | <?php echo $arr_time; ?> PM</b></span>
            </h6>  

            <!-- card travelling passanger -->
            <div class="card mt-4">
                <div class="card-header bg-primary p-2">
                    <h5 class="text-light"><b>Travelling Passangers</b></h5>
                </div>
                
                <?php 
                
                    $sql3 = "select *from passanger where ticket_no = '$pnr'";

                    $result2 = $conn->query($sql3);
                    if($result2->num_rows > 0){
                        while($data = $result2->fetch_assoc()){

                ?>

                <div class="card-body">
                    <span class="fs-20 text-blue"><b><?php echo $data['p_name']; ?></b></span><span class="text-bold text-blue">&nbsp;&nbsp;&nbsp;<?php echo $data['p_age']; ?> | <?php echo $data['p_gender']; ?></span>
                </div>

            <?php 
                    }
                   }
            ?>
            </div>
            <form action="./payment.php" method="post"> 

                <!-- send hidden data -->
                <input type="hidden" name="src" value="<?php echo $src; ?>"> 
                <input type="hidden" name="dest" value="<?php echo $dest; ?>"> 
                <input type="hidden" name="class" value="<?php echo $class; ?>"> 
                <input type="hidden" name="date" value="<?php echo $date; ?>"> 
                <input type="hidden" name="station_no" value="<?php echo $station_no; ?>"> 
                <input type="hidden" name="train_name" value="<?php echo $train_name; ?>"> 
                <input type="hidden" name="train_no" value="<?php echo $train_no; ?>"> 
                <input type="hidden" name="dep_time" value="<?php echo $dep_time; ?>"> 
                <input type="hidden" name="arr_time" value="<?php echo $arr_time; ?>"> 
                <input type="hidden" name="duration" value="<?php echo $duration; ?>"> 
                <input type="hidden" name="email" value="<?php echo $email; ?>"> 
                <input type="hidden" name="phno" value="<?php echo $phno; ?>"> 
                <input type="hidden" name="fare" value="<?php echo ($fare*$count); ?>"> 
                <input type="hidden" name="pnr" value="<?php echo $pnr; ?>"> 
                <input type="hidden" name="count" value="<?php echo $count; ?>"> 

            <!-- buttons -->
                <div class="text-center">
                    <input type="submit" value="Continue"  name="continue1" class="btn btn-blue text-light hvr-grow m-2">
                   <!--  <input type="reset" value="Replan" onclick="javascript:history.go(-1)" name="replan" class="btn btn-blue text-light hvr-grow m-2"> -->
                </div>
            </form>
        </div> <!-- col-8 ends -->
        
        <!-- col-4 right side-ticket -->
        <div class="col-12 col-sm-3 pl-4">
            <div class="card  shadow-cust">
                <div class="ml-4 mt-1 text-white">
                    <i class="fa fa-xs fa-circle ml-2 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                </div>
                <hr class="mt-1">
                <div class="card-body pt-0 pb-0 text-center">
                   <img src="asset/img/logo/logo.png" width="40" height="40" 
                   class="mb-2">
                   <h5 class="text-bold-16 font-light">
                        <span class="text-blue"><?php echo $train_name; ?></span>&nbsp;
                        <span class="text-black">(<?php echo $train_no; ?>)</span>
                   </h5>
                   <h6 class="strong fs-12 text-666">
                       <span class=""><?php echo $class; ?>, <?php echo $count; ?> Traveller</span>
                   </h6>
                   <div class="alert-primary p-1 ">
                        <h6 class="strong fs-12 text-666">
                            <span class="">Friday, <?php echo $date; ?></span>
                        </h6>
                        <h5 class="text-bold-16 font-light">
                            <span class="text-black"><?php echo $src; ?></span>&nbsp;
                        </h5>
                        <h6 class="strong fs-12 text-666">
                            <span class="">Departure: <?php echo $dep_time; ?></span>
                        </h6>
                        <i class="fa fa-arrow-circle-right text-dark"></i>

                        <h6 class="strong fs-12 text-666">
                            <span class="">Friday, <?php echo $date; ?></span>
                        </h6>
                        <h5 class="text-bold-16 font-light">
                            <span class="text-black"><?php echo $dest; ?></span>&nbsp;
                        </h5>
                        <h6 class="strong fs-12 text-666">
                            <span class="">Arrival: <?php echo $arr_time; ?></span>
                        </h6>


                   </div>
                        <h6 class="text-bold fs-12 text-black">
                            <span class="float-left">PNR NO: </span><span class="float-right"><?php echo $pnr; ?></span><br>
                            <span class="float-left">Total Fare: </span><span class="float-right"><?php echo ($fare*$count); ?>.00</span>
                        </h6>
                </div>
                <hr class="mb-1">
                <div class="ml-4 mb-1 text-white">
                    <i class="fa fa-xs fa-circle ml-2 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                    <i class="fa fa-xs fa-circle ml-4 pt-1"></i>
                </div>
            </div>
        </div>

    </div> <!-- outer row ends -->


</div><!-- container ends -->



    <!-- include footer -->
    <?php include('footer.html'); ?>
	



</body>
</html>