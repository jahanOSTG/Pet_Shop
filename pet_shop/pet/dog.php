<?php
// Include the database connection file
include 'dog_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Adoption</title>
    <link rel="stylesheet" href="../pet/dog_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-image: url('../image/doggy1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: right center; /* Move the image to the right */
    color: #FFF;
}


.container {
    max-width: 800px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: rgba(0, 0, 0, 0.7);
}

.input-field {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 10px;
    font-size: 14px;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

.input-field:focus {
    background-color: #ffffff;
    border-color: #6f4f1e;
}

.btn-custom {
    background-color: #ff7f50;
    color: #fff;
    border-radius: 50px;
    padding: 12px 24px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-custom:hover {
    background-color: #ff6347;
    transform: scale(1.05);
}

.btn-custom:focus {
    outline: none;
    box-shadow: 0 0 5px #ff7f50;
}

.card {
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden; /* Ensure content stays within the card */
}

.card img {
    width: 100%;
    height: 200px; /* Fixed height for all images */
    object-fit: cover; /* Maintain aspect ratio and fill the container */
}

.card-body {
    background-color: #fff;
    padding: 10px;
}

.card-title {
    color: #6f4f1e;
}

.card-text {
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}
</style>
</head>

<body >
<ul>
    <h4>
        <li style="text-align: right; list-style: none;">
            <a href="../adoption_sec/adoption.php" style="color: white; text-decoration: none; font-weight: bold;">
                Back to Adoption
            </a>
        </li>
    </h4>
</ul>
<div class="container mt-4">
        <div class="row">
            <!-- Filter Form -->
            <div class="col-md-6 mb-4">
                <h2 class="text-center bg-warning text-dark mb-4">Filter Dogs</h2>
                <form method="GET" action="" class="filter-form">
                    <div class="form-group mb-3">
                        <label for="filter_age" class="form-label text-white">Filter by Age</label>
                        <select name="age" id="filter_age" class="form-control custom-select">
                            <option value="">All Ages</option>
                            <option value="1">1 year</option>
                            <option value="2">2 years</option>
                            <option value="3">3 years</option>
                            <option value="4">4 years</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="filter_breed" class="form-label text-white">Filter by Breed</label>
                        <select name="breed" id="filter_breed" class="form-control custom-select">
                            <option value="">All Breeds</option>
                            <option value="Golden Retriever">Golden Retriever</option>
                            <option value="Labrador">Labrador</option>
                            <option value="Beagle">Beagle</option>
                            <option value="Bulldog">Bulldog</option>
                            <option value="Poodle">Poodle</option>
                            <option value="Dachshund">Dachshund</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-custom mt-3">Apply Filters</button>
                </form>
            </div>

    

    <!-- Dog Profiles -->
    <div class="container mt-5">
        <h1 class="bg-dark text-white text-center p-3">Dog Adoption</h1>
        <div class="row">
            <?php
            // Build SQL query for filtering dogs
            $query = "SELECT * FROM dogs";
            $conditions = [];

            if (!empty($_GET['age'])) {
                $ageFilter = intval($_GET['age']);
                $conditions[] = "age = $ageFilter";
            }

            if (!empty($_GET['breed'])) {
                $breedFilter = mysqli_real_escape_string($connect, $_GET['breed']);
                $conditions[] = "breed = '$breedFilter'";
            }

            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }

            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($dog = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card mb-4'>
                            <img src='{$dog['image_url']}' class='card-img-top' alt='{$dog['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$dog['name']}</h5>
                                <p class='card-text'>
                                    <strong>Breed:</strong> {$dog['breed']}<br>
                                    <strong>Age:</strong> {$dog['age']} years<br>
                                    <strong>Health Status:</strong> {$dog['health_status']}
                                </p>
                                <a href='#' class='btn btn-success'>Adopt Now</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='text-center'>No dogs found matching the selected filters.</p>";
            }
            ?>
        </div>
    </div>
   

           

 

    
</body>
</html>