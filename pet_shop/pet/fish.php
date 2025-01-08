<?php
// Include the database connection
include 'fish_database.php'; // Update with the correct database connection file
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Adoption Catalog</title>
    <link rel="stylesheet" href="../pet/fish_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<ul>
    <h4>
        <li style="text-align: right; list-style: none;">
            <a href="../adoption_sec/adoption.php" style="color: yellow; text-decoration: none; font-weight: bold;">
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
            <h2 class="text-center bg-warning text-black mb-4">Filter Fish by Species</h2>
            <form method="GET" action="" class="filter-form">
                <div class="form-group mb-3">
                    <label class="text-center bg-warning mb-4" for="filter_fish_species" class="form-label">Select Species</label>
                    <select name="species_name" id="filter_fish_species" class="form-control">
                     <option value="">All Species</option>
                        <option value="Amphiprioninae">Clownfish</option>
                        <option value="Carcharodon carcharias">Great White Shark</option>
                        <option value="Paracanthurus hepatus">Blue Tang</option>
                        <option value="Betta splendens">Betta Fish</option>
                        <option value="Carassius auratus">Goldfish</option>
                        <option value="Lophiiformes">Anglerfish</option>
                        <option value="Poecilia reticulata">Guppy</option>
                        <option value="Synchiropus splendidus">Mandarinfish</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info mt-3">Apply Filter</button>
            </form>
        </div>
    </div>
</div>

<!-- Fish Profiles Section -->
<div class="container mt-5">
    <h1 class="bg-warning text-black text-center p-3">Fish Profiles for Adoption</h1>
    <div class="row">
        <?php
        // Build query
        $query = "SELECT * FROM fishs";
        $conditions = [];

        if (!empty($_GET['species_name'])) {
            $speciesFilter = mysqli_real_escape_string($connect, $_GET['species_name']);
            $conditions[] = "species_name = '$speciesFilter'";
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($fish = mysqli_fetch_assoc($result)) {
                echo "
                <div class='col-md-4'>
                    <div class='card mb-4 shadow-sm'>
                        <img src='{$fish['image']}' class='card-img-top' alt='{$fish['name']}' style='height:250px; object-fit:cover;'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>{$fish['name']}</h5>
                            <p class='card-text'>
                                <strong>Species:</strong> {$fish['species_name']}<br>
                                <strong>Diet:</strong> {$fish['diet']}<br>
                                <strong>Size:</strong> {$fish['size']}
                            </p>
                            <a href='#' class='btn btn-success mt-2'>Adopt Now</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<div class='text-center'>No fish profiles found matching the selected filter criteria.</div>";
        }
        ?>
    </div>
</div>

<!-- Footer -->
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
