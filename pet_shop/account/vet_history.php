<?php
$host = 'localhost'; // Database host
$user = 'root'; // Database username
$password = ''; // Database password
$dbname = 'petbondhu'; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from online_appointment
$online_query = "SELECT * FROM online_appointment";
$online_result = $conn->query($online_query);

// Fetch data from offline_appointment
$offline_query = "SELECT * FROM offline_appointment";
$offline_result = $conn->query($offline_query);

// Close connection after data is fetched
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet History</title>
    <link rel="stylesheet" href="vet_history_styles.css">
</head>
<body>
    <div class="container">
        <h1>Veterinary History</h1>

        <h2>Online Appointments</h2>
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Pet Type</th>
                    <th>Service Type</th>
                    <th>Pet Condition</th>
                    <th>Owner Name</th>
                    <th>Email</th>
                    <th>Consultation Date</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $online_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['pet_type']; ?></td>
                        <td><?php echo $row['service_type']; ?></td>
                        <td><?php echo $row['pet_condition']; ?></td>
                        <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['consultation_date']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Offline Appointments</h2>
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Owner Name</th>
                    <th>Pet Type</th>
                    <th>Preferred Date</th>
                    <th>Consultation Location</th>
                    <th>Selected Location</th>
                    <th>Owner Number</th>
                    <th>Symptoms</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $offline_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['owner_name']; ?></td>
                        <td><?php echo $row['pet_type']; ?></td>
                        <td><?php echo $row['preferred_date']; ?></td>
                        <td><?php echo $row['consultation_location']; ?></td>
                        <td><?php echo $row['selected_location']; ?></td>
                        <td><?php echo $row['owner_number']; ?></td>
                        <td><?php echo $row['symptoms']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Back to Dashboard Button -->
    <a href="dashboard.php" class="back-button">Back to Dashboard</a>

</body>
</html>
