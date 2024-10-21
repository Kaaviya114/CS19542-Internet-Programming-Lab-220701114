<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $newspaper = $_POST['newspaper'];
    $publish_date = $_POST['publish_date'];

    $sql = "INSERT INTO advertisements (user_id, category, title, description, newspaper, publish_date)
            VALUES ('$user_id', '$category', '$title', '$description', '$newspaper', '$publish_date')";

    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Advertisement - Newspaper Advertisement System</title>
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
        .create-ad-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .create-ad-container h2 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }
        .form-box {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #e9ecef;
        }
        .form-box h4 {
            color: #343a40;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 30px;
            padding: 15px;
        }
        .btn-submit {
            width: 100%;
            border-radius: 30px;
            padding: 10px;
            font-size: 1.2rem;
        }
        .form-group label {
            color: #007bff;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Newspaper Ad System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Create Ad Form Container -->
    <div class="create-ad-container">
        <h2>Create New Advertisement</h2>
        <?php if (isset($error_message)) { echo "<div class='alert alert-danger'>$error_message</div>"; } ?>

        <form action="create_ad.php" method="POST">
            <!-- Ad Category Box -->
            <div class="form-box">
                <h4>Ad Category</h4>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Choose a Category</option>
                        <option value="Jobs">Jobs</option>
                        <option value="Real Estate">Real Estate</option>
                        <option value="Matrimony">Matrimony</option>
                        <option value="Services">Services</option>
                    </select>
                </div>
            </div>

            <!-- Ad Details Box -->
            <div class="form-box">
                <h4>Ad Details</h4>
                <div class="form-group">
                    <label for="title">Ad Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter the ad title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter the ad description" required></textarea>
                </div>
            </div>

            <!-- Newspaper and Date Box -->
            <div class="form-box">
                <h4>Publication Details</h4>
                <div class="form-group">
                    <label for="newspaper">Select Newspaper</label>
                    <select name="newspaper" id="newspaper" class="form-control" required>
                        <option value="">Choose a Newspaper</option>
                        <option value="Times of India">Times of India</option>
                        <option value="The Hindu">The Hindu</option>
                        <option value="Hindustan Times">Hindustan Times</option>
                        <option value="Economic Times">Economic Times</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" class="form-control" name="publish_date" id="publish_date" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-submit">Submit Advertisement</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
