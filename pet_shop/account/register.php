<?php
// Database connection directly in the register.php file
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
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $created_at = date('Y-m-d H:i:s'); // Current timestamp
    $address = $_POST['address']; // User address

    // Handle photo upload
    $user_photo = ''; // Default value if no photo is uploaded
    if (isset($_FILES['user_photo']) && $_FILES['user_photo']['error'] == 0) {
        // Check if the uploaded file is a valid image
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['user_photo']['type'], $allowed_types)) {
            $upload_dir = '../image/uploads/'; // Updated directory to 'htdocs\Petবন্ধু\image\uploads'
            $file_name = basename($_FILES['user_photo']['name']);
            $file_path = $upload_dir . $file_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES['user_photo']['tmp_name'], $file_path)) {
                $user_photo = $file_path; // Store the file path in the database
            } else {
                echo "<script>alert('Photo upload failed.');</script>";
            }
        } else {
            echo "<script>alert('Invalid photo type. Please upload a JPEG, PNG, or GIF image.');</script>";
        }
    }

    // Check if required fields are filled
    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required!');</script>";
    } else {
        try {
            // Prepare the SQL query to insert user data
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, created_at, user_photo, address) 
                                  VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$username, $email, $password, $created_at, $user_photo, $address]);

            echo "<script>alert('User registered successfully!');</script>";
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
    <title>Registration Form</title>
    <link rel="stylesheet" href="login_register_style.css" type="text/css">
</head>
<body style="background-image: url('../image/pet4.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
   
<?php include '../header/header.php'; ?>

<div class="main">
        <div class="register">
            <h2>REGISTER HERE</h2>
            <form id="register" method="post" enctype="multipart/form-data">
                <label>Username:</label>
                <br>
                <input type="text" name="username" placeholder="Enter Your Username" required>
                <br><br>

                <label>Email:</label>
                <br>
                <input type="email" name="email" id="email" placeholder="Enter Your Valid Email" required>
                <br><br>

                <label>Password:</label>
                <br>
                <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                <br><br>

                <label>Address:</label>
                <br>
                <textarea name="address" placeholder="Enter Your Address" required></textarea>
                <br><br>

                <label>Upload Photo:</label>
                <br>
                <input type="file" name="user_photo" accept="image/jpeg, image/png, image/gif">
                <br><br>

                <input type="submit" value="Submit" name="submit" id="submit">
            </form>
        </div>
    </div>
</body>
</html>
