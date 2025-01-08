<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Petবন্ধু</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="front_style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand font-weight-bold" href="#">
            <i class="fas fa-paw text-warning"></i> Petবন্ধু
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="..\open_account\log_in.php"  class="nav-link">Log in</a></li>
                <li class="nav-item"><a href="..\index\index.php"  class="nav-link">Homepage</a></li>
            </ul>
        </div>
    </nav>

    <!-- Centered Title Section -->
    <div class="hero-section">
        <div class="hero-content text-center">
            <h1>Welcome to <span>Petবন্ধু</span></h1>
            <p>Your one-stop solution for pet adoption, shopping, and healthcare.</p>
            <button class="btn btn-warning btn-lg">Explore Now</button>
        </div>
    </div>

    <!-- Objectives Section -->
    <section class="objectives">
        <div class="container">
            <h2 class="text-center">Our Objectives</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-shield-alt fa-3x text-warning"></i>
                    <h4>Safe Pet Adoptions</h4>
                    <p>Create a secure platform for smooth and safe adoption processes.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                    <h4>A One-Stop Pet Solution</h4>
                    <p>Adoption, shopping, and healthcare—all in one space.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-heart fa-3x text-warning"></i>
                    <h4>Responsible Pet Ownership</h4>
                    <p>Promote caring and informed pet ownership practices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <p>© 2024 Pet Bondhu | Built with <i class="fas fa-heart text-danger"></i> for pet lovers</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
