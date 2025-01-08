<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, rgb(7, 7, 8), rgb(4, 95, 251));
            color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        }

        .card img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.2);
        }

        .card h3 {
            font-size: 1.6rem;
            margin: 5px 0;
            color: #ffffff;
        }

        .card p {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #e0e0e0;
        }

        .card a {
            text-decoration: none;
            color: white;
            background: #1e88e5;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .card a:hover {
            background: #1565c0;
            transform: scale(1.1);
        }

        /* Color coding for specific cards */
        .cat { border-left: 5px solid #FF5733; }
        .dog { border-left: 5px solid #FFD700; }
        .fish { border-left: 5px solid #00BFFF; }
        .bird { border-left: 5px solid #32CD32; }
        .catlist { border-left: 5px solid #FFA07A; }
        .doglist { border-left: 5px solid #FFDAB9; }
        .fishlist { border-left: 5px solid #87CEEB; }
        .birdlist { border-left: 5px solid #8FBC8F; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Add New Dog -->
        <div class="card dog">
            <img src="https://img.icons8.com/color/100/000000/dog.png" alt="Add Dog">
            <h3>Add New Dog</h3>
            <p>Manage and add new dogs to your database.</p>
            <a href="../pet/add_dog.php">Add Dog</a>
        </div>

        <!-- Add New Cat -->
        <div class="card cat">
            <img src="https://img.icons8.com/color/100/000000/cat.png" alt="Add Cat">
            <h3>Add New Cat</h3>
            <p>Manage and add new cats to your database.</p>
            <a href="../pet/add_cat.php">Add Cat</a>
        </div>

        <!-- Add New Fish -->
        <div class="card fish">
            <img src="https://img.icons8.com/color/100/000000/fish.png" alt="Add Fish">
            <h3>Add New Fish</h3>
            <p>Manage and add new fish to your database.</p>
            <a href="../pet/add_fish.php">Add Fish</a>
        </div>

        <!-- Add New Bird -->
        <div class="card bird">
            <img src="https://img.icons8.com/color/100/000000/bird.png" alt="Add Bird">
            <h3>Add New Bird</h3>
            <p>Manage and add new birds to your database.</p>
            <a href="../pet/add_bird.php">Add Bird</a>
        </div>

        <!-- Dog List -->
        <div class="card doglist">
            <img src="https://img.icons8.com/color/100/000000/dog-footprint.png" alt="Dog List">
            <h3>Dog List</h3>
            <p>View all registered dogs in the system.</p>
            <a href="../pet/dog.php">View Dogs</a>
        </div>

        <!-- Cat List -->
        <div class="card catlist">
            <img src="https://img.icons8.com/color/100/000000/cat-footprint.png" alt="Cat List">
            <h3>Cat List</h3>
            <p>View all registered cats in the system.</p>
            <a href="../pet/cat.php">View Cats</a>
        </div>

        <!-- Fish List -->
        <div class="card fishlist">
            <img src="https://img.icons8.com/color/100/000000/aquarium.png" alt="Fish List">
            <h3>Fish List</h3>
            <p>View all registered fish in the system.</p>
            <a href="../pet/fish.php">View Fish</a>
        </div>

        <!-- Bird List -->
        <div class="card birdlist">
            <img src="https://img.icons8.com/color/100/000000/bird.png" alt="Bird List">
            <h3>Bird List</h3>
            <p>View all registered birds in the system.</p>
            <a href="../pet/bird.php">View Birds</a>
        </div>
    </div>
</body>
</html>
