
<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            header('Location: dashboard.php');
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with this email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Newspaper Advertisement System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container .form-control {
            border-radius: 30px;
            padding: 20px;
        }
        .login-container .btn {
            width: 100%;
            border-radius: 30px;
            padding: 10px;
            font-size: 1.2rem;
        }
        .login-container .social-login {
            text-align: center;
            margin-top: 20px;
        }
        .social-login button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Login</h2>
            <?php if (isset($error_message)) { echo "<div class='alert alert-danger'>$error_message</div>"; } ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="social-login">
                    <p>or login with</p>
                    <button class="btn btn-outline-dark"><i class="fab fa-google"></i> Google</button>
                    <button class="btn btn-outline-dark"><i class="fab fa-facebook-f"></i> Facebook</button>
                </div>
                <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

