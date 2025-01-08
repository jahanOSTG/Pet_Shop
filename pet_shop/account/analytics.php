<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #232526, #414345);
            color: #e0e0e0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 10px;
            background:rgb(11, 114, 165);
            border-radius: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: rgb(98, 244, 254);
            text-shadow: 0 5px 15px rgba(243, 156, 18, 0.5);
        }
        .cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .card {
            flex: 1;
            margin: 0 10px;
            padding: 5px;
            background: linear-gradient(135deg,rgb(22, 25, 25),rgb(99, 210, 240));
            color: #fff;
            border-radius: 40px;
            text-align: center;
            box-shadow: 0px 10px 20px rgba(231, 76, 60, 0.5);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px) scale(1.05);
        }
        .card h2 {
            font-size: 2rem;
            margin: 5px 0;
            color: #ecf0f1;
        }
        .card p {
            font-size: 1rem;
        }
        .charts-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .chart-container {
            flex: 1;
            margin: 0 10px;
            padding: 20px;
            background: linear-gradient(135deg,rgb(22, 25, 25),rgb(5, 111, 141));
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .chart-container h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color:rgb(54, 202, 172);
        }
        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Analytics Dashboard</h1>

        <div class="cards">
            <div class="card">
                <h2>120</h2>
                <p>Total Accessories</p>
            </div>
            <div class="card">
                <h2>85</h2>
                <p>Total Pets</p>
            </div>
        </div>

        <div class="charts-row">
            <div class="chart-container">
                <h2>Pets by Category</h2>
                <canvas id="petsChart" style="height: 200px; width: 200px;"></canvas>
            </div>

            <div class="chart-container">
                <h2>Accessories by Category</h2>
                <canvas id="accessoriesChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Pets Chart
        const petsCtx = document.getElementById('petsChart').getContext('2d');
        new Chart(petsCtx, {
            type: 'pie',
            data: {
                labels: ['Dogs', 'Cats', 'Birds', 'Fish'],
                datasets: [{
                    label: 'Number of Pets',
                    data: [30, 25, 15, 15],
                    backgroundColor: ['#f1c40f', '#2ecc71', '#3498db', '#9b59b6'],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#ecf0f1',
                            font: { size: 14 },
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribution of Pets',
                        color: '#16a085',
                        font: { size: 18 },
                    }
                }
            }
        });

        // Accessories Chart
        const accessoriesCtx = document.getElementById('accessoriesChart').getContext('2d');
        new Chart(accessoriesCtx, {
            type: 'bar',
            data: {
                labels: ['Dogs', 'Cats', 'Birds', 'Fish'],
                datasets: [{
                    label: 'Accessories Sold',
                    data: [25, 30, 20, 10],
                    backgroundColor: ['#e74c3c', '#8e44ad', '#3498db', '#f1c40f'],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Accessories by Category',
                        color: '#16a085',
                        font: { size: 18 },
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#ecf0f1',
                            font: { size: 14 },
                        }
                    },
                    x: {
                        ticks: {
                            color: '#ecf0f1',
                            font: { size: 14 },
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
