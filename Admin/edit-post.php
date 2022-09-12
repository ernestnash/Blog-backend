<?php
    include 'Partials/header.php';

    //fetch categories from database
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    //fetch the form from databse if id is set
    if (isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);
    } else {
        header('location: ' . ROOT_URL . 'Admin/');
        die();
    }

?>

    <section class="form-section">
        <div class="container form-section-container">
            <h2>Edit Post</h2>
            <form action="<?= ROOT_URL?>Admin/edit-post-logic.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $post['id'] ?>" name="id">
                <input type="hidden" value="<?= $post['thumbnail'] ?>" name="previous_thumbnail_name">
                <input type="text" value="<?= $post['title'] ?>" name="title" placeholder="Title">
                <select  name="category">
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea rows="10" name="body" placeholder="Body"><?= $post['body'] ?></textarea>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <div class="form-control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is-featured" checked >
                    <label for="is-featured">Featured</label>
                </div>
                <?php endif ?>
                <div class="form-control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Update Post</button>
            </form>
            
        </div>
    </section>
    
<?php
    include '../Partials/footer.php';

?>