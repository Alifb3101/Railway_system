<?php
session_start();
include('DBConnection.php');
include("adminheader2.html");

// Map train_no to location coordinates
$train_locations = [
    '101' => ['city' => 'Delhi', 'lat' => 28.6139, 'lng' => 77.2090],
    '102' => ['city' => 'Agra', 'lat' => 27.1767, 'lng' => 78.0081],
    '103' => ['city' => 'Jaipur', 'lat' => 26.9124, 'lng' => 75.7873],
    '104' => ['city' => 'Mumbai', 'lat' => 19.0760, 'lng' => 72.8777],
];

$message = '';
$signal_sent = false;

// Handle signal update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $train_no = $_POST['train_no'];
    $signal = $_POST['signals'];

    $status = match($signal) {
        'Red' => 'Stopped',
        'Yellow' => 'Waiting',
        'Green' => 'Running',
        default => 'Running'
    };

    $check = $conn->query("SELECT * FROM train_status WHERE train_no='$train_no'");
    if ($check->num_rows > 0) {
        $conn->query("UPDATE train_status SET signals='$signal', status='$status' WHERE train_no='$train_no'");
    } else {
        $conn->query("INSERT INTO train_status(train_no, signals, status) VALUES('$train_no', '$signal', '$status')");
    }

    $message = "Signal for Train No $train_no updated to <strong>$signal</strong>.";
    $signal_sent = true;
}

// Fetch train, status, and route info
$sql = "SELECT t.train_no, t.train_name, 
        COALESCE(ts.status, 'Running') AS status, 
        COALESCE(ts.signals, 'Green') AS signals,
        st.source, st.destination
        FROM train t 
        LEFT JOIN train_status ts ON t.train_no = ts.train_no
        LEFT JOIN station st ON t.train_no = st.train_no";

$result = $conn->query($sql);

$status_summary = ['Running' => 0, 'Stopped' => 0, 'Waiting' => 0];
$train_data = [];

while ($row = $result->fetch_assoc()) {
    $status_summary[$row['status']]++;
    $train_data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Signals</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
    <style>
        body { background-color: #f9f9f9; font-family: 'Roboto', sans-serif; }
        .signal-btn { width: 40px; height: 40px; border-radius: 50%; border: none; margin: 5px; cursor: pointer; transition: transform 0.3s ease-in-out; }
        .signal-btn:hover { transform: scale(1.1); }
        .green { background-color: #28a745; }
        .red { background-color: #e74c3c; }
        .yellow { background-color: #f39c12; }
        .badge-status { font-size: 14px; padding: 5px 12px; border-radius: 20px; font-weight: 600; }
        .table th, .table td { vertical-align: middle !important; padding: 10px; }
        .table { background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); }
        .loading-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); z-index: 999; justify-content: center; align-items: center;
        }
        .loading-spinner {
            border: 4px solid #f3f3f3; border-top: 4px solid #3498db; border-radius: 50%;
            width: 50px; height: 50px; animation: spin 2s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .success-message {
            display: none;
            color: #28a745;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: fadeInOut 4s ease-in-out forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            50% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -40%);
            }
        }

        .success-checkmark { color: #28a745; font-size: 50px; }
        .train-link {
            color: #007bff;
            font-weight: 500;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
        }
        .train-link:hover {
            color: #0056b3;
            transform: translateY(-2px);
        }
        .train-info {
            color: #555;
            font-size: 14px;
            font-weight: 400;
            padding: 3px 5px;
            margin-top: 5px;
            display: block;
        }
        .table td {
            white-space: nowrap;
        }
        .fake-map-route {
            display: flex; align-items: center; justify-content: center;
        }
        .route-line {
            flex: 1; height: 4px; background: #007bff; margin: 0 10px;
        }
        .station {
            font-weight: 600; font-size: 16px; background-color: #fff;
            padding: 6px 12px; border: 2px solid #007bff; border-radius: 8px;
        }
        .station.start { color: green; }
        .station.end { color: red; }
    </style>
</head>
<body onload="<?= $signal_sent ? 'showLoadingAndSuccessAnimation();' : '' ?>">

<?php include("adminmenu.html"); ?>

<div class="container-fluid">
    <div class="container bg-white p-5 mt-4 shadow-sm rounded">
        <h2 class="text-center mb-4">Train Signal Control Panel</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-success text-center">
                <i class="fas fa-paper-plane text-primary"></i> <?= $message ?> <br>
                <small>Sent to Signal Management Office</small>
            </div>
        <?php endif; ?>

        <!-- Mini Dashboard -->
        <div class="row text-center mb-5">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm rounded border-success"><h5><i class="fas fa-train text-success"></i> Running</h5><h3><?= $status_summary['Running'] ?></h3></div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-sm rounded border-danger"><h5><i class="fas fa-ban text-danger"></i> Stopped</h5><h3><?= $status_summary['Stopped'] ?></h3></div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-sm rounded border-warning"><h5><i class="fas fa-hourglass-half text-warning"></i> Waiting</h5><h3><?= $status_summary['Waiting'] ?></h3></div>
            </div>
        </div>

        <!-- ✅ Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Train No</th>
                        <th>Train Name</th>
                        <th>Status</th>
                        <th>Signal</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Change Signal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($train_data as $i => $row): ?>
                        <?php
                            $loc = $train_locations[$row['train_no']]['city'] ?? 'En Route';
                            $status_class = match($row['status']) {
                                'Running' => 'success',
                                'Stopped' => 'danger',
                                'Waiting' => 'warning',
                                default => 'secondary'
                            };
                        ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $row['train_no'] ?></td>
                            <td>
                                <a href="#" class="train-link" data-toggle="modal" data-target="#mapModal"
                                   data-train="<?= htmlspecialchars($row['train_name']) ?>"
                                   data-source="<?= htmlspecialchars($row['source'] ?? 'Unknown') ?>"
                                   data-destination="<?= htmlspecialchars($row['destination'] ?? 'Unknown') ?>">
                                    <?= htmlspecialchars($row['train_name']) ?>
                                </a>
                                <span class="train-info">Source: <?= $row['source'] ?> | Destination: <?= $row['destination'] ?></span>
                            </td>
                            <td><span class="badge badge-<?= $status_class ?> badge-status"><?= $row['status'] ?></span></td>
                            <td><span class="badge badge-pill badge-light"><?= $row['signals'] ?></span></td>
                            <td><strong><?= $row['source'] ?? 'N/A' ?></strong></td>
                            <td><strong><?= $row['destination'] ?? 'N/A' ?></strong></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="train_no" value="<?= $row['train_no'] ?>">
                                    <button type="submit" name="signals" value="Red" class="signal-btn red" title="Stop"></button>
                                    <button type="submit" name="signals" value="Yellow" class="signal-btn yellow" title="Wait"></button>
                                    <button type="submit" name="signals" value="Green" class="signal-btn green" title="Go"></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="loading-overlay" id="loadingOverlay"><div class="loading-spinner"></div></div>
        <div class="success-message" id="successMessage">
            <i class="success-checkmark fas fa-check-circle"></i> Success! Signal Sent.
        </div>

        <!-- Map Modal -->
        <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Train Route</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
              </div>
              <div class="modal-body text-center">
                <h5 id="trainRouteTitle" class="mb-4"></h5>
                <div class="fake-map-route">
                    <span class="station start" id="mapSource"></span>
                    <div class="route-line"></div>
                    <span class="station end" id="mapDestination"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
</div>

<script>
    function showLoadingAndSuccessAnimation() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        setTimeout(() => {
            document.getElementById('loadingOverlay').style.display = 'none';
            document.getElementById('successMessage').style.display = 'block';
        }, 3000);
    }

    document.querySelectorAll('.train-link').forEach(link => {
        link.addEventListener('click', function () {
            document.getElementById('trainRouteTitle').textContent = `Route for ${this.dataset.train}`;
            document.getElementById('mapSource').textContent = this.dataset.source;
            document.getElementById('mapDestination').textContent = this.dataset.destination;
        });
    });
</script>

<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>
