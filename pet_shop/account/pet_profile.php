<?php
// Database connection
$host = 'localhost';
$dbname = 'petbondhu';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Add new pet
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_pet'])) {
    $user_id = 1; // Replace with the actual user ID from the session
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $medical_history = $_POST['medical_history'];
    $pet_picture = null;

    if (isset($_FILES['pet_picture']) && $_FILES['pet_picture']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/uploads/';
        $fileName = uniqid() . '_' . basename($_FILES['pet_picture']['name']);
        $uploadFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['pet_picture']['tmp_name'], $uploadFile)) {
            $pet_picture = 'uploads/' . $fileName;
        } else {
            echo "<script>alert('Failed to upload pet picture.');</script>";
        }
    }

    $stmt = $pdo->prepare("INSERT INTO pets (user_id, pet_name, pet_type, breed, age, medical_history, pet_picture, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$user_id, $pet_name, $pet_type, $breed, $age, $medical_history, $pet_picture]);
    echo "<script>alert('Pet profile added successfully!'); window.location.href='add_pet.php';</script>";
}

// Fetch pets
$stmt = $pdo->prepare("SELECT * FROM pets WHERE user_id = ?");
$stmt->execute([1]); // Replace with actual session user ID
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile Management</title>
    <link rel="stylesheet" href="pet_profile_style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Your Pets</h1>
        
        <!-- Add Pet Section -->
        <div class="form-section">
            <h2>Add a Pet</h2>
            <form method="POST" enctype="multipart/form-data" class="styled-form">
                <label>Pet Name</label>
                <input type="text" name="pet_name" required>

                <label>Pet Type</label>
                <input type="text" name="pet_type" required>

                <label>Breed</label>
                <input type="text" name="breed" required>

                <label>Age</label>
                <input type="number" name="age" required>

                <label>Medical History</label>
                <textarea name="medical_history" rows="4" required></textarea>

                <label>Pet Picture</label>
                <input type="file" name="pet_picture" accept="image/*">

                <button type="submit" name="add_pet">Add Pet</button>
            </form>
        </div>

        <!-- Pet List Section -->
        <div class="pet-list">
            <h2>Your Pets</h2>
            <?php foreach ($pets as $pet): ?>
                <div class="pet-card">
                    <h3><?php echo htmlspecialchars($pet['pet_name']); ?></h3>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($pet['pet_type']); ?></p>
                    <p><strong>Breed:</strong> <?php echo htmlspecialchars($pet['breed']); ?></p>
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($pet['age']); ?></p>
                    <p><strong>Medical History:</strong> <?php echo htmlspecialchars($pet['medical_history']); ?></p>
                    <?php if ($pet['pet_picture']): ?>
                        <img src="../images/<?php echo htmlspecialchars($pet['pet_picture']); ?>" alt="<?php echo htmlspecialchars($pet['pet_name']); ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
