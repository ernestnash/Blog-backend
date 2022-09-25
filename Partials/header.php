<?php

require 'Config/database.php';

//fetch current user from databse
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT );
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniocliff.co.ke</title>

    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT_URL?>Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT_URL?>Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT_URL?>Favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= ROOT_URL?>Favicon/site.webmanifest">

    <!-- fontawesome -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,200;1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c3030c530.js" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Assets/Css/Style.css">

</head>
<body>
    <nav>
        <div class="container nav-container">
            <a href="<?= ROOT_URL ?>" class="nav-logo">NASHON</a>
            <ul class="nav-items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contacts.php">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li class="nav-profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>Admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                <li><a href="<?= ROOT_URL ?>signin.php">Sign In</a></li>
                <?php endif ?>
            </ul>
            <button id="open-nav-btn"><i class="fas fa-bars"></i></button>
            <button id="close-nav-btn"><i class="fas fa-times"></i></button>
        </div>
    </nav>
    <!-- ============================END OF NAV============================ -->