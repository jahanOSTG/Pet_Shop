<?php
// Include database connection
include 'admin_database.php'; // Adjust path to your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $admin_name = mysqli_real_escape_string($connect, $_POST['admin_name']);
    $admin_password = mysqli_real_escape_string($connect, $_POST['admin_password']);
    $admin_email = mysqli_real_escape_string($connect, $_POST['admin_email']);
    $admin_phone = mysqli_real_escape_string($connect, $_POST['admin_phone']);
    $admin_role = mysqli_real_escape_string($connect, $_POST['admin_role']);

    // Check if admin already exists
    $check_query = "SELECT * FROM admins WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Admin already exists
        echo "<script>alert('Admin with the same name or email already exists!'); window.location.href='add_admin_form.php';</script>";
    } else {
        // Insert new admin
        $insert_query = "INSERT INTO admins (admin_name, admin_password, admin_email, admin_phone, admin_role) 
                         VALUES ('$admin_name', '$admin_password', '$admin_email', '$admin_phone', '$admin_role')";
        if (mysqli_query($connect, $insert_query)) {
            echo "<script>alert('Admin added successfully!'); window.location.href='admin_settings.php';</script>";
        } else {
            echo "<script>alert('Error adding admin. Please try again.'); window.location.href='add_admin_form.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <style>
        /* Global Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #87CEFA, #1e1e2f);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .settings-container {
            width: 90%;
            max-width: 800px;
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .settings-header h1 {
            font-size: 2.5rem;
            color: #00d1b2;
            margin-bottom: 10px;
        }

        .settings-header p {
            font-size: 1.2rem;
            color: #aaa;
        }

        .admin-count-card {
            background: linear-gradient(145deg, #27293d, #1a1a28);
            border-radius: 12px;
            padding: 20px;
            margin: 20px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .admin-count-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
        }

        .admin-count-card .icon {
            font-size: 4rem;
            color: #f39c12;
            margin-bottom: 10px;
        }

        .admin-count-card .count {
            font-size: 3rem;
            font-weight: bold;
            color: #00d1b2;
        }

        .admin-count-card .label {
            font-size: 1.2rem;
            color: #aaa;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #00d1b2;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="settings-container">
        <!-- Header -->
        <div class="settings-header">
            <h1>Admin Settings</h1>
            <p>Overview of platform administrators</p>
        </div>

        <!-- Admin Count Card -->
        <div class="admin-count-card">
            <div class="icon">👤</div>
            <div class="count" id="adminCount">--</div>
            <div class="label">Total Admins</div>
        </div>

        <!-- Back to Dashboard -->
        <div><a href="../account/add_admin.php" class="back-link">Add new Admin</a></div>
        <a href="admin_dashboard.php" class="back-link">Back to Dashboard</a>
    </div>

    <script>
        // Fetch total admin count dynamically
        document.addEventListener("DOMContentLoaded", () => {
            fetch('total_admin_count.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('adminCount').textContent = data.totalAdmins;
                })
                .catch(error => {
                    console.error('Error fetching admin count:', error);
                });
        });
    </script>
</body>
</html>
