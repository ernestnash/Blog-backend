<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog website</title>

    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600&family=Estonia&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c3030c530.js" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="./Assets/Css/Style.css">

</head>
<body>
    <nav>
        <div class="container nav-container">
            <a href="index.php" class="nav-logo">NASHON</a>
            <ul class="nav-items">
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contacts.php">Contact</a></li>
                <li><a href="signin.php">Sign In</a></li>
                <li class="nav-profile">
                    <div class="avatar">
                        <img src="./images/18.jpg" >
                    </div>
                    <ul>
                        <li><a href="Dashboard.php">Dashboard</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open-nav-btn"><i class="fas fa-bars"></i></button>
            <button id="close-nav-btn"><i class="fas fa-times"></i></button>
        </div>
    </nav>
    <!-- ============================END OF NAV============================ -->
</body>
</html>