<?php
include 'server.php';

$registered = false;
$userExists = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $exp = $_POST['exp'];  

    // Retrieve answers to the questions
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    // Determine recommended job based on user responses
    $answer = $q1 . $q2 . $q3 . $q4 . $q5;
    $recommended_job = recommendJob($answer);

    $check_query = "SELECT * FROM sig WHERE name='$name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $userExists = true;
    } else {
        $insert_query = "INSERT INTO sig (name, password, age, exp, job) VALUES ('$name', '$password', '$age', '$exp', '$recommended_job')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            $registered = true;
        } else {
            die("Error: " . mysqli_error($con));
        }
    }
}

function recommendJob($answer) {
    $recommendedJobs = array(
        'aaaaa'=> 'Creative Consultant',
        'aaaab'=> 'Market Research Analyst',
        'aaaba'=> 'Social Media Manager',
        'aaabb'=> 'UI/UX Designer',
        'aabaa'=> 'Illustrator',
        'aabab'=> 'E-commerce Developer',
        'aabba'=> 'Animator',
        'aabbb'=> 'Graphic Designer',
        'abaaa'=> 'Content Creator',
        'abaab'=> 'Digital Marketer',
        'ababa'=> 'Scriptwriter',
        'ababb'=> 'Video Editor',
        'abbaa'=> 'Virtual Assistant',
        'abbab'=> 'IT Support Specialist',
        'abbba'=> 'Technical Support Specialist',
        'abbbb'=> 'Copywriter',
        'baaaa'=> 'Content Strategist',
        'baaab'=> 'UI/UX Researcher',
        'baaba'=> 'Project Coordinator',
        'baabb'=> 'Marketing Coordinator',
        'babaa'=> 'Brand Strategist',
        'babab'=> 'Marketing Analyst',
        'babba'=> 'Project Manager',
        'babbb'=> 'Project Manager (Alternate)',
        'bbaaa'=> 'Digital Strategist',
        'bbaab'=> 'Marketing Consultant',
        'bbaba'=> 'Product Manager',
        'bbabb'=> 'Marketing Specialist',
        'bbbaa'=> 'Social Media Coordinator',
        'bbbab'=> 'Campaign Manager',
        'bbbba'=> 'PR Specialist',
        'bbbbb'=> 'Brand Manager'
    );

    return $recommendedJobs[$answer] ?? 'No job recommendation available';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Homies Hired</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <style>
        body{
            background-image: url('bg.png');
            background-size:cover;
            background-repeat:no-repeat;
            font-family: 'Poppins', sans-serif;
            color: white;
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

    <!-- Signup form -->
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark">
                <div class="card-header">
                    
        <h2><img src="download.png"></h2>
                    <h3 class="text-center">Signup</h3>
                </div>
                <div class="card-body">
                    <?php if($userExists): ?>
                        <div class="alert alert-danger" role="alert">
                            User already exists.
                        </div>
                    <?php endif; ?>
                    <?php if($registered): ?>
                        <div class="alert alert-success" role="alert">
                            Registered successfully.
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="job-recommender-form">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username here" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password here" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                        </div>
                        <div class="form-group">
                            <label for="exp">Experienced in Freelancing</label>
                            <select class="form-control" id="exp" name="exp" required>
                                <option value="yes">I already have experience in freelancing</option>
                                <option value="no">No, this is my first time!</option>
                            </select>
                        </div> <div>
            <label for="q1">Which best describes your creative skills?</label><br>
            <input type="radio" name="q1" id="q1a" value="a">
            <label for="q1a">Visual content</label><br>
            <input type="radio" name="q1" id="q1b" value="b">
            <label for="q1b">Technical tasks</label><br>
        </div>
        <!-- Question 2 -->
        <div>
            <label for="q2">What is your preferred working environment?</label><br>
            <input type="radio" name="q2" id="q2a" value="a">
            <label for="q2a">Remote work</label><br>
            <input type="radio" name="q2" id="q2b" value="b">
            <label for="q2b">Office environment</label><br>
        </div>
        <!-- More questions to be added similarly -->
        <!-- Question 3 -->
        <div>
            <label for="q3">How much time can you dedicate to freelance work?</label><br>
            <input type="radio" name="q3" id="q3a" value="a">
            <label for="q3a">Full-time availability</label><br>
            <input type="radio" name="q3" id="q3b" value="b">
            <label for="q3b">Part-time availability</label><br>
        </div>
        <!-- Question 4 -->
        <div>
            <label for="q4">Are you interested in long-term or short-term projects?</label><br>
            <input type="radio" name="q4" id="q4a" value="a">
            <label for="q4a">Long-term projects</label><br>
            <input type="radio" name="q4" id="q4b" value="b">
            <label for="q4b">Short-term projects</label><br>
        </div>
        <!-- Question 5 -->
        <div>
            <label for="q5">How important is earning potential to you?</label><br>
            <input type="radio" name="q5" id="q5a" value="a">
            <label for="q5a">Very important</label><br>
            <input type="radio" name="q5" id="q5b" value="b">
            <label for="q5b">Moderately important</label><br>
        </div>
        <!-- Hidden input field to store recommended job -->
        <input type="hidden" id="recommended_job" name="recommended_job">
        <!-- Button to submit the form -->
        
                        <button type="submit" class="btn btn-primary btn-block" id="submit-btn">Signup</button>

                        <div style="visibility: hidden;">
        <label for="job" ></label>
        <input type="text" id="job" name="job" readonly >
    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
</body>
</html>
