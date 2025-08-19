<?php 
session_start();
include('Details.php');
include('DBConnection.php'); 

if(isset($_SESSION['update'])) unset($_SESSION['update']);

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script> alert('your are logged in'); </script>";
} else if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    echo "<script> alert('your are logged out'); </script>";
}

if(isset($_SESSION["uname"])){
    $uname = $_SESSION["uname"];
    include("header2.php");
} else {
    include("header.html");
}

// Fetch station list
$stations = [];
$sql = "SELECT DISTINCT source FROM station UNION SELECT DISTINCT destination FROM station";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $stations[] = $row['source'];
}
$station_json = json_encode($stations);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Rubi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet" href="asset/css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>

    <style>
        #bg-custom { background-color: rgba(2,2,2,0.8); }
        #m-cust { margin-right: 250px; margin-top: 60px; }
        .bg-black { background-color: black; }
        .bg-img {
            background-image: url('asset/img/21.jpg');
            background-size: 100%;
            max-width: 2800px;
            min-height: 700px;
        }
        @media(max-width: 400px){
            .bg-img {
                background-image: url('asset/img/5.jpg');
                background-size: auto;
                background-repeat: no-repeat;
            }
        }
        .bg-img2 { background-image:url('asset/img/5.jpg'); background-size: 100%; }
        .pnr {
            background-color: white;
            color: black;
            padding-top: 10px;
            box-shadow: 2px 2px 18px 10px #222;
            border-radius: 2px;
        }
        .fs-1 { font-size: 42px; font-family: Tempus Sans ITC; margin-top: 50px; }
        .fs-2 { font-size: 18px; font-family: Yu Gothic Light; font-weight: lighter; margin-bottom: 50px; }
        .main-name {
            font-size: 50px;
            font-family: Arial Rounded MT Bold;
            margin-top: 0px;
            background-color: rgba(2,2,2,0.2);
            border-radius: 5px;
            width: 560px;
            padding-left: 50px;
        }
        .autocomplete-box {
            background-color: white;
            border: 1px solid #ccc;
            position: absolute;
            z-index: 999;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
        }
        .station-suggestion {
            padding: 5px;
            cursor: pointer;
        }
        .station-suggestion:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="row bg-img text-light">
    <div class="col-12 col-sm-12 col-md-4 offset-1">
        <div class="row pnr m-5 text-center">
            <div class="col-12 mt-3">
                <span><img src="asset/img/logo/rail_icon.png"></span><br>
                <span class="fs-1">BOOK</span>
                <span class="fs-2">YOUR TICKET</span>
            </div>
            <div class="col-12 mt-4">
                <form action="./train_list.php" method="post">
                    <div class="input-group position-relative">
                        <input type="text" name="src" id="fromInput" class="form-control hvr-shadow" placeholder="From*" required> 
                        <div id="from-list" class="autocomplete-box"></div>
                    </div><br>
                    <div class="input-group position-relative">
                        <input type="text" name="dest" id="toInput" class="form-control hvr-shadow" placeholder="To*" required>
                        <div id="to-list" class="autocomplete-box"></div>
                    </div><br>
                    <div class="input-group">
                        <input type="date" name="date" class="form-control hvr-shadow" required>
                        <div class="input-group-append">
                            <span class="input-group-text text-dark">
                                <img src="asset/img/logo/cal.png" width="20" height="20">
                            </span>
                        </div>
                    </div><br>
                    <div class="input-group">
                        <select name="class" class="custom-select hvr-shadow">
                            <option value="ALL">All Classes</option>
                            <option value="AC">AC</option>
                            <option value="SL">Sleeper(SL)</option>
                        </select>
                    </div><br>
                    <div class="input-group">
                        <input class="btn text-light bg-blue btn-block hvr-shadow" type="submit" value="Find Trains">
                    </div><br>
                </form>
            </div>
        </div>
    </div>

    <div class="sm-hide col-sm-6 offset-0">
        <div class="text-left main-name">
            <span>Rubi Enterprises</span>
        </div>
    </div>
</div>

<?php include('footer.html'); ?>

<script>
    const stations = <?= $station_json ?>;

    function showSuggestions(input, listContainerId) {
        const listContainer = document.getElementById(listContainerId);
        listContainer.innerHTML = "";
        const value = input.value.toLowerCase();

        if (value.length === 0) {
            listContainer.style.display = "none";
            return;
        }

        const filtered = stations.filter(st => st.toLowerCase().includes(value));
        filtered.forEach(st => {
            const div = document.createElement("div");
            div.textContent = st;
            div.classList.add("station-suggestion");
            div.onclick = () => {
                input.value = st;
                listContainer.innerHTML = "";
                listContainer.style.display = "none";
            };
            listContainer.appendChild(div);
        });

        listContainer.style.display = "block";
    }

    window.onload = () => {
        const fromInput = document.getElementById("fromInput");
        const toInput = document.getElementById("toInput");

        fromInput.addEventListener("input", () => showSuggestions(fromInput, 'from-list'));
        toInput.addEventListener("input", () => showSuggestions(toInput, 'to-list'));
    }
</script>

</body>
</html>
