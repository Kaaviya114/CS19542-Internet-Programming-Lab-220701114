<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM advertisements WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Newspaper Advertisement System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .dashboard-header h2 {
            font-weight: 700;
        }
        .ad-table {
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }
        .ad-table th, .ad-table td {
            padding: 15px;
            vertical-align: middle;
        }
        .ad-table th {
            background-color: #343a40;
            color: #ffffff;
        }
        .ad-table td {
            background-color: #f8f9fa;
        }
        .btn-create-ad {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
        }
        .btn-logout {
            background-color: #dc3545;
            color: #ffffff;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Newspaper Ad System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Welcome to Your Dashboard</h2>
            <a href="create_ad.php" class="btn btn-primary btn-create-ad">Create New Ad</a>
        </div>

        <!-- Advertisement Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover ad-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Newspaper</th>
                        <th>Publish Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) { ?>
                        <?php while ($ad = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ad['title']); ?></td>
                            <td><?php echo htmlspecialchars($ad['category']); ?></td>
                            <td><?php echo htmlspecialchars($ad['newspaper']); ?></td>
                            <td><?php echo htmlspecialchars($ad['publish_date']); ?></td>
                            <td>
                                <?php 
                                if ($ad['status'] == 'Pending') {
                                    echo '<span class="badge badge-warning">Pending</span>';
                                } elseif ($ad['status'] == 'Submitted') {
                                    echo '<span class="badge badge-info">Submitted</span>';
                                } elseif ($ad['status'] == 'Published') {
                                    echo '<span class="badge badge-success">Published</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5">No advertisements found. Click on "Create New Ad" to add an advertisement.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
