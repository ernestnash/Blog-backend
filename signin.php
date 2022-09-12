<?php

require 'config/constants.php';

$username_email = $_SESSION['sigin-data']['username_email'] ?? null;
$password = $_SESSION['sigin-data']['password'] ?? null;

unset($_SESSION['sigin-data']);
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,200;1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6c3030c530.js" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>Assets/Css/Style.css">

</head>
<body>
    
    <section class="form-section">
        <div class="container form-section-container">
            <h2>Sign In</h2>
            <?php if(isset($_SESSION['signup-success'])) : ?> 
            <div class="alert-message success">
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['signin'])) : ?>
            <div class="alert-message error">
                <p>
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin']);
                    ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Usename or Email">
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small>Dont have an account? <a href="signup.php">Sign Up</a></small>
            </form>
            
        </div>
    </section>
    
</body>
</html>