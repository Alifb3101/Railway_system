<?php 

    session_start();
    // include database connection file
    include("DBConnection.php");
    include("Details.php");

     // checked whther user login or logout
    if(!isset($_SESSION["uname"])){
            header("location: ./index.php?logout=1");
    }

    $uname = $_SESSION["uname"];

    // checked and stored pnr number if set
    if(isset($_SESSION["pnr"])){
        $pnr = $_SESSION['pnr'];
    }

    include("header2.php");

    // checked is continue btn clicked or not
    if(isset($_POST['continue1'])){
                
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

        // this count used for knowing how many travellers travelled
        //this variable get from review.php page
        if(isset($_POST['count'])){
            $count = $_POST['count'];
        }
        // this taking the entered mobile number from passangers.php page
        if(isset($_POST['phno'])){
            $phno = $_POST['phno'];
        }

        // taking the fare of ticket from review.php page
        $fare = $_POST['fare'];
        
    }
        
        // checked if user clicked on cancel btn for cancellation of ticket
        if(isset($_POST['cticket'])){
            //delete particular pnr if user clicked on cancel btn
            $sql = "delete from ticket where ticket_no = '$pnr'";
            if($conn->query($sql) == true){

                        // this query for that when user cancel ticket then the particular train seat value is incresed  by one
                        $sql5 = "update train set seat_avail =  seat_avail+1 where train_no = '$train_no'";

                        if($conn->query($sql5) == true){

                            // echo "<script> alert('updated');</script>";
                        }
                        else{
                            echo $conn->error;
                        }

                echo "<script> alert('ticket cancel'); </script>";

                // set session['pnr']=null this session is upto this page
                $_SESSION["pnr"]= null;
                unset($_SESSION["pnr"]); 
                // after cancel the ticket redirect to index.php page
                echo "<script> document.location.href='./index.php'; </script>";
            }
            else{
                echo "<script> alert('ticket already cancelled'); </script>";

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
    </style>

</head>
<body class="bg-light">
    
    <!-- include header -->


    <!-- box shows process logo -->
    <div class="container border border-primary mt-5 mb-5 p-4">
        <div class="row">
            <div class="col-2 offset-1 sm-hide">
                <div  class=" p-3 text-center logo bg-primary border border-primary">
                    <img src="asset/img/logo/passangerW.png">            
                </div>
            </div>
                <i class="sm-hide fa fa-arrow-circle-right text-primary mt-4 pl-5"></i>
            <div class="col-2 offset-1 sm-hide">
                <div class=" p-3 text-center logo bg-primary border border-primary">
                    <img src="asset/img/logo/reviewW.png">
                </div>
            </div>
                <i class="sm-hide fa fa-arrow-circle-right mt-4 text-primary pl-5"></i>
            <div class="col-12 col-sm-2 offset-1">
                <div class=" p-3 text-center logo border border-primary">
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
            <div class="col-12 alert alert-primary text-bold">payment should be accepted by only the debit or credit card </div>
            
            <!-- payment form -->
            <!-- <div class="container-fluid py-3"> -->
                <div class="row">
                    <div class="col-12 col-sm-6 ">
                        <div class="card bg-light">
                            <div class="card-body">
                                <form action="./index.php" name="payForm" onsubmit="return(payvalid());"  method="post" class="">
                                   
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Card number</label>
                                        <input id="cc_number" name="cc_number" type="tel" maxlength="16" class="form-control">
                                        <span id="er_cno" class="text-red"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                                <input id="cc_exp" name="cc_exp" type="date" class="form-control" placeholder="MM / YY" >
                                                <span id="er_exp" class="text-red"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">CVV</label>
                                            <div class="input-group">
                                                <input id="cvv" name="cvv" type="password" maxlength="3" minlength="3" class="form-control cc-cvc" autocomplete="off">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover"  
                                                    ></span>
                                                    </div>
                                                </div>
                                            </div>
                                                <span id="er_cvv" class="text-red"></span>
                                        </div>
                                    </div>
                                    <div class="form-gr`oup">
                                        <label for="x_zip" class="control-label mb-1">Name on card</label>
                                        <input name="nameoncard" type="text" class="form-control" >
                                    </div>
                                    <div class="mt-3">
                                        <button id="payment-button" name="pay" type="submit" class="btn btn-lg btn-blue btn-block text-light hvr-grow">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Pay </span>
                                        </button>
                                    </div>
                                </form>
                                <!-- button for cancel the ticket -->
                                <form action="" method="post">
                                <button name="cticket" class="text-bold btn hvr-grow"><i class="fas fa-ticket-alt "></i> Cancel Ticket</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->

        </div> <!-- col-8 ends -->
        
        <!-- right side shoeing the ticket details -->
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
                            <span class=""><?php echo $date; ?></span>
                        </h6>
                        <h5 class="text-bold-16 font-light">
                            <span class="text-black"><?php echo $src; ?></span>&nbsp;
                        </h5>
                        <h6 class="strong fs-12 text-666">
                            <span class="">Departure: <?php echo $dep_time; ?></span>
                        </h6>
                        <i class="fa fa-arrow-circle-right text-dark"></i>

                        <h6 class="strong fs-12 text-666">
                            <span class=""><?php echo $date; ?></span>
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
                            <span class="float-left">Total Fare: </span><span class="float-right"><?php echo $fare; ?>.00</span>
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



<script type="text/javascript">

    function payvalid(){
            // alert("call in validation");
            var cno = document.payForm.cc_number.value;
            var exp = document.payForm.cc_exp.value;
            var cvv = document.payForm.cvv.value;

            var numbers = /^[0-9]+$/;
            // var alpha = /^[a-zA-Z]+$/;
            // var pass = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;

            if (cno == "" ) {
                document.getElementById("er_cno").innerHTML="enter card no";
                document.getElementById("cc_number").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cc_number").focus();
                return false;
            }
            else{
                document.getElementById("er_cno").innerHTML="";
                document.getElementById("cc_number").style="border:none;box-shadow:none";           
            }

            if (!cno.match(numbers)) {
                document.getElementById("er_cno").innerHTML="enter only numbers";
                document.getElementById("cc_number").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cc_number").focus();
                return false;
            }
            else{
                document.getElementById("er_cno").innerHTML="";
                document.getElementById("cc_number").style="border:none;box-shadow:none";           
            }
            if (cno.length > 16 || cno.length < 16) {
                document.getElementById("er_cno").innerHTML="enter 16 digit valid number";
                document.getElementById("cc_number").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cc_number").focus();
                return false;
            }
            else{
                document.getElementById("er_cno").innerHTML="";
                document.getElementById("cc_number").style="border:none;box-shadow:none";           
            }

           
            if (exp == "" ) {
                document.getElementById("er_exp").innerHTML="select expiray date";
                document.getElementById("cc_exp").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cc_exp").focus();
                return false;
            }
            else{
                document.getElementById("er_exp").innerHTML="";
                document.getElementById("cc_exp").style="border:none;box-shadow:none";           
            }


        
            if (cvv == "" ) {
                document.getElementById("er_cvv").innerHTML="enter card no";
                document.getElementById("cvv").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cvv").focus();
                return false;
            }
            else{
                document.getElementById("er_cvv").innerHTML="";
                document.getElementById("cvv").style="border:none;box-shadow:none";           
            }

            if (!cvv.match(numbers)) {
                document.getElementById("er_cvv").innerHTML="enter only numbers";
                document.getElementById("cvv").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cvv").focus();
                return false;
            }
            else{
                document.getElementById("er_cvv").innerHTML="";
                document.getElementById("cvv").style="border:none;box-shadow:none";           
            }
            if (cvv.length > 3 || cvv.length < 3) {
                document.getElementById("er_cvv").innerHTML="enter valid number of 10 digit";
                document.getElementById("cvv").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("cvv").focus();
                return false;
            }
            else{
                document.getElementById("er_cvv").innerHTML="";
                document.getElementById("cvv").style="border:none;box-shadow:none";           
            }
            alert('your ticket booked ');
            // window.location="./index.php";
            return true;


        }


</script>