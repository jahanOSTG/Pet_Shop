<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Bird</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #5db1ff,rgb(3, 4, 6));
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
            position: relative;
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffcc00;
            background: linear-gradient(to right, #ffcc00, #ff7e00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-label {
            color: #ffcc00;
            font-size: 1.2rem;
        }

        .form-control {
            border: 2px solid #ffaa00;
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
            color: #333;
        }

        .form-control:focus {
            border-color: #ff7e00;
            box-shadow: 0 0 10px rgba(255, 126, 0, 0.8);
        }

        .btn-warning {
            background: linear-gradient(to right, #ffcc00, #ffaa00);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            background: linear-gradient(to right, #ffaa00, #ff7e00);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 126, 0, 0.6);
        }

        .text-center p {
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Add a New Bird</h2>
        <form method="POST" action="">
            <div class="form-group mb-3">
                <label for="add_name" class="form-label">Bird Name</label>
                <input type="text" name="name" id="add_name" class="form-control" placeholder="Enter bird's name" required>
            </div>
            <div class="form-group mb-3">
                <label for="add_breed" class="form-label">Breed</label>
                <input type="text" name="breed_name" id="add_breed" class="form-control" placeholder="Enter bird's breed" required>
            </div>
            <div class="form-group mb-3">
                <label for="add_health_status" class="form-label">Health Status</label>
                <input type="text" name="health_status" id="add_health_status" class="form-control" placeholder="Enter bird's health status" required>
            </div>
            <div class="form-group mb-3">
                <label for="add_image_url" class="form-label">Image URL</label>
                <input type="text" name="image" id="add_image_url" class="form-control" placeholder="Paste image URL" required>
            </div>
            <button type="submit" name="add_bird" class="btn btn-warning mt-3">Add Bird</button>
        </form>

        <?php
        // Handle adding a new bird to the database
        if (isset($_POST['add_bird'])) {
            $name = isset($_POST['name']) ? mysqli_real_escape_string($connect, $_POST['name']) : '';
            $breed_name = isset($_POST['breed_name']) ? mysqli_real_escape_string($connect, $_POST['breed_name']) : '';
            $health_status = isset($_POST['health_status']) ? mysqli_real_escape_string($connect, $_POST['health_status']) : '';
            $image = isset($_POST['image']) ? mysqli_real_escape_string($connect, $_POST['image']) : '';

            if ($name && $breed_name && $health_status && $image) {
                $checkQuery = "SELECT * FROM birds WHERE name = '$name' AND breed_name = '$breed_name'";
                $checkResult = mysqli_query($connect, $checkQuery);

                if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                    echo "<p class='text-danger'>Error: Bird already exists in the database!</p>";
                } else {
                    $insertQuery = "INSERT INTO birds (name, breed_name, health_status, image) 
                                    VALUES ('$name', '$breed_name', '$health_status', '$image')";
                    if (mysqli_query($connect, $insertQuery)) {
                        echo "<p class='text-success'>Bird added successfully!</p>";
                    } else {
                        echo "<p class='text-danger'>Error: " . mysqli_error($connect) . "</p>";
                    }
                }
            } else {
                echo "<p class='text-danger'>Error: All fields are required!</p>";
            }
        }
        ?>
    </div>
</body>
</html>
