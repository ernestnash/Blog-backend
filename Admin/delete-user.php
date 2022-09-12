<?php
require 'Config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch user from uses table
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    //make sure we got only one user from database
    if(mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        //delete image if available
        if($avatar_path) {
            unlink($avatar_path);
        }
    }

    //for later
    //fetch all thummbnails for user and delete them.
    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result = mysqli_query($connection, $thumbnails_query);
    if(mysqli_num_rows($thumbnails_result) > 0) {
        while($thumbnail = mysqli_fetch_assoc($thumbnails_result)) {
            $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
            //delete thumbnail from images folder if exists
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }


    //delete user from database
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if(mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "Couldn't delete {$user['firstname']} {$user['lastname']} user";
    } else {
        $_SESSION['delete-user-success'] = "User {$user['firstname']} {$user['lastname']} deleted successfully";
    }

}
header('location: ' .ROOT_URL . 'Admin/manage-users.php');
die();