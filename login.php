<?php
session_start();
include 'server.php';

$logged = false;
$invalid = false;

// Check if user is already logged in
if (isset($_SESSION['name'])) {
    $logged = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        // Logout the user
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    } else {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM sig WHERE name='$name' AND password='$password'";
        
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $logged = true;
            $_SESSION['name'] = $name;
            header('Location: index.php');
            exit();
        } else {
            $invalid = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homies Hired</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            
            background-image: url('bg.png');
            background-size:cover;
            background-repeat:no-repeat;
            font-family: 'Poppins', sans-serif;
            color: white;
          
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
<body >
    <!-- Navigation bar -->
    
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-header">
                        <?php if ($logged): ?>
                            <h3 class="text-center">Logout</h3><br><p>Since you are logged in this account logout use another account!</p>
                        <?php else: ?>
                            <h3 class="text-center">Login</h3>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if ($logged): ?>
                            <form method="post">
                                <input type="hidden" name="logout" value="1">
                                <button type="submit" class="btn btn-primary btn-block">Logout</button>
                            </form>
                        <?php else: ?>
                            <?php if ($invalid): ?>
                                <div class="alert alert-danger" role="alert">
                                    Invalid credentials.
                                </div>
                            <?php endif; ?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username here" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password here" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
