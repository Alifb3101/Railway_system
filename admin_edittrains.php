<?php 
    
    // this page used to edit the train details
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    $train_no='';

    // execute if user clicked on show btn after entering train number
    if(isset($_GET['show'])){
       if(isset($_GET['train_no'])) 
            $train_no = $_GET['train_no'];
        $count = 1;
        
    }

        // select train details from station and train table
        $sql1 = "select * from station s,train t where s.train_no = t.train_no and t.train_no = '$train_no'";   
        $result = $conn->query($sql1);


    // execute when admin clicked on update btn after editing train details
    if(isset($_POST['update'])){
        if(isset($_POST['trainno']))
            $train_no = $_POST['trainno'];
        $station_no = $_POST['station_no'];


        $train_name  = ucwords($_POST['trainname']);
        $seat  = $_POST['seat'];
        $class  = $_POST['class'];
        $src  = ucwords($_POST['src']);
        $dest  = ucwords($_POST['dest']);
        $depart  = $_POST['depart'];
        $arr  = $_POST['arr'];
        $fare  = $_POST['fare'];

                // calculating duration from two given times
        $duration = round(abs(strtotime($depart) - strtotime($arr)) / 3600,1);

        function updateQuery($conn,$sql){
            if($conn->query($sql) == true){
                echo "<script>alert('Train Data Updated');</script>";
            }
            else{
                echo $conn->error;
            }
        }



       
        // query for update train details
        $sql2 = "update train set train_no = '$train_no',train_name = '$train_name',seat_avail = '$seat',class = '$class' where train_no = '$train_no'";
        updateQuery($conn,$sql2);
        
        // query for update station details
        $sql3 = "update station set source = '$src',destination = '$dest',fare = '$fare',arrival_time = '$arr',depart_time = '$depart',duration = '$duration',train_no = '$train_no' where station_no = '$station_no' and train_no = '$train_no' ";
        updateQuery($conn,$sql3,$fare);
       

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


    </style>

</head>
<body class="bg-img">
        <div class="admin-menu">    
           <?php include("adminmenu.html"); ?>
        </div>
        <div class="container-fluid">


            <form name="payForm" onsubmit="return(pnrvalid());" class="m-5 p-5 border bg-light" action="" method="get">
                <div class="row">
                    <div class="col-12">
                        <h4 class="navbar-brand text-primary">Train Number:</h4>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="text" placeholder="Enter Train Number" name="train_no" id="train" maxlength="5">
                        <span id="er_train" class="text-red"></span>
                    </div>
                    <div class="col-4">      
                        <input type="submit" class="btn btn-dark text-light" value="Get Details" name="show">
                    </div>
                </div>
            </form>



                    <?php 
                        if($result->num_rows > 0){
                            while($data = $result->fetch_assoc()){
                     ?>
            <form action="" method="post" name="train" onsubmit="return()">
                <div class="row bg-light m-3 p-4 border-radius">
                    <!-- 1st row -->
            <div class="col-12">
               <div class="text-danger text-bold bg-light">
                <hr>     
                    <h6 class="font-weight-bold">Note: You can't edit train number</h6>
                <hr>     
                </div>
            </div>

                     <input type="hidden" name="station_no" value="<?php echo $data['station_no']; ?>">
                    <span class="text-bold"><?php echo "station ".$count; ?></span>
                    <div class="col-12"><hr></div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Train No<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" type="text" value="<?php echo $data['train_no'] ?>" id="trainnoid" disabled name="trainno" maxlength="5">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_trainno"></span>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Train Name<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input name="trainname" value="<?php echo $data['train_name'] ?>" type="text" id="trainnameid" class="form-control" >
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_trainname"></span>
                        </div>
                    </div>

                    <!--  -->
                    <div class="col-12"><hr></div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Seat Availability<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input type="text" id="seatid" value="<?php echo $data['seat_avail'] ?>" name="seat" class="form-control" >
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_seat"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Class <span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <select class="custom-select hvr-shadow" name="class">
                                    <option value=""><?php echo $data['class'] ?></option>
                                    <option class="" value="ALL">All Classes</option>
                                    <option class="" value="AC">AC</option>
                                    <option class="" value="SL">Sleeper(SL)</option>
                            </select>
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_class"></span>
                        </div>
                    </div>


                    <!--  -->
                    <div class="col-12"><hr></div>
                     <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Source <span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" value="<?php echo $data['source'] ?>" type="text" id="srcid" name="src">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_src"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Destination<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" value="<?php echo $data['destination'] ?>" type="text" id="destid" name="dest">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_dest"></span>
                        </div>
                    </div>

                    <div class="col-12"><hr></div>

                     <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Departure Time<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" value="<?php echo $data['depart_time'] ?>" type="text" id="departid" name="depart">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_depart"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Arrival Time<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" value="<?php echo $data['arrival_time'] ?>" type="text" id="arrid" name="arr">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_arr"></span>
                        </div>
                    </div>

                    <div class="col-12"><hr></div>

                     <div class="col-sm-6 col-md-3">
                        <div class="text-main ">
                            <h5>Fare<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-main input-group">
                            <input class="form-control" value="<?php echo $data['fare'] ?>" type="text" id="fareid" name="fare">
                        </div>
                        <!-- er_pass1 code -->
                        <div  class="text-red">
                            <span id="er_fare"></span>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-3 offset-1">
                        <div class="text-main input-group">
                            <input class="btn btn-success" type="submit" value="Update Details" name="update">
                        </div>
                    </div>
                    <div class="col-12"><hr></div>

                    

                </div> <!-- row ends -->
                    
            </form>
                <?php $count++; 
                 } // while ends
                } //if ends
                ?>
        </div>
</body>
</html>

