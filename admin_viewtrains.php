<?php 
    
    // view train details
    session_start();

    include('DBConnection.php');

    // checked whther user login or logout
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    $count = 1;

    // select all train name & nos for shows in select box
    $sql1 = "select train_no,train_name from train";

    $result1 = $conn->query($sql1);
    
    // execute if admin clicked on view btn
    if (isset($_GET['show'])) {
        $train_no = $_GET['train_no'];

        // execute if admin want all train detaills otherwise execute else part for specific train details
        if($train_no == "all"){
            $sql2 = "select t.train_no,t.train_name,s.source,s.arrival_time,s.destination,
                s.depart_time,s.duration,s.station_no from train t,station s 
                where s.train_no = t.train_no";
        }
        else{
            $sql2 = "select t.train_no,t.train_name,s.source,s.arrival_time,s.destination,
                s.depart_time,s.duration,s.station_no from train t,station s 
                where s.train_no = t.train_no and t.train_no = '$train_no'";
        }
        $result2 = $conn->query($sql2);
    }

 ?>
<!doctype html>
<html lang="en">
<head>
	<title>Rubi enterprises</title>
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

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h4 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .input-group {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        select.form-control, input[type="submit"] {
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2c3e50;
        }

        .table-container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        .table-success {
            background-color: #28a745;
            color: white;
        }


    </style>

</head>
<body class="bg-img">
    <!-- Header Body -->
    <div class="admin-menu">
            <?php include("adminmenu.html"); ?>
        </div>

       <div class="container-fluid">
    <!-- Form -->
    <form name="payForm" onsubmit="return(pnrvalid());" class="form-container" action="" method="get">
        <div class="row">
            <div class="col-12">
                <h4 class="navbar-brand text-primary">Train Number:</h4>
            </div>
            <div class="col-8">
                <select name="train_no" class="form-control" value="trains">
                    <option class="form-control" value="all">All train</option>
                    <?php if($result1->num_rows > 0){
                        while($data1 = $result1->fetch_assoc()){
                    ?>
                        <option value="<?php echo $data1['train_no']; ?>"><?php echo "( ".$data1['train_no']." ) ".$data1['train_name'] ?></option>
                    <?php 
                        } 
                    } ?>
                </select>
            </div>
            <div class="col-4">
                <input type="submit" class="btn btn-dark text-light" value="Get Status" name="show">
            </div>
        </div>
    </form>

    <!-- Table for Train Records -->
    <div class="table-container">
        <table class="table table-hover">
            <?php 
            if (isset($_GET['show'])) {
                if($result2->num_rows > 0){ ?>
                    <thead class="table-success">
                        <tr>
                            <th>Sr.no</th>
                            <th>Train Name</th>
                            <th>Train No.</th>
                            <th>Source Location</th>
                            <th>Destination location</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 1;
                        while($data2 = $result2->fetch_assoc()){
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
                        <?php 
                            $count++;
                        }
                    } 
                } else {
                    echo '<tr><td colspan="7">No results found.</td></tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>


    </div>
</body>
</html>



