<?php

use app\core\Application; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $this->title; ?></title>
  <style>
    <?php include_once '../public/css/style.css'; ?>
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="/"><b><span>Manao</span></b></a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="services">Services</a></li>
          <li><a href="about">About</a></li>

          <li>
            <?php
            if (Application::$app->user) {
              echo '<a href="profile"><b> ' . Application::$app->user['name'] . '</b> </a>
                 
                 <li><a class="logout" href="logout">Logout</a></li>';
            } else {
              echo '<li class="dropdown"><a href="#"><span>Register/Login</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="register">Register</a></li>
                    <li class="dropdown"><a href="login"><span>Login</span> <i class="bi bi-chevron-right"></i></a>
                    </li>
                  </ul>
                </li>';
            }
            ?>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>


  <main id="main">
    {{content}}
  </main>


  <script>
    <?php include '../public/js/script.js'; ?>
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>