<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Services - Petবন্ধু</title>
    <link rel="stylesheet" href="vet_services_style.css">
</head>
<body>
    <?php include '../header/header.php'; ?>
<div class="container">
        <h1 class="text-center bg-warning text-dark py-3">Vet Services</h1>

        <div class="row">
            <!-- Online Consultation -->
            <div class="col-md-4 service-item bg-warning text-dark p-4 mb-4">
                <h3>Online Consultation</h3>
                <p>Get expert advice from vets in the comfort of your home.</p>
                <a href="../vet_services/online_form.php" class="btn btn-outline-dark">Apply Now</a>
            </div>

            <!-- Offline Consultation -->
            <div class="col-md-4 service-item bg-warning text-dark p-4 mb-4">
                <h3>Offline Consultation</h3>
                <p>Visit nearby vet clinics for in-person consultations.</p>
                <a href="../vet_services/offline_form.php" class="btn btn-outline-dark">Apply Now</a></a>
            </div>
        </div>
        <!--doctor catalogue-->
        <div class="row">
        <div class="col-md-4 service-item bg-warning text-dark p-4 mb-4">
            <h3>Doctor's Information</h3>
            <p>Available 24/7 for critical situations.</p>
            <a href="../vet_services/doctors_info.php" class="btn btn-outline-dark">View Information</a>
        </div>
        

        <!-- Emergency Services -->
        <div class="col-md-4 service-item bg-warning text-dark p-4 mb-4">
            <h3>Emergency Services</h3>
            <p>Waiting for your call.</p>
            <a href="../vet_services/emergency_service.php" class="btn btn-outline-dark">Call Now</a>
        </div>
        </div>

        <!-- Go back to Homepage -->
        <div class="text-center mt-4">
            <a href="../index/index.php" class="btn btn-primary">Go back to Homepage</a>
        </div>
    </div>
</body>
</html>
