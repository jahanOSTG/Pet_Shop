<?php
// Include the database connection file
include 'bird_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bird Adoption</title>
    <link rel="stylesheet" href="../pet/bird_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
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
                <h2 class="text-center bg-warning text-dark mb-4">Filter Birds by Breed</h2>
                <form method="GET" action="" class="filter-form">
                    <div class="form-group mb-3">
                        <label for="filter_breed" class="form-label text-white">Select Breed</label>
                        <select name="breed_name" id="filter_breed" class="form-control custom-select">
                            <option value="">All Breeds</option>
                            <option value="Parakeet">Parakeet</option>
                            <option value="Canary">Canary</option>
                            <option value="Cockatiel">Cockatiel</option>
                            <option value="Macaw">Macaw</option>
                            <option value="Dove">Dove</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Apply Filter</button>
                </form>
            </div>

            

    <!-- Bird Profiles -->
    <div class="container mt-5">
        <h1 class="bg-secondary text-white text-center p-3">Bird Adoption</h1>
        <div class="row">
            <?php
            // Build SQL query for filtering birds by breed
            $query = "SELECT * FROM birds";
            if (isset($_GET['breed_name']) && !empty($_GET['breed_name'])) {
                $breedFilter = mysqli_real_escape_string($connect, $_GET['breed_name']);
                $query .= " WHERE breed_name = '$breedFilter'";
            }

            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($bird = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card mb-4'>
                            <img src='{$bird['image']}' class='card-img-top' alt='{$bird['name']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$bird['name']}</h5>
                                <p class='card-text'>
                                    <strong>Breed:</strong> {$bird['breed_name']}<br>
                                    <strong>Health Status:</strong> {$bird['health_status']}
                                </p>
                                <a href='#' class='btn btn-success'>Adopt Now</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='text-center'>No birds found matching the selected breed.</p>";
            }
            ?>
        </div>
    </div>

    
</body>
</html>
