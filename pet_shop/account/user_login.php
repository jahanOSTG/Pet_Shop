<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "petbondhu"; // Your database name

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare query to check user credentials
    $query = "SELECT user_id, email, password FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    
    if ($stmt === false) {
        die('MySQL prepare error: ' . $mysqli->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        // User exists, now check the password
        $stmt->bind_result($user_id, $db_email, $db_password);
        $stmt->fetch();

        // Check if password matches (for hashed passwords, use password_verify)
        if ($password == $db_password) { // In a real application, use password_verify()
            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $db_email;

            // Redirect to the shop or wherever you want
            header("Location: shop.php");
            exit;
        } else {
            echo "<p style='color: red;'>Invalid password.</p>";
        }
    } else {
        echo "<p style='color: red;'>No user found with that email.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login_style.css">
  <script src="valid.js"></script>
</head>
<body style="background-image: url('../image/pet.back.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">

  <div class="form">
    <h1>USER LOGIN</h1>
    <form action="user_login.php" method="POST">
      <p>Email :</p>
      <input type="email" name="email" placeholder="Enter your email" required>
      
      <p>Password :</p>
      <input type="password" name="password" placeholder="Enter your password" required id="pass"> 
      
      <input type="checkbox" onclick="myfunction()"> Show Password
      <br><br>
      <input type="submit" value="LOGIN">
    </form>
    
    <p class="text-center mt-3" style="font-weight: bold; color: #ff5733;">Don't have an account? </p>
    <ul><li><a href="../account/register.php">Register</a></li></ul>
  </div>

</body>
</html>
