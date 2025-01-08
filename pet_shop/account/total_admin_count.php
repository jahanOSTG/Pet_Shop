<?php
// Include database connection
include 'admin_database.php'; // Adjust the path to your database connection file

// Query to count total admins
$query = "SELECT COUNT(*) AS totalAdmins FROM admins";
$result = mysqli_query($connect, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['totalAdmins' => $row['totalAdmins']]);
} else {
    echo json_encode(['totalAdmins' => 0]); // In case of error, return 0
}
?>
