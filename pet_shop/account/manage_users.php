<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "petbondhu"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete operation
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

// Handle add operation
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $user_photo = $_FILES['user_photo']['name'];

    // Upload user photo
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);

    $sql = "INSERT INTO users (username, email, password_hash, created_at, user_photo, address) 
            VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $password_hash, $user_photo, $address);
    $stmt->execute();
}

// Handle update operation
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $user_photo = $_FILES['user_photo']['name'];

    if ($user_photo) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
        move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);

        $sql = "UPDATE users SET username = ?, email = ?, address = ?, user_photo = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $email, $address, $user_photo, $user_id);
    } else {
        $sql = "UPDATE users SET username = ?, email = ?, address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $address, $user_id);
    }
    $stmt->execute();
}

// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="manage_users.css">
</head>
<body>
<div class="container">
    <h1>Manage Users</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Add New User</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="file" name="user_photo">
        <button type="submit" name="add">Add User</button>
    </form>
    <h2>Existing Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['user_id']) ?></td>
                    <td><img src="uploads/<?= htmlspecialchars($row['user_photo']) ?>" alt="User Photo"></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" class="inline-form">
                            <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                            <input type="text" name="username" value="<?= htmlspecialchars($row['username']) ?>" required>
                            <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
                            <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required>
                            <input type="file" name="user_photo">
                            <button type="submit" name="update">Update</button>
                        </form>
                        <form action="" method="POST" class="inline-form">
                            <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
