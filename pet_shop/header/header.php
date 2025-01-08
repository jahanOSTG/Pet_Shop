<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../header/header_style.css"> <!-- Adjusted path -->
    <style>
        /* Additional styling for dropdown menus */
        .dropdown-menu {
            background-color: #FFFBEA;
        }
        .dropdown-item:hover {
            background-color: #FFD700;
        }
        .dropdown-item {
            font-size: 16px;
        }
        .dropdown:hover > .dropdown-menu {
            display: block; /* Ensure the dropdown stays open when hovered */
        }
        /* Custom style for multi-level dropdown */
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;                                                        
    margin-top: -6px;
    border-radius: 0.25rem;
}

.dropdown-submenu:hover > .dropdown-menu {
    display: block;
}
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar text-right py-2" style="background-color: #FFD700;">
        <span class="mr-3">Smart Platform for Pet Adoption, Care, and Service Management</span>
    </div>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFBEA;">
        <a class="navbar-brand font-weight-bold" href="../index/index.php">
            <i class="fas fa-paw text-warning"></i> Petবন্ধু
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="../index/index.php" class="nav-link"><b>Homepage</b></a></li>
                <li class="nav-item"><a href="../adoption_sec/adoption.php" class="nav-link"><b>Adoption</b></a></li>
                <li class="nav-item"><a href="../shop/shop.php" class="nav-link"><b>Shop</b></a></li>
                <li class="nav-item"><a href="../vet_services/vet_services.php" class="nav-link"><b>Vet Service</b></a></li>
                <li class="nav-item"><a href="../about_us/about_us.php" class="nav-link"><b>About Us</b></a></li>
                <li class="nav-item"><a href="../contact/contact.php" class="nav-link"><b>Contact</b></a></li>
                <!-- Account Dropdown -->
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <b>Account</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="accountDropdown">
        <!-- User Section -->
        <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="../account/log_in.php">User</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">My Orders</a>
                <a class="dropdown-item" href="#">Adoption Requests</a>
                <a class="dropdown-item" href="#">Appointments</a>
                <a class="dropdown-item" href="#">Notifications</a>
            </div>
        </div>
        <!-- Admin Section -->
        <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="../account/admin_login.php">Admin</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">User Management</a>
                <a class="dropdown-item" href="#">Manage Pets</a>
                <a class="dropdown-item" href="#">Manage Products</a>
                <a class="dropdown-item" href="#">Adoption Requests</a>
                <a class="dropdown-item" href="#">Reports & Analytics</a>
                <a class="dropdown-item" href="#">Admin Settings</a>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="#">Logout</a>
    </div>
</li>

                <!-- Cart -->
                <li class="nav-item">
                    <a href="../cart/cart.php" class="nav-link">
                        <i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-warning">3</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- JS for Dropdown functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
