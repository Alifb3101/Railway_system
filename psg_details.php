<?php 
    // here user have to insert passanger details
    session_start();

    include('DBConnection.php');
    include('Details.php');


    // checked whther user login or logout
    if(!isset($_SESSION["uname"])){
            header("location: ./index.php?logout=1");
    }
    include("header2.php");
    $uname = $_SESSION["uname"];

    //this session will use for review.php beacause of avoid duplicate data in db on resubmitting the page
    //set here and after stored value in db then unset it in review.php page
    $_SESSION["temp"] = true;


    // checked whether user clicked or not on book btn
    if(isset($_POST['book'])){
        
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        $class = $_POST['class'];
        $date = $_POST['date'];
        $station_no = $_POST['station_no'];
        $train_name = ucwords($_POST['train_name']);
        $train_no = ucwords($_POST['train_no']);
        $dep_time = ucwords($_POST['dep_time']);
        $arr_time = ucwords($_POST['arr_time']);
        $duration = ucwords($_POST['duration']);
        $fare = ucwords($_POST['fare']);

    }

    // this query is used for fetching current user mobile number and email address
    $sql = "select *from user where username = '$uname'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($data = $result->fetch_assoc()){
            $email = $data['email'];
            $phno = $data['mobile_number'];
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

        @media (max-width: 600px){
            /*no padding when screen width below to the 600px*/
            .no-border{   
                border: none;
            }
       }
       div.card{
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
            <div class="col-8 col-sm-2 offset-1">
                <div  class=" p-3 text-center logo border border-primary">
                    <img src="asset/img/logo/passanger.png">            
                </div>
            </div>
                <i class=" sm-hide fa fa-arrow-circle-right text-lightdark mt-4 pl-5"></i>
            <div class="col-2 offset-1 sm-hide ">
                <div class=" p-3 text-center logo border">
                    <img src="asset/img/logo/reviewG.png">
                </div>
            </div>
                <i class=" sm-hide fa fa-arrow-circle-right text-lightdark mt-4 pl-5"></i>
            <div class="col-2 offset-1 sm-hide ">
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
        <div class="col-9">
            <form action="./review.php" name="psgForm" method="post" onsubmit="return(check());">
                <!-- input block -->
                <div class="row alert alert-dark shadow p-2 pb-3 bg-white" id="1">
                <div class="col-12 mb-3">
                    <img src="asset/img/logo/cardG.png" width="25"><span>&nbsp;1</span>
                    <!-- <button type="button" onclick="remove(1)" class="close " data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>               
                <!-- <form class="form"> -->
                <div class="col-12 col-sm-4">
                    <input class="form-control hvr-shadow" type="text" name="name1"  placeholder="Name*" required>              
                </div>
                <div class="col-12 col-sm-3">
                    <input class="form-control hvr-shadow" type="number" min="5"  maxlength="3" name="age1"  placeholder="Age*" required>              
                </div>
                <div class="col-12 col-sm-4">
                    <select name="gender1" class="custom-select hvr-shadow" required>
                        <option class="" value="">gender</option>
                        <option class="" value="m">Male</option>
                        <option class="" value="f">Female</option>
                    </select>         
                </div>
            </div>
<!-- input block -->
            <div class="row alert alert-dark shadow p-2 pb-3 bg-white" style="display: none;" id="2">
                <div class="col-12 mb-3">
                    <img src="asset/img/logo/cardG.png" width="25"><span>&nbsp;1</span>
                    <button type="button" onclick="remove(2)" class="close " >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <!-- <form class="form"> -->
                <div class="col-12 col-sm-4">
                    <input class="form-control hvr-shadow" type="text" name="name2"  placeholder="Name*">              
                </div>
                <div class="col-12 col-sm-3">
                    <input class="form-control hvr-shadow" type="number" min="5"  maxlength="3" name="age2"  placeholder="Age*">              
                </div>
                <div class="col-12 col-sm-4">
                    <select name="gender2" class="custom-select hvr-shadow">
                        <option class="" value="">gender</option>
                        <option class="" value="m">Male</option>
                        <option class="" value="f">Female</option>
                    </select>         
                </div>
            </div>

<!-- input block -->
                <div class="row alert alert-dark shadow p-2 pb-3 bg-white" style="display: none;" id="3">
                <div class="col-12 mb-3" >
                    <img src="asset/img/logo/cardG.png" width="25"><span>&nbsp;1</span>
                    <button type="button" onclick="remove(3)" class="close " >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <!-- <form class="form"> -->
                <div class="col-12 col-sm-4">
                    <input class="form-control hvr-shadow" type="text" name="name3"  placeholder="Name*">              
                </div>
                <div class="col-12 col-sm-3">
                    <input class="form-control hvr-shadow" type="number" min="5"  maxlength="3" name="age3"  placeholder="Age*">              
                </div>
                <div class="col-12 col-sm-4">
                    <select name="gender3" class="custom-select hvr-shadow">
                        <option class="" value="">gender</option>
                        <option class="" value="m">Male</option>
                        <option class="" value="f">Female</option>
                    </select>         
                </div>
            </div>

            <!-- input block -->
                <div class="row alert alert-dark shadow p-2 pb-3 bg-white" style="display: none;" id="4">
                <div class="col-12 mb-3">
                    <img src="asset/img/logo/cardG.png" width="25"><span>&nbsp;1</span>
                    <button type="button" onclick="remove(4)" class="close " >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <!-- <form class="form"> -->
                <div class="col-12 col-sm-4">
                    <input class="form-control hvr-shadow" type="text" name="name4"  placeholder="Name*">              
                </div>
                <div class="col-12 col-sm-3">
                    <input class="form-control hvr-shadow" type="number" min="5"  maxlength="3" name="age4"  placeholder="Age*">              
                </div>
                <div class="col-12 col-sm-4">
                    <select name="gender4" class="custom-select hvr-shadow">
                        <option class="" value="">gender</option>
                        <option class="" value="m">Male</option>
                        <option class="" value="f">Female</option>
                    </select>         
                </div>
            </div>
            <!-- input block -->
                <div class="row alert alert-dark shadow p-2 pb-3 bg-white" style="display: none;" id="5">
                <div class="col-12 mb-3" >
                    <img src="asset/img/logo/cardG.png" width="25"><span>&nbsp;1</span>
                    <button type="button" onclick="remove(5)" class="close " >
                        <!-- data-dismiss="alert" removed -->
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
                <!-- <form class="form"> -->
                <div class="col-12 col-sm-4">
                    <input class="form-control hvr-shadow" type="text" name="name5"  placeholder="Name*">              
                </div>
                <div class="col-12 col-sm-3">
                    <input class="form-control hvr-shadow" type="number" min="5"  maxlength="3" name="age5"  placeholder="Age*">              
                </div>
                <div class="col-12 col-sm-4">
                    <select name="gender5" class="custom-select hvr-shadow">
                        <option class="" value="">gender</option>
                        <option class="" value="m">Male</option>
                        <option class="" value="f">Female</option>
                    </select>         
                </div>
            </div>

              <a class="text-bold btn hvr-grow" onclick="add()"><i class="fa fa-plus fa-sm"></i> Add Passangers</a>
            <!-- </div> internal row ends -->

            <!-- email and phone number input -->
            <div class="row alert alert-dark shadow p-3 mt-5 bg-white">
                <!-- email input -->
               <div class="col-12 col-sm-6 text-center pt-3 border-right">
                    <h6 class="text-dark font-arial">Email:&nbsp;<b><?php echo $email; ?></b></h6>
                    <h6 class="text-999 fs-12 font-arial">Ticket details will be sent to this email</h6>              
                </div>
                <!-- mobile number input -->
                <div class="col-12 col-sm-6 pt-3 border-left">
                    <div class="input-group">
                    <h6 class="text-dark mt-2 font-arial"><b class="sm-hide">Mobile Number:</b>&nbsp;</h6>
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark ">
                                91
                            </span>
                        </div>
                        <input type="text" name="phno" maxlength="10" value="<?php echo $phno; ?>" class="form-control" placeholder="" required>
                    </div>             
                        <h6 class="text-999 text-center mt-2 fs-12 font-arial">SMS will be sent to this number</h6>
                </div>
            </div> <!-- email & phno ends -->


            <!-- send hidden data to review.php-->
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
            <input type="hidden" name="fare" value="<?php echo $fare; ?>"> 
            <input type="hidden" name="boo" value="true"> 


            <!-- buttons -->
            <div class="text-center">
                <input type="submit" name="continue" value="Continue" class="btn btn-blue text-light hvr-grow m-2">
                <button type="reset" class="btn btn-blue text-light hvr-grow m-2">Replan</button>
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
                   <!-- <h6 class="strong fs-12 text-666">
                       <span class="">Ac, 2 Traveller</span>
                   </h6> -->
                   <div class="alert-primary p-1">
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
                            <span class="">Friday, <?php echo $date; ?></span>
                        </h6>
                        <h5 class="text-bold-16 font-light">
                            <span class="text-black"><?php echo $dest; ?></span>&nbsp;
                        </h5>
                        <h6 class="strong fs-12 text-666">
                            <span class="">Arrival: <?php echo $arr_time; ?></span>
                        </h6>
                   </div>
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
    var i=2;

    // this function invoked when user clicked on add passanger btn
    // then it take id and set display:all so it shows new box to enter new passanger details
    function add(){
       // window.alert("heloowww");

       // alert(i);

       document.getElementById(i).style="display:all";

       // increament by one / it increament upto 5
       i++;

    }

    //this function invoked when user clicked on closed or remove btn
    // then it take id and set display:none so it shows new box to enter new passanger details
    function remove(val){
        // alert(val);
        // alert(i);
        document.getElementById(val).style="display: none";
        // if(i!=2 && i>2)
            // i--;

            // insted of decremnet the value of current box stored in i varibale
            // for ex. if user close 2nd box then i=2; and so user clicked on add btn it add that 2nd position box
            i=val;
    }
    

    

</script>