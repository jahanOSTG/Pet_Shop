<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Global Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #1e1e2f;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            text-align: center;
        }

        /* Header Styling */
        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            color: #00d1b2;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .dashboard-header p {
            font-size: 1.2rem;
            color: #aaa;
        }

        /* Cards Section */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: linear-gradient(145deg,rgb(33, 123, 168), #1a1a28);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .card a {
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            color: #00d1b2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .card a:hover {
            color: #fff;
        }

        .card-icon {
            font-size: 3rem;
            color: #f39c12;
        }

        /* Footer */
        .dashboard-footer {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #aaa;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 2rem;
            }

            .card a {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p>Manage all your platform features from one place</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <a href="manage_users.php">
                    <div class="card-icon">👥</div>
                    Manage Users
                </a>
            </div>
            <div class="card">
                <a href="manage_pets.php">
                    <div class="card-icon">🐾</div>
                    Manage Pets
                </a>
            </div>
            <div class="card">
    <a href="../shop/shopedit.php">
        <div class="card-icon">🛒</div>
        <p>Manage Accessories</p>
    </a>
</div>

            <div class="card">
                <a href="../account/admin_setting.php">
                    <div class="card-icon">⚙️</div>
                    Admin Settings
                </a>
            </div>
            <div class="card">
                <a href="../account/analytics.php">
                    <div class="card-icon">📈</div>
                    Analytics
                </a>
            </div>
            <div class="card">
    <a href="../admin/online_list.php">
        <div class="card-icon">📅</div> <!-- Calendar icon for appointments -->
        Online Appointments
    </a>
</div>
<div class="card">
    <a href="../admin/offline_list.php">
        <div class="card-icon">📍</div> <!-- Pin icon for offline appointments -->
        Offline Appointments
    </a>
</div>

            <div class="card">
                <a href="../index/index.php">
                    <div class="card-icon" style="color: #e74c3c;">🚪</div>
                    Logout
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="dashboard-footer">
            © 2024 Admin Dashboard | Crafted with ❤️ by PetBondhu
        </div>
    </div>
</body>
</html>
