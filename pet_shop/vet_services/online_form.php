<?php
// Include the database connection file
include 'online_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Appointment</title>
    <link rel="stylesheet" href="../vet_services/online_form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<ul>
    <h4>
        <li style="text-align: right; list-style: none;">
            <a href="../adoption_sec/adoption.php" style="color: white; text-decoration: none; font-weight: bold;">
                Back to Home
            </a>
        </li>
    </h4>
</ul>

<!-- Appointment Form -->
<div class="container mt-5">
    <h1 class="bg-dark text-white text-center p-3">Vet Appointment Form</h1>
    <form method="POST" action="" class="form mt-4">
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
            <label for="vet-services" class="form-label">What type of veterinary services are you looking for?</label>
            <select id="vet-services" name="service_type" class="form-control" required>
                <option value="General Checkup">General Checkup</option>
                <option value="Vaccination">Vaccination</option>
                <option value="Surgery">Surgery</option>
                <option value="Dental Care">Dental Care</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="pet-condition" class="form-label">Please share information about your pet’s condition:</label>
            <textarea id="pet-condition" name="pet_condition" class="form-control" rows="4" placeholder="Describe your pet's condition here..." required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="first-name" class="form-label">Your name:</label>
            <input type="text" name="first_name" id="first-name" class="form-control mb-2" placeholder="First Name" required>
            <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Your email address:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" required>
        </div>
        <div class="form-group mb-3">
            <label for="appointment-date" class="form-label">Select consultation date:</label>
            <input type="date" name="consultation_date" id="appointment-date" class="form-control" required>
        </div>
        <button type="submit" name="add_appointment" class="btn btn-success mt-3">Submit Form</button>
    </form>
</div>

<!-- PHP Form Submission Logic -->
<?php
if (isset($_POST['add_appointment'])) {
    // Sanitize and validate inputs
    $pet_type = trim($_POST['pet_type']);
    $service_type = trim($_POST['service_type']);
    $pet_condition = trim($_POST['pet_condition']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $consultation_date = trim($_POST['consultation_date']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "<p class='text-danger text-center'>Invalid email format!</p>";
    } else {
        // Insert data into the database
        $insertQuery = "INSERT INTO online_appointment (pet_type, service_type, pet_condition, first_name, last_name, email, consultation_date) 
                        VALUES ('$pet_type', '$service_type', '$pet_condition', '$first_name', '$last_name', '$email', '$consultation_date')";

        if (mysqli_query($connect, $insertQuery)) {
            echo "<p class='text-success text-center'>Appointment added successfully!</p>";
        } else {
            echo "<p class='text-danger text-center'>Error: " . mysqli_error($connect) . "</p>";
        }
    }
}
?>
</body>
</html>
