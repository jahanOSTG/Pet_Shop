<?php
// Include the database connection file
include '../vet_services/offline_database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline Appointments</title>
    <link rel="stylesheet" href="../vet_services/online_form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right,rgb(0, 3, 10),rgb(7, 63, 251));
            color: #fff;
            background-size: cover;
            background-attachment: fixed;
        }

        h1 {
            text-align: center;
            color: #00bcd4;
            margin-top: 40px;
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table-container {
            max-width: 1000px;
            margin: 40px auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .table {
            background-color: linear-gradient(to bottom right,rgb(3, 76, 246),rgb(0, 2, 9));
            color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .table th, .table td {
            text-align: center;
            padding: 10px 5px;
        }

        .table th {
            background-color: #00bcd4;
            color: #121212;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table tr:hover {
            background-color: #333;
            transform: scale(1.02);
        }

        .btn-approve, .btn-delete {
            padding: 2px 25px;
            border-radius: 6px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-approve {
            background-color: #4caf50;
            color: white;
            border: none;
        }

        .btn-approve:hover {
            background-color: #388e3c;
            transform: scale(1.1);
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #e53935;
            transform: scale(1.1);
        }

        /* Card-like container with more shadow */
        .table-container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        /* Table hover effect */
        .table td {
            position: relative;
        }

        .table td:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.15);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .table td:hover:before {
            opacity: 1;
        }

        /* Mobile-friendly adjustments */
        @media (max-width: 768px) {
            .table-container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }

            .table th, .table td {
                font-size: 0.9rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="table-container mt-5">
    <h1>Offline Appointments</h1>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Owner Name</th>
                <th>Pet Type</th>
                <th>Consultation Location</th>
                <th>Selected Location</th>
                <th>Owner Contact</th>
                <th>Symptoms</th>
                <th>Preferred Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch offline appointments from the database
            $query = "SELECT * FROM offline_appointment ORDER BY id ASC";
            $result = mysqli_query($connect, $query);

            if (!$result) {
                echo "<tr><td colspan='9' class='text-center text-danger'>Query Error: " . mysqli_error($connect) . "</td></tr>";
            } elseif (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['owner_name']) . "</td>
                        <td>" . htmlspecialchars($row['pet_type']) . "</td>
                        <td>" . htmlspecialchars($row['consultation_location']) . "</td>
                        <td>" . htmlspecialchars($row['selected_location']) . "</td>
                        <td>" . htmlspecialchars($row['owner_number']) . "</td>
                        <td>" . htmlspecialchars($row['symptoms']) . "</td>
                        <td>" . htmlspecialchars($row['preferred_date']) . "</td>
                        <td>
                            <a href='?approve=" . $row['id'] . "' class='btn-approve'>Approve</a>
                            <a href='?delete=" . $row['id'] . "' class='btn-delete'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No offline appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Approve appointment logic
if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']);
    $updateQuery = "UPDATE offline_appointment SET status = 'Approved' WHERE id = $id";

    if (mysqli_query($connect, $updateQuery)) {
        echo "<script>
            alert('Appointment approved successfully!');
            window.location.href='offline_appointments.php';
        </script>";
    } else {
        echo "<script>
            alert('Error approving appointment: " . addslashes(mysqli_error($connect)) . "');
        </script>";
    }
}

// Delete appointment logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM offline_appointment WHERE id = $id";

    if (mysqli_query($connect, $deleteQuery)) {
        echo "<script>
            alert('Appointment deleted successfully!');
            window.location.href='offline_appointments.php';
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
