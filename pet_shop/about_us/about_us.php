<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- External CSS for styling -->
    <link rel="stylesheet" href="about.css">
</head>
<body>


<?php include '../header/header.php'; ?>
    <section id="about-us" class="about-us py-5">
        <div class="container">
            <div class="row">
                <!-- About Us Image -->
                <div class="col-md-6">
                    <div class="about-image">
                    <img src="..\image\petlogo.jpg" alt="Team" class="img-fluid rounded-circle" style="position: absolute; top: 0; left: -180px;">


                    </div>
                </div>

                <!-- About Us Text -->
                
                <div class="col-md-6" style="position: relative; display: flex; justify-content: flex-start; align-items: flex-start;">
                <!--Content Section -->
                <div style="text-align: left; margin-left: -450px;">
                <h2 class="section-title" style="color: black; font-weight: bold; margin-left: 30px">About Us</h2>
                <p class="lead" style="color: white;">
                At <strong style="font-weight: bold; ">Petবন্ধু</strong>, we are dedicated to creating a safe, loving space for pets 
                and pet owners alike.<br> Our goal is to connect pet lovers with the resources they need for adoption, shopping, and<br> healthcare.
                </p>
                </div>
                </div>
                <div class="mission">
                <h4 style="text-align: left; color: black; font-weight: bold; margin-left: 440px;"><i class="fas fa-paw"></i> Our Mission</h4><br>

                <p style="text-align: left; color: white; margin-left: 130px;">We aim to promote responsible pet ownership, ensuring every pet finds a safe, caring home. We provide a platform <br>
                for adoption, pet shopping, and medical services, all in one place, so pet owners can take care of their pets easily.</p>
 
                        
                    </div>
                    <br><br>                        
                    <div class="values">
                        <h4 style="text-align: left; color: black; font-weight: bold; margin-left: 440px;"><i class="fas fa-heart"></i> Our Values</h4>
                        <ul style="text-align: left; color:white; margin-left: 400px; "><br>
                            <li><i class="fas fa-check-circle"></i> Compassion for animals</li>
                            <li><i class="fas fa-check-circle"></i> Transparency in every service</li>
                            <li><i class="fas fa-check-circle"></i> A commitment to quality care</li>
                            <li><i class="fas fa-check-circle"></i> Community engagement</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Animal Sectors -->
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="sector-card">
                        <img src="..\image\doggy.jfif" alt="Dog Adoption" class="sector-image">
                      
                        <h5>Dog Adoption</h5>
                        <p>Find your perfect furry friend. We offer a safe, caring environment for dogs to be adopted into loving homes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sector-card">
                        <img src="..\image\cat.jpg" alt="Cat Care" class="sector-image">
                      
                        <h5>Cat Care</h5>
                        <p>Our platform offers resources for cat care, from adoption to healthcare and all things feline-related.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sector-card">
                        <img src="..\image\fish.webp" alt="Fish & Aquatic Life" class="sector-image">
                        
                        <h5>Fish & Aquatic Life</h5>
                        <p>Explore a world of aquatic life. From aquarium setup to maintenance, we cover it all for fish lovers.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="sector-card">
                        <img src="..\image\parrot.webp" alt="Bird Sanctuary" class="sector-image">
                        <i class="fas fa-bird fa-3x"></i>
                        <h5>Bird Sanctuary</h5>
                        <p>Learn how to care for your pet birds. Whether it's adoption or health tips, we provide resources for all types of birds.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sector-card">
                        <img src="..\image\adop.jpg" alt="Small Pets" class="sector-image">
                       
                        <h5>Small Pets</h5>
                        <p>Guinea pigs, rabbits, and more! We focus on providing care and adoption options for smaller animals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
