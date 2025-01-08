<?php
// Start session to ensure the user is logged in
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$user_photo = $_SESSION['user_photo']; // Fetch profile photo from session (which is set during login)

// You can fetch more data from the database if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard_style.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar (You can include your header here) -->
    <?php include '../header/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <!-- Edit Profile Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <!-- Display the user's profile picture -->
                    <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?uid=R116550269&ga=GA1.1.168030900.1707292034&semt=ais_hybrid" class="card-img-top" alt="Profile Picture">

                    <div class="card-body">
                        <h5 class="card-title">Edit Profile</h5>
                        <p class="card-text">Update your personal details.</p>
                        <a href="edit_profile.php" class="btn btn-primary">Go to Edit Profile</a>
                    </div>
                </div>
            </div>

            <!-- Pet Profile Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                <img src="https://i.pinimg.com/736x/65/58/f9/6558f9f24ce29dbe78cb8cc3b8fc6957.jpg" class="card-img-top" alt="Profile Picture">

                
                    <div class="card-body">
                        <h5 class="card-title">Pet Profile</h5>
                        <p class="card-text">Manage your pet's profile.</p>
                        <a href="pet_profile.php" class="btn btn-primary">Go to Pet Profile</a>
                    </div>
                </div>
            </div>

            <!-- Vet History Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://cdn.create.vista.com/api/media/small/575440556/stock-vector-illustration-design-pet-doctor" class="card-img-top" alt="Vet Image">
                    <div class="card-body">
                        <h5 class="card-title">Vet History</h5>
                        <p class="card-text">View your pet's vet history.</p>
                        <a href="vet_history.php" class="btn btn-primary">Go to Vet History</a>
                    </div>
                </div>
            </div>

            <!-- Shopping History Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://i.pinimg.com/originals/7e/5f/2c/7e5f2c39ba08c9992783434d1862fc4a.jpg" class="card-img-top" alt="Shopping Image">
                    <div class="card-body">
                        <h5 class="card-title">Shopping History</h5>
                        <p class="card-text">Review your shopping history.</p>
                        <a href="shopping_history.php" class="btn btn-primary">Go to Shopping History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
