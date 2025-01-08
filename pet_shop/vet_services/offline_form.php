<?php
// Include the database connection file
include 'offline_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline Appointment</title>
    <link rel="stylesheet" href="../vet_services/offline_form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<ul>
    <h4>
        <li style="text-align: right; list-style: none;">
            <a href="../vet_services/vet_services.php" style="color: white; text-decoration: none; font-weight: bold;">
                Back to Home
            </a>
        </li>
    </h4>
</ul>

<!-- Appointment Form -->
<div class="container mt-5">
    <h1 class="bg-dark text-white text-center p-3">Offline Consultation Form</h1>
    <form method="POST" action="" class="form mt-4">
        <div class="form-group mb-3">
            <label for="owner-name" class="form-label">Owner's Name:</label>
            <input type="text" name="owner_name" id="owner-name" class="form-control" placeholder="Enter Owner's Name" required>
        </div>
        <div class="form-group mb-3">
            <label for="pet-type" class="form-label">What pet do you have?</label>
            <select id="pet-type" name="pet_type" class="form-control" required>
                <option value="Cats">Cats</option>
                <option value="Dogs">Dogs</option>
                <option value="Birds">Birds</option>
                <option value="Fish">Fish</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="consultation-location" class="form-label">Consultation Location:</label>
            <select id="consultation-location" name="consultation_location" class="form-control" required>
                <option value="clinic">At the Clinic</option>
                <option value="home">Home Visit</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="selected-location" class="form-label">Select Location:</label>
            <select id="selected-location" name="selected_location" class="form-control" required>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Jessore">Jessore</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="owner-number" class="form-label">Owner's Contact Number:</label>
            <input type="tel" name="owner_number" id="owner-number" class="form-control" placeholder="Enter Owner's Number" required>
        </div>
        <div class="form-group mb-3">
            <label for="symptoms" class="form-label">Symptoms/Concerns:</label>
            <textarea id="symptoms" name="symptoms" class="form-control" rows="4" placeholder="Describe your pet's symptoms or concerns" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="preferred-date" class="form-label">Preferred Consultation Date:</label>
            <input type="date" name="preferred_date" id="preferred-date" class="form-control" required>
        </div>
        <button type="submit" name="add_appointment" class="btn btn-success mt-3">Submit Form</button>
    </form>
</div>

<?php
if (isset($_POST['add_appointment'])) {
    // Sanitize and validate inputs
    $owner_name = mysqli_real_escape_string($connect, trim($_POST['owner_name']));
    $pet_type = mysqli_real_escape_string($connect, trim($_POST['pet_type']));
    $consultation_location = mysqli_real_escape_string($connect, trim($_POST['consultation_location']));
    $selected_location = mysqli_real_escape_string($connect, trim($_POST['selected_location']));
    $owner_number = mysqli_real_escape_string($connect, trim($_POST['owner_number']));
    $symptoms = mysqli_real_escape_string($connect, trim($_POST['symptoms']));
    $preferred_date = mysqli_real_escape_string($connect, trim($_POST['preferred_date']));

    // Prepare the SQL query
    $insertQuery = "INSERT INTO offline_appointment (owner_name, pet_type, consultation_location, selected_location, owner_number, symptoms, preferred_date) 
                    VALUES ('$owner_name', '$pet_type', '$consultation_location', '$selected_location', '$owner_number', '$symptoms', '$preferred_date')";

    // Run the query
    if (mysqli_query($connect, $insertQuery)) {
        echo "<p class='text-success text-center'>Offline Appointment added successfully!</p>";
    } else {
        // If an error occurs, display the MySQL error
        echo "<p class='text-danger text-center'>Error: " . mysqli_error($connect) . "</p>";
    }
}
?>

</body>
</html>
