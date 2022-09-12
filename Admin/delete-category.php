<?php
require 'Config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //for later
    //update category id of posts that belong to this category to id of uncategorizzed category
    $update_query = "UPDATE posts SET category_id=7 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);

    if (!mysqli_errno($connection)) {
        //delete category from database
        $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)) {
            $_SESSION['delete-category'] = "Couldn't delete {$category['title']} category";
        } else {
            $_SESSION['delete-category-success'] = "Category {$category['title']} deleted successfully";
        }

    }
    

    
}
header('location: ' .ROOT_URL . 'Admin/manage-categories.php');
die();