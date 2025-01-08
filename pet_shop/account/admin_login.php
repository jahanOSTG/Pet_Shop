<?php
// Include database connection
include '../account/admin_database.php'; // Replace with your actual database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $admin_name = mysqli_real_escape_string($connect, $_POST['admin_name']);
    $admin_password = mysqli_real_escape_string($connect, $_POST['admin_password']);

    // Check if the admin credentials exist in the database
    $query = "SELECT * FROM admins WHERE admin_name = '$admin_name' AND admin_password = '$admin_password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        // Successful login
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Failed login
        echo "<script>alert('Invalid Admin Name or Password!'); window.location.href='admin_login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body style="background-image: url('../image/sad_dog.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
    <div class="container">
        <div class="myform">
            <!-- Add method and action attributes to the form -->
            <form action="" method="POST">
               <h2>ADMIN LOGIN</h2>
               <input type="text" name="admin_name" placeholder="Admin Name" required>
               <input type="password" name="admin_password" placeholder="Password" required>
               <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>
