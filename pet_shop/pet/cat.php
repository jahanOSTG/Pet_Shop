<?php
// Include the database connection
include 'cat_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Adoption Catalog</title>
    <link rel="stylesheet" href="../pet/cat_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<ul>
    <h4>
        <li style="text-align: right; list-style: none;">
            <a href="../adoption_sec/adoption.php" style="color: black; text-decoration: none; font-weight: bold;">
                Back to Adoption
            </a>
        </li>
    </h4>
</ul>

    
    <!-- Main Wrapper -->
    <div class="container mt-4">
        <div class="row">
            <!-- Filter Section -->
            <div class="col-md-6 mb-4">
                <h2 class="text-center bg-warning text-white mb-4">Filter Cats by Breed</h2>
                <form method="GET" action="" class="filter-form">
                    <div class="form-group mb-3">
                        <label for="filter_cat_breed" class="form-label">Select Breed</label>
                        <select name="breed_name" id="filter_cat_breed" class="form-control">
                            <option value="">All Breeds</option>
                            <option value="Siamese">Siamese</option>
                            <option value="Maine Coon">Maine Coon</option>
                            <option value="Persian">Persian</option>
                            <option value="Bengal">Bengal</option>
                            <option value="Sphynx">Sphynx</option>
                            <option value="Russian Blue">Russian Blue</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Apply Filter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Cat Profiles Section -->
    <div class="container mt-5">
        <h1 class="bg-warning text-white text-center p-3">Cat Profiles for Adoption</h1>
        <div class="row">
            <?php
            // Build query
            $query = "SELECT * FROM cats";
            $conditions = [];

            if (!empty($_GET['breed_name'])) {
                $breedFilter = mysqli_real_escape_string($connect, $_GET['breed_name']);
                $conditions[] = "breed_name = '$breedFilter'";
            }

            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }

            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($cat = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card mb-4 shadow-sm'>
                            <img src='{$cat['image']}' class='card-img-top' alt='{$cat['name']}' style='height:250px; object-fit:cover;'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>{$cat['name']}</h5>
                                <p class='card-text'>
                                    <strong>Breed:</strong> {$cat['breed_name']}<br>
                                    <strong>Health Status:</strong> {$cat['health_status']}
                                </p>
                                <a href='#' class='btn btn-success mt-2'>Adopt Now</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='text-center'>No cat profiles found matching the selected filter criteria.</div>";
            }
            ?>
        </div>
    </div>
    <!-- footer.php -->
<footer class="bg-dark text-white pt-4 pb-2">
    <div class="container text-center">
        <p>&copy; <?php echo date("Y"); ?> Pet Bondhu. All rights reserved.</p>
        <p>
            <a href="../about.php" class="text-white">About Us</a> | 
            <a href="../contact.php" class="text-white">Contact Us</a>
        </p>
    </div>
</footer>

</body>
</html>
