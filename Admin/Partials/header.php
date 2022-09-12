<?php
require '../Partials/header.php';

//  check login status
if(!isset($_SESSION['user-id'])) {
    header('Location: ' . ROOT_URL . 'signin.php');
    die();
}





