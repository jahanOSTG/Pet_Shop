<?php
// Include the database connection file
include '../pet/cat_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Cat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
    
  
    body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right,rgb(3, 0, 11),rgb(11, 24, 166));
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #f8f8f8;
        }

        .form-label {
            color: #ffb300;
            font-size: 1.2rem;
        }

        .form-control {
            border: 2px solid #00796b;
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
            color: #333;
        }

        .form-control:focus {
            border-color: #004d40;
            box-shadow: 0 0 10px rgba(0, 77, 64, 0.8);
        }

        .btn-custom {
            background: #ff5722;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: #e64a19;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(230, 74, 25, 0.6);
        }

        p {
            font-size: 1rem;
            margin-top: 15px;
        }

        .text-success {
            color: #4caf50 !important;
            font-weight: bold;
        }

        .text-danger {
            color: #f44336 !important;
            font-weight: bold;
        }

        /* Decorative Background for Form */
        .container:before {
            content: '';
            position: absolute;
            top: -10%;
            left: 0;
            right: 0;
            height: 20%;
            background: radial-gradient(circle, rgba(255,255,255,0.1), transparent);
            z-index: -1;
        }

        .container:after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: 0;
            right: 0;
            height: 20%;
            background: radial-gradient(circle, rgba(255,255,255,0.1), transparent);
            z-index: -1;
        }
</style>

</head>

<body>
    <div class="container">
        <h1>Add a New Cat</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="add_name" class="form-label">Cat Name</label>
                <input type="text" name="name" id="add_name" class="form-control" placeholder="Enter cat's name" required>
            </div>
            <div class="form-group">
                <label for="add_breed" class="form-label">Breed Name</label>
                <input type="text" name="breed_name" id="add_breed" class="form-control" placeholder="Enter cat's breed" required>
            </div>
            <div class="form-group">
                <label for="add_health_status" class="form-label">Health Status</label>
                <input type="text" name="health_status" id="add_health_status" class="form-control" placeholder="Enter cat's health status" required>
            </div>
            <div class="form-group">
                <label for="add_image_url" class="form-label">Image URL</label>
                <input type="text" name="image" id="add_image_url" class="form-control" placeholder="Paste image URL" required>
            </div>
            <button type="submit" name="add_cat" class="btn btn-custom">Add Cat</button>
        </form>

        <?php
        // Handle adding new cat to database
        if (isset($_POST['add_cat'])) {
            $name = mysqli_real_escape_string($connect, $_POST['name']);
            $breed_name = mysqli_real_escape_string($connect, $_POST['breed_name']);
            $health_status = mysqli_real_escape_string($connect, $_POST['health_status']);
            $image = mysqli_real_escape_string($connect, $_POST['image']);

            $checkQuery = "SELECT * FROM cats WHERE name = '$name' AND breed_name = '$breed_name'";
            $checkResult = mysqli_query($connect, $checkQuery);

            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                echo "<p class='text-danger'>Error: Cat already exists in the database!</p>";
            } else {
                $insertQuery = "INSERT INTO cats (name, breed_name, health_status, image) VALUES ('$name', '$breed_name', '$health_status', '$image')";
                if (mysqli_query($connect, $insertQuery)) {
                    echo "<p class='text-success'>Cat added successfully!</p>";
                } else {
                    echo "<p class='text-danger'>Error: " . mysqli_error($connect) . "</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
