<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if user is not logged in
    exit;
}

// Database connection
$host = 'localhost'; // Your database host
$dbname = 'petbondhu'; // Your actual database name
$username = 'root'; // Your database username (default is 'root' for XAMPP)
$password = ''; // Your database password (default is empty for XAMPP)

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch user data based on the user_id stored in session
    $stmt = $pdo->prepare("SELECT user_id, username, email, user_photo, address FROM users WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user data is fetched successfully
    if (!$user) {
        echo "<script>alert('User not found.');</script>";
        exit;
    }

} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
}
?>

<!-- HTML Form to Display User Data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit_profile.css">
 <!-- Link to your CSS file -->
</head>
<body>



   


<div class="profile-container">
        <h2>Edit Profile</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>

            <label>Profile Picture:</label>
            <input type="file" name="profile_pic">
            <p>Current Profile Picture:</p>
            <img src="../images/uploads/<?php echo htmlspecialchars($user['user_photo']); ?>" alt="Profile Picture" width="150">

            <input type="submit" name="submit" value="Update Profile">
        </form>
    </div>

    <?php
    // Handle form submission
    if (isset($_POST['submit'])) {
        // Get form data
        $address = $_POST['address'];

        // Handle profile picture upload
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            $target_dir = "../images/uploads/";
            $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
            $profile_pic = basename($_FILES["profile_pic"]["name"]);
        } else {
            // If no new picture uploaded, keep the existing profile picture
            $profile_pic = $user['user_photo'];
        }

        // Update user data in the database
        try {
            $stmt = $pdo->prepare("UPDATE users SET address = ?, user_photo = ? WHERE user_id = ?");
            $stmt->execute([$address, $profile_pic, $_SESSION['user_id']]);

            // Update session variables after successful update
            $_SESSION['address'] = $address;
            $_SESSION['user_photo'] = $profile_pic;

            echo "<script>alert('Profile updated successfully!');</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
    ?>

</body>
</html>
