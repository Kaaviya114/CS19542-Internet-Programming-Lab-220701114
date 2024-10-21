
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
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
    <title>Register - Newspaper Advertisement System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 450px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }
        .register-container .form-control {
            border-radius: 30px;
            padding: 20px;
        }
        .register-container .btn {
            width: 100%;
            border-radius: 30px;
            padding: 10px;
            font-size: 1.2rem;
        }
        .register-container .social-register {
            text-align: center;
            margin-top: 20px;
        }
        .social-register button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2>Create Your Account</h2>
            <?php if (isset($error_message)) { echo "<div class='alert alert-danger'>$error_message</div>"; } ?>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <div class="social-register">
                    <p>or register with</p>
                    <button class="btn btn-outline-dark"><i class="fab fa-google"></i> Google</button>
                    <button class="btn btn-outline-dark"><i class="fab fa-facebook-f"></i> Facebook</button>
                </div>
                <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
