<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper Advertisement System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .hero-section {
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
        }
        .features-section {
            padding: 50px 0;
        }
        .feature {
            text-align: center;
            padding: 20px;
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Welcome to the Newspaper Advertisement System</h1>
            <p>Create and submit advertisements for newspapers easily.</p>
            <a href="register.php" class="btn btn-primary btn-lg mt-3">Get Started</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 feature">
                    <img src="image1.jpg" alt="Feature 1" class="img-fluid mb-3">
                    <h3>Easy Ad Creation</h3>
                    <p>Create your advertisement with just a few clicks.</p>
                </div>
                <div class="col-md-4 feature">
                    <img src="image2.jpg" alt="Feature 2" class="img-fluid mb-3">
                    <h3>Wide Reach</h3>
                    <p>Get your ads published in multiple newspapers.</p>
                </div>
                <div class="col-md-4 feature">
                    <img src="image3.jpg" alt="Feature 3" class="img-fluid mb-3">
                    <h3>Track Your Ads</h3>
                    <p>Monitor the status of your advertisements easily.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="container mt-5">
        <h2>Contact Us</h2>
        <p>If you have any questions or need help, feel free to contact us.</p>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Your Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Your Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea class="form-control" id="inputMessage" rows="4" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" onclick="alert('Your message has been sent successfully!')">Send Message</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="mt-5 bg-dark text-white text-center py-3">
        <p>&copy; 2024 Newspaper Advertisement System. All rights reserved.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>