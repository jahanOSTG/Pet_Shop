<?php
// Include the database connection
include('../account/admin_database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $admin_name = mysqli_real_escape_string($connect, $_POST['admin_name']);
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_BCRYPT); // Encrypt password
    $admin_email = mysqli_real_escape_string($connect, $_POST['admin_email']);
    $admin_phone = mysqli_real_escape_string($connect, $_POST['admin_phone']);
    $admin_role = mysqli_real_escape_string($connect, $_POST['admin_role']);

    // Insert query
    $sql = "INSERT INTO admins (admin_name, admin_password, admin_email, admin_phone, admin_role) 
            VALUES ('$admin_name', '$admin_password', '$admin_email', '$admin_phone', '$admin_role')";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('New admin added successfully!'); window.location.href='../account/admin_setting.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

// Close connection
mysqli_close($connect);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Admin</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #87CEFA, #1e1e2f);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #00d1b2;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container input, .form-container select {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            background: #00d1b2;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-container button:hover {
            background: #00796b;
        }

        .form-container a {
            color: #00d1b2;
            text-decoration: none;
            margin-top: 10px;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Admin</h1>
        <form action="add_admin.php" method="POST">
            <input type="text" name="admin_name" placeholder="Enter Admin Name" required>
            <input type="password" name="admin_password" placeholder="Enter Password" required>
            <input type="email" name="admin_email" placeholder="Enter Email Address" required>
            <input type="text" name="admin_phone" placeholder="Enter Phone Number" required>
            <select name="admin_role" required>
                <option value="" disabled selected>Select Admin Role</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
            </select>
            <button type="submit">Add Admin</button>
        </form>
        <a href="../account/admin_setting.php">Back to Admin Settings</a>
    </div>
</body>
</html>