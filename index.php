<?php
include 'server.php';
session_start();

// Retrieve session variables
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Unknown User'; 
// Query to fetch the recommended job for the logged-in user
$sql = "SELECT job FROM sig WHERE name='$username'";
$result = mysqli_query($con, $sql);
// Check if query executed successfully and if a row is found
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the recommended job
    $row = mysqli_fetch_assoc($result);
    $recommendedJob = $row['job'];
} else {
    // Default value if no job found
    $recommendedJob = '????';
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homies Hired</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: white;
            background-image: linear-gradient(to bottom right, rgb(184, 118, 216), rgb(134, 32, 207));
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="large.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Homies Hired
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Companies
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="https://aws.amazon.com/free/?gclid=Cj0KCQjw5cOwBhCiARIsAJ5njubhMX__Lg_DYX3RqrzgTHuUYr0gfeOXH71l--n31yM_uhK0DNgH3g8aAjNIEALw_wcB&trk=14a4002d-4936-4343-8211-b5a150ca592b&sc_channel=ps&ef_id=Cj0KCQjw5cOwBhCiARIsAJ5njubhMX__Lg_DYX3RqrzgTHuUYr0gfeOXH71l--n31yM_uhK0DNgH3g8aAjNIEALw_wcB:G:s&s_kwcid=AL!4422!3!453325184782!e!!g!!aws!10712784856!111477279771">AWS</a></li>
                        <li><a class="dropdown-item" href="https://www.infosys.com/">Infosys</a></li>
                        <li><a class="dropdown-item" href="https://www.google.com/about/careers/applications/">Google</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="py-5" style="padding: 25px;">
    <div class="container">
        <h1 class="display-4">UNEMPLOYMENT IS NO LONGER AN ISSUE FREELANCING IS NEW AGE’S SAVIOUR!</h1>
        <div class="container" style="background-image: linear-gradient(to bottom left, rgb(184, 118, 216), rgb(134, 32, 207)); float:left; border-radius:10px;">
            <h3 class="text-center">Welcome, <?php echo $username; ?>!</h3>
            <h4 class="text-center"><?php
                // Display the recommended job
                echo 'Our dear future - ' . $recommendedJob . '!!';
            ?>
</h4>
        </div>
        <br>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <p>Experience the gateway to professional enhancement with Homies Hired! By clicking the "Start Your Trial" button above, you'll gain exclusive access to the Infosys Springboard program, designed to equip you with cutting-edge skills and propel your career to new heights. Seize this opportunity to unleash your full potential and thrive in today's dynamic job market!</p>
            <br>
            <a href="https://www.infosys.com/about/springboard.html"><button type="button" class="btn btn-lg" style="border-radius: 15px; background: linear-gradient(to right, #aa6dff, #e86fea); color:white;">START YOUR TRIAL</button></a>
        </div>
        <div class="col-md-6" style="border-radius: 25px;">
            <h2>LEARN NEW SKILLS TAKE YOUR RESUMES TO THE NEXT LEVEL!</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Courses</th>
                        <th scope="col">Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CLOUD COMPUTING</td>
                        <td>4 Weeks</td>
                    </tr>
                    <tr>
                        <td>MACHINE LEARNING</td>
                        <td>3 Weeks</td>
                    </tr>
                    <tr>
                        <td>DEEP LEARNING</td>
                        <td>4 Weeks</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="container mt-5">
    <h3 class="text-center">THESE COMPANIES ARE INTERESTED IN RECRUITING YOU!</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="background-color:rgb(151, 95, 154);">
                <img src="santa.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="color: white;">SANTA MONICA STUDIOS</h5>
                    <p class="card-text">In SMS, over 250 talented developers dedicated to designing, developing, and delivering the highest quality AAA PlayStation games.</p>
                    <a href="https://sms.playstation.com/careers" class="btn btn-primary">Visit Careers</a>
                </div>
            </div>
        </div>
        <!-- More cards for other companies -->
        <div class="col-md-4">
            <div class="card" style="background-color:rgb(151, 95, 154);">
                <img src="image.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="color: white;">NAUGHTY DOG STUDIOS</h5>
                    <p class="card-text">We've developed some of the Critically acclaimed and top selling games on the PlayStation platform!</p>
                    <a href="https://www.naughtydog.com/careers" class="btn btn-primary">Visit Careers</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background-color:rgb(151, 95, 154);">
                <img src="activision.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="color: white;">ACTIVISION STUDIOS</h5>
                    <p class="card-text">We are committed to working with you, are an individual requiring an accommodation to apply for an open position</p>
                    <a href="https://careers.activision.com/" class="btn btn-primary">Visit Careers</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<div class="about-section py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">About Homies Hired</h2>
                <p class="lead">Homies Hired is a leading platform revolutionizing the way freelancers connect with businesses, facilitating seamless collaboration on short-term projects. Our mission is to bridge the gap between freelancers and businesses, empowering both to achieve their goals efficiently.</p>
                <p>We understand the challenges faced by freelancers and businesses in navigating the ever-evolving gig economy. Therefore, we provide a sophisticated yet user-friendly platform where freelancers can showcase their skills and businesses can easily find the talent they need.</p>
                <p>With a relentless commitment to excellence, innovation, and fostering meaningful connections, Homies Hired strives to create a collaborative environment where talent thrives and projects come to life.</p>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Our Team</h2>
                <p class="lead">Homies Hired was founded by a group of passionate individuals committed to making a difference in the world of freelancing and project-based work.</p>
                <ul>
                    <li><strong>N. Varun Kumar</strong> - Co-founder </li>
                    <li><strong>S. Thikish</strong> - Co-founder </li>
                </ul>
                <p>Our diverse team brings together expertise in technology, business, and design to create a platform that caters to the needs of freelancers and businesses alike.</p>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Connect With Us</h2>
                <ul class="list-unstyled">
                    <li><i class="bi bi-facebook"></i><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><i class="bi bi-twitter"></i><a href="https://www.twitter.com/">Twitter</a></li>
                    <li><i class="bi bi-instagram"></i><a href="https://www.instagram.com/">Instagram</a></li>
                    <li><i class="bi bi-linkedin"></i><a href="https://www.linkedin.com/">LinkedIn</a></li>
                    <li><i class="bi bi-youtube"></i><a href="https://www.youtube.com/">YouTube</a></li>
                </ul>
                <p class="mt-4">Follow us on social media to stay updated with the latest news, events, and job opportunities at Homies Hired!</p>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2024 Homies Hired. All rights reserved.</p>
</footer>
</body>
</html>
