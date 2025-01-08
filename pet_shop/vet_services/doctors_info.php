<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Doctors Information</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #ffecd2, #fcb69f);
            color: #333;
        }

        h1 {
            text-align: center;
            color: #fff;
            padding: 20px;
            background-color: #4CAF50;
            margin: 0;
            font-size: 2em;
        }

        /* Doctors Section */
        .doctor-container {
            display: flex;
            flex-direction: column; /* Stack doctor cards vertically */
            align-items: center; /* Center the entire container */
            margin: 20px auto;
        }

        .doctor-card {
            display: flex; /* Display doctor info and picture side by side */
            background-color: #fff;
            width: 80%;
            max-width: 600px;
            margin: 15px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            position: relative;
        }

        .doctor-card:hover {
            transform: translateY(-5px); /* Slight hover animation */
        }

        .doctor-image {
            width: 40%; /* Adjust size of the image */
            height: 250px;
        }

        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .doctor-details {
            padding: 20px;
            text-align: left;
            width: 60%; /* Adjust width of the details */
        }

        .doctor-details h2 {
            font-size: 1.8em;
            margin: 10px 0;
        }

        .doctor-details p {
            margin: 8px 0;
            font-size: 1.1em;
            color: #555;
        }

        .doctor-contact button {
            display: inline-block;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .doctor-contact button:hover {
            background-color: #45a049;
        }

        .thank-you-message {
            display: none; /* Initially hidden */
            margin-top: 10px;
            font-size: 1em;
            color: #4CAF50;
            font-weight: bold;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9em;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Meet Our Veterinary Doctors</h1>
    <ul>
        <h4>
            <li style="text-align: right; list-style: none;">
                <a href="../vet_services/vet_services.php" style="color: black; text-decoration: none; font-weight: bold;">
                    Back to Vet Services
                </a>
            </li>
        </h4>
    </ul>

    <div class="doctor-container">
        <?php 
            $doctors = [
                [
                    'name' => 'Dr. Kamal Roy',
                    'specialty' => 'Small Animals Specialist',
                    'phone' => '+880 1712 345678',
                    'email' => 'sarah.johnson@example.com',
                    'image' => '../image/doctor1.jpg'
                ],
                [
                    'name' => 'Dr. Shojib Hasan',
                    'specialty' => 'Exotic Animals Expert',
                    'phone' => '+880 1912 987654',
                    'email' => 'alex.smith@example.com',
                    'image' => '../image/doctor2.png'
                ],
                [
                    'name' => 'Dr. Maria Khan',
                    'specialty' => 'Veterinary Surgeon',
                    'phone' => '+880 1812 678910',
                    'email' => 'maria.khan@example.com',
                    'image' => '../image/docror3.jpg'
                ],
                [
                    'name' => 'Dr. Hasan Ullah',
                    'specialty' => 'Large Animals Specialist',
                    'phone' => '+880 1550 432100',
                    'email' => 'john.doe@example.com',
                    'image' => '../image/doctor4.jfif'
                ],
                [
                    'name' => 'Dr. Shamim Mia',
                    'specialty' => 'Wildlife Veterinary Expert',
                    'phone' => '+880 1666 789123',
                    'email' => 'emily.brown@example.com',
                    'image' => '../image/doctor5.jfif'
                ],
                [
                    'name' => 'Dr. Dipok Khanna',
                    'specialty' => 'Veterinary Nutritionist',
                    'phone' => '+880 1999 231567',
                    'email' => 'thomas.williams@example.com',
                    'image' => '../image/doctor6.jpg'
                ],
                [
                    'name' => 'Dr. Olivia Rezwan',
                    'specialty' => 'Avian Veterinary Specialist',
                    'phone' => '+880 1444 654321',
                    'email' => 'olivia.adams@example.com',
                    'image' => '../image/doctor7.webp'
                ],
                // Add more doctors as needed
            ];
            foreach ($doctors as $doctor): ?>
            <div class="doctor-card">
                <div class="doctor-image">
                    <img src="<?php echo $doctor['image']; ?>" alt="Doctor Image">
                </div>
                <div class="doctor-details">
                    <h2><?php echo htmlspecialchars($doctor['name']); ?></h2>
                    <p><strong>Specialty:</strong> <?php echo htmlspecialchars($doctor['specialty']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($doctor['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($doctor['phone']); ?></p>
                    <div class="doctor-contact">
                        <button onclick="showThankYouMessage(this)">Contact</button>
                    </div>
                    <div class="thank-you-message">
                        Thank you! Please wait for the doctor's response. An email will be sent to your email address.
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Veterinary Services | All Rights Reserved</p>
    </footer>

    <script>
        function showThankYouMessage(button) {
            const thankYouMessage = button.parentElement.nextElementSibling;
            thankYouMessage.style.display = 'block'; // Show the thank-you message
        }
    </script>
</body>
</html>
