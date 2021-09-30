<?php
global $session;
global $message;
?>

<!doctype html>
<html lang="en">
<head>
    <title>NIX Education</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" media="all" href="css/bootstrap.css" />
    <link rel="stylesheet" media="all" href="css/main.css" />
</head>
<body>
<header>
    <nav class="navbar bg-dark navbar-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand my-3" href="index.php">NIX Education</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#toggleNav" aria-controls="toggleNav" aria-expanded="false" aria-label="Toggle nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="toggleNav">
                <div class="navbar-nav ms-lg-5 ms-md-5">
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        id="beginnerDropdown" aria-haspopup="true" aria-expanded="false" href="#">Beginner</a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="beginnerDropdown">
                            <a class="dropdown-item" href="lesson1.php">Lesson 1</a>
                            <a class="dropdown-item" href="lesson2.php">Lesson 2</a>
                            <a class="dropdown-item" href="lesson3.php">Lesson 3</a>
                        </div>
                    </div>
                    <?php
                    if ($session->isLoggedIn()) {
                        echo '<a class="nav-item nav-link" href="create.php">Create Ad</a>';
                    }
                    ?>
                    <a class="nav-item nav-link dropdown-divider"></a>
                </div>
                <div class="navbar-nav ms-auto">
                    <?php
                    if ($session->isLoggedIn()) {
                        echo '<a class="nav-item nav-link" href="profile.php">Hi, ' . h($session->author) . '!</a>
                              <a class="nav-item nav-link" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-item nav-link" href="login.php">Login</a>
                              <a class="nav-item nav-link" href="register.php">Register</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="bg-success px-3 mt-2"><?php echo '<p class="text-white"><strong>' . $message . '</strong></p>'; ?></div>
