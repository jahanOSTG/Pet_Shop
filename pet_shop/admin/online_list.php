<?php
// Include the database connection file
include '../vet_services/online_database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #232526, #414345);
            color: #e0e0e0;
        }

        h1 {
            text-align: center;
            color: #16a085;
            margin-top: 20px;
            text-shadow: 0px 5px 10px rgba(22, 160, 133, 0.5);
        }

        .table-container {
            max-width: 1200px;
            margin: auto;
            background: #2c3e50;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
        }

        .table {
            background: #34495e;
            color: #ecf0f1;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table th {
            background: #16a085;
            color: #fff;
            border: none;
            padding: 15px;
            text-align: center;
        }

        .table td {
            background: #2c3e50;
            padding: 15px;
            border: none;
            text-align: center;
            border-radius: 10px;
        }

        .btn-approve {
            background: linear-gradient(135deg, #1abc9c, #16a085);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            text-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.9rem;
            transition: all 0.3s ease-in-out;
        }

        .btn-delete {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            text-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.9rem;
            transition: all 0.3s ease-in-out;
        }

        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0px 5px 15px rgba(26, 188, 156, 0.5);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0px 5px 15px rgba(231, 76, 60, 0.5);
        }

        .no-data {
            text-align: center;
            color: #bdc3c7;
            font-size: 1.2rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="table-container">
    <h1>Online Appointments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Pet Type</th>
                <th>Service Type</th>
                <th>Pet Condition</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Consultation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch appointments from the database
            $query = "SELECT * FROM online_appointment ORDER BY id ASC";
            $result = mysqli_query($connect, $query);

            if (!$result) {
                echo "<tr><td colspan='9' class='no-data'>Query Error: " . mysqli_error($connect) . "</td></tr>";
            } elseif (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['pet_type']) . "</td>
                        <td>" . htmlspecialchars($row['service_type']) . "</td>
                        <td>" . htmlspecialchars($row['pet_condition']) . "</td>
                        <td>" . htmlspecialchars($row['first_name']) . "</td>
                        <td>" . htmlspecialchars($row['last_name']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['consultation_date']) . "</td>
                        <td>
                            <a href='?approve=" . $row['id'] . "' class='btn btn-approve'>Approve</a>
                            <a href='?delete=" . $row['id'] . "' class='btn btn-delete'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='no-data'>No appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Approve appointment logic
if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']);
    $updateQuery = "UPDATE online_appointment SET status = 'Approved' WHERE id = $id";

    if (mysqli_query($connect, $updateQuery)) {
        echo "<script>
            alert('Appointment approved successfully!');
            window.location.href='online_appointments.php';
        </script>";
    }
}

// Delete appointment logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM online_appointment WHERE id = $id";

    if (mysqli_query($connect, $deleteQuery)) {
        echo "<script>
            alert('Appointment deleted successfully!');
            window.location.href='online_appointments.php';
        </script>";
    } else {
        echo "<script>
            alert('Error deleting appointment: " . addslashes(mysqli_error($connect)) . "');
        </script>";
    }
}
?>
</body>
</html>
