<?php
    // This page shows admin dashboard
    session_start();

    include('DBConnection.php');

    // Check whether the user is logged in or logged out
    if(isset($_SESSION["admin_uname"])){
        header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");

    // Query to get different data count from tables
    $sql1 = "select count(username) as users from user";
    $users = queryexe($sql1, 1, $conn);
    
    $sql2 = "select count(train_no) as trains from train";
    $trains = queryexe($sql2, 2, $conn);
    
    $sql2 = "select count(ticket_no) as booked from ticket where status = 'booked'";
    $booked = queryexe($sql2, 3, $conn);
    
    $sql2 = "select count(ticket_no) as cancelled from ticket where status = 'cancelled'";
    $cancelled = queryexe($sql2, 4, $conn);
    
    $sql2 = "select count(id) as cancelled from contact";
    $contact = queryexe($sql2, 4, $conn);

    function queryexe($sql, $num, $conn){
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($data = $result->fetch_assoc()){
                if($num == 1){
                    $users = $data['users'];
                    return $users;
                }
                else if($num == 2){
                    $trains = $data['trains'];
                    return $trains;
                }
                else if($num == 3){
                    $booked = $data['booked'];
                    return $booked;
                }
                else if($num == 4){
                    $cancelled = $data['cancelled'];
                    return $cancelled;
                }
            }
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

    <!-- Optional CSS -->
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet" href="asset/css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">

    <!-- Optional JavaScript -->
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style type="text/css">
		.row {
            /* background: black; */
        }
        .col1, .col2, .col3, .col4 {
            height: 100px;
            border-radius: 5px;
            margin-left: 0px;
        }
        .col1 {
            background-image: linear-gradient(to right, red, orange);
        }
        .col2 {
            background-image: linear-gradient(to right, green, orange);
        }
        .col3 {
            background-image: linear-gradient(to right, blue, orange);
        }
        .col4 {
            background-image: linear-gradient(to left, blue, orange);
        }
        .cust-font {
            font-size: 32px;
            text-align: center;
            font-family: 'Showcard Gothic';
        }
        .cust-font2 {
            margin-top: 0px;
            font-size: 20px;
            font-family: 'Baskerville Old Face';
            font-weight: bold;
        }

		 body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
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
/* Gradient Card Backgrounds */
.bg-gradient-primary {
    background: linear-gradient(to right, #007bff, #00c6ff);
}

.bg-gradient-info {
    background: linear-gradient(to right, #17a2b8, #00d4ff);
}

.bg-gradient-success {
    background: linear-gradient(to right, #28a745, #2ecc71);
}

.bg-gradient-danger {
    background: linear-gradient(to right, #dc3545, #ff6b6b);
}

.bg-gradient-warning {
    background: linear-gradient(to right, #ffc107, #ff9f00);
}

/* Card Styles */
.card {
    border: none;
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover Effect for Cards */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
}

/* Icon Styles */
.icon-wrapper img {
    transition: transform 0.3s ease, filter 0.3s ease;
}

/* Hover Effect for Icons */
.icon-wrapper img.icon-color {
    filter: brightness(0) saturate(100%) invert(40%) sepia(95%) saturate(6500%) hue-rotate(200deg) brightness(95%) contrast(85%);
}

.icon-wrapper img.icon-color:hover {
    transform: scale(1.1);
}

/* Card Body Padding */
.card-body {
    padding: 20px;
}

/* Font Styles */
h2.display-4 {
    font-size: 2.5rem;
    font-weight: 700;
}

p.lead {
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-body {
        padding: 15px;
    }
    h2.display-4 {
        font-size: 2rem;
    }
    p.lead {
        font-size: 1rem;
    }
}


    </style>
</head>
<body>
    <!-- Header Body -->
        <div class="admin-menu">
            <?php include("adminmenu.html"); ?>
        </div>
		
		<div class="container-fluid">
    <!-- Main Dashboard -->
    <div class="bg-#f4f4f4 text-white py-5">
        <div class="row text-center">
            <!-- Users Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-gradient-primary text-white shadow-lg border-0 rounded-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-start">
                            <h2 class="display-4"><?php echo $users; ?></h2>
                            <p class="lead">Registered Users</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="asset/img/logo/register.png" width="70" alt="Users Icon" class="img-fluid icon-color">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trains Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-gradient-info text-white shadow-lg border-0 rounded-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-start">
                            <h2 class="display-4"><?php echo $trains; ?></h2>
                            <p class="lead">Available Trains</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="asset/img/logo/train3.png" width="70" alt="Trains Icon" class="img-fluid icon-color">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booked Tickets Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-gradient-success text-white shadow-lg border-0 rounded-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-start">
                            <h2 class="display-4"><?php echo $booked; ?></h2>
                            <p class="lead">Booked Tickets</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="asset/img/logo/ticket.png" width="70" alt="Booked Tickets Icon" class="img-fluid icon-color">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancelled Tickets Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-gradient-danger text-white shadow-lg border-0 rounded-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-start">
                            <h2 class="display-4"><?php echo $cancelled; ?></h2>
                            <p class="lead">Cancelled Tickets</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="asset/img/logo/ticket2.png" width="70" alt="Cancelled Tickets Icon" class="img-fluid icon-color">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feedback Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-gradient-warning text-white shadow-lg border-0 rounded-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column align-items-start">
                            <h2 class="display-4"><?php echo $contact; ?></h2>
                            <p class="lead">Feedbacks</p>
                        </div>
                        <div class="icon-wrapper">
                            <img src="asset/img/logo/feedback.png" width="70" alt="Feedback Icon" class="img-fluid icon-color">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
