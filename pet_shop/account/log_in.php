<?php
// Database connection directly in the login.php file
$host = 'localhost'; // Your database host
$dbname = 'petbondhu'; // Your actual database name
$username = 'root'; // Your database username (default is 'root' for XAMPP)
$password = ''; // Your database password (default is empty for XAMPP)

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if (isset($_POST['submit'])) {
    // Get the form data
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // Check if fields are filled
    if (empty($username_input) || empty($password_input)) {
        echo "<script>alert('Please fill in both fields.');</script>";
    } else {
        try {
            // Prepare the SQL query to fetch user data based on username
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username_input]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password_input, $user['password_hash'])) {
                // Successful login
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_photo'] = $user['user_photo'];
                echo "<script>alert('Login successful!'); window.location.href = 'dashboard.php';</script>";
            } else {
                echo "<script>alert('Invalid username or password.');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login_register_style.css" type="text/css">
</head>
<body>


<?php include '../header/header.php'; ?>




    <div class="main">
        <div class="login">
            <h2>LOGIN</h2>
            <!-- Login Form -->
            <form method="post">
                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>

                <input type="submit" value="Login" name="submit">
            </form>

            <!-- Message linking to the registration page -->
            <div class="register-link">
                <p>Do not have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
