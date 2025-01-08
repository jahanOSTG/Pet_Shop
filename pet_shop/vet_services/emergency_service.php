<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Emergency Services | Pet Shop</title>
  <style>
    /* General Page Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body and Page Background */
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #ffe6e6, #ffcccc);
      color: #333;
      line-height: 1.6;
    }

    /* Header Section */
    header {
      background: linear-gradient(to right, #ff4d5e, #ff7675);
      color: #fff;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    header h1 {
      font-size: 2.5em;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    }

    /* Hero Section */
    .hero-section {
      text-align: center;
      padding: 30px 20px;
      background: url('https://source.unsplash.com/1600x900/?pets,emergency') no-repeat center center/cover;
      color: white;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.7);
      font-size: 1.8em;
      font-weight: bold;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
    }

    /* Content Section */
    .content-section {
      padding: 40px 20px;
      max-width: 1200px;
      margin: 20px auto;
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }

    .info-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
      padding: 20px;
      flex: 1 1 calc(50% - 20px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-align: center;
      overflow: hidden;
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
    }

    .info-card h3 {
      margin-bottom: 10px;
      font-size: 1.6em;
      color: #e74c3c;
    }

    .info-card p {
      font-size: 1em;
      color: #555;
      line-height: 1.6;
      margin: 5px 0;
    }

    /* Contact Info */
    .contact-info {
      margin-top: 10px;
      font-size: 0.9em;
      color: #555;
    }

    .contact-info a {
      color: #e74c3c;
      text-decoration: none;
    }

    /* Call To Action */
    .cta-section {
      background: #ff5e5e;
      padding: 30px 20px;
      color: #fff;
      text-align: center;
      border-radius: 10px;
      margin: 40px auto;
      max-width: 1200px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
      transition: background-color 0.3s ease;
    }

    .cta-section h2 {
      font-size: 2em;
      margin: 10px 0;
    }

    .cta-button {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #fff;
      background: #333;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 1.1em;
      transition: background 0.3s ease;
    }

    .cta-button:hover {
      background: #555;
    }

    /* Footer Section */
    footer {
      background: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      font-size: 0.9em;
      margin-top: 30px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .content-section {
        flex-direction: column;
      }

      .info-card {
        width: 100%;
      }

      .hero-section {
        height: 300px;
        font-size: 1.5em;
      }
    }

    @media (max-width: 480px) {
      .hero-section {
        font-size: 1.2em;
      }

      header h1 {
        font-size: 2em;
      }
    }
  </style>
</head>

<body>
  <!-- Header Section -->
  <header>
    <h1>Pet Shop Emergency Services</h1>
  </header>

  <!-- Hero Section -->
  <div class="hero-section">
    Rapid Response for Your Pet's Needs
  </div>

  <!-- Information Section -->
  <div class="content-section">
    <div class="info-card">
      <h3>24/7 Emergency Vet Services</h3>
      <p>Available round the clock to ensure your furry friends are cared for during emergencies. Our experienced vets are just a call away.</p>
    </div>

    <div class="info-card">
      <h3>Specialized Pet Ambulance</h3>
      <p>Fast and efficient transport with a fully equipped pet ambulance. We make sure your pet reaches treatment safely and on time.</p>
    </div>

    <div class="info-card">
      <h3>After Hours Consultations</h3>
      <p>Our after-hours team is ready to assist with any unexpected illness or injuries. Help is just a call away.</p>
    </div>

    <div class="info-card">
      <h3>Experienced Staff & Support</h3>
      <p>Our professional veterinary staff are trained for all types of emergencies, ensuring peace of mind for you and your pets.</p>
    </div>
  </div>


  <!-- Call To Action Section -->
  <div class="cta-section">
    <h2>Need Emergency Help for Your Pet?</h2>
    <a href="tel:+8801234567890" class="cta-button">Call Us Now</a>
    <div class="contact-info">
      Or Email: <a href="mailto:contact@example.com">contact@example.com</a>
    </div>
  </div>

  <!-- Footer Section -->
  <footer>
    &copy; <?php echo date('Y'); ?> Pet Shop Emergency Services | All Rights Reserved
  </footer>
</body>

</html>
