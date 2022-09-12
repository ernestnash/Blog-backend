<?php
include 'Partials/header.php';

//fetch posts from databse if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $result = mysqli_query($connection, $query);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>

<?php 
    //fetch categories teble using category id of post
    $category_id = $id;
    $category_query = "SELECT * FROM categories WHERE id=$category_id";
    $category_result = mysqli_query($connection, $category_query);
    $category = mysqli_fetch_assoc($category_result);
?>
    <header class="category-title">
        <h2><?= $category['title'] ?></h2>
    </header>
    <!-- ============================END OF CATEGORY TITLE============================ -->
<?php if (mysqli_num_rows($result) > 0) : ?>
    <section class="posts">
        <div class="container posts-container">
            <?php while($post =mysqli_fetch_assoc($result)) : ?>
                <article class="post">
                <div class="post-thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>">
                </div>
                <div class="post-info">
                    <h3 class="post-title">
                        <a href="<?= ROOT_URL?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post-body">
                    <?= substr($post['body'], 0, 150) ?>...
                    </p>
                    <div class="post-author">
                        <?php 
                        //fetch author from users table using the author_id
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post-author-avatar">
                            <img src="./images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post-author-info">
                            <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                            <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile ?>
        </div>
    </section>
    <?php else : ?>
        <div class="alert-message error lg">
            <p>No posts found for this category</p>
        </div>
    <?php endif ?>
    <!-- ============================END OF POSTS============================ -->


    <section class="category-buttons">
        <div class="container category-buttons-container">
            <?php 
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection, $all_categories_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
            <a href="<?= ROOT_URL?>categories-post.php?id=<?= $category['id'] ?>" class="category-button"><?= $category['title'] ?></a>
            <?php endwhile ?>
        </div>
    </section>
    <!-- ============================END OF CATEGORY BUTTONS ============================ -->



<?php
include 'Partials/footer.php'
?>