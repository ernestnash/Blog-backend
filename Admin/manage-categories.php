<?php
    include 'Partials/header.php';

    //fetch categories from databse
    $query = "SELECT * FROM categories ORDER BY title";
    $categories = mysqli_query($connection, $query);

?>
 
 
 
    <section class="dashboard">

    <?php if(isset($_SESSION['add-category-success'])) : //shows if add category was successful?> 
        <div class="alert-message success container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['add-category'])) : //shows if add category was NOT successful?> 
        <div class="alert-message error container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-category'])) : //shows if edit category was NOT successful?> 
        <div class="alert-message error container">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-category-success'])) : //shows if edit category was successful?> 
        <div class="alert-message success container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['delete-category-success'])) : //shows if delete category was successful?> 
        <div class="alert-message success container">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>
        </div><?php elseif(isset($_SESSION['delete-category'])) : //shows if delete category was NOT successful?> 
        <div class="alert-message error container">
            <p>
                <?= $_SESSION['delete-category'];
                unset($_SESSION['delete-category']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <div class="container dashboard-container">
            <button id="show-sidebar-btn" class="sidebar-toggle"><i class="fa fa-angle-right"></i></button>
            <button id="hide-sidebar-btn" class="sidebar-toggle"><i class="fa fa-angle-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php"><i class="fa fa-pencil"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-address-card"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])): ?>


                    <li>
                        <a href="add-user.php"><i class="fa fa-user-plus"></i>
                            <h5>Add user</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php"><i class="fa fa-users"></i>
                            <h5>Manage Users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php"><i class="fa fa-edit "></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php" class="active"><i class="fa fa-list-ul"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Categories</h2>
                <?php if(mysqli_num_rows($categories) > 0) : ?>
                <table>
                    <thead>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                            <tr>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= ROOT_URL ?>Admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>Admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile ?>                        
                    </tbody>
                </table>
                <?php else : ?>
                    <div class="alert-message error">
                        <?= "No categories found" ?>
                    </div>
                <?php endif ?>
            </main>
        </div>
    </section>

<?php
    include '../Partials/footer.php';

?>