<?php

require 'config/constants.php';

//get back form data incase of error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
//delete signup session
unset($_SESSION['signup-data']);
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
            <h2>Sign up</h2>
            <?php if(isset($_SESSION['signup'])): ?>                    
                <div class="alert-message error">
                    <p>
                        <?= $_SESSION['signup']; 
                        unset($_SESSION['signup']); 
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword?>" placeholder="Create Password">
                <input type="password"name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm password">
                <div class="form-control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Sign up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
            
        </div>
    </section>
    
</body>
</html>