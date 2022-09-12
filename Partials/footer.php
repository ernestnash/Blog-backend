


    <footer>
        <div class="footer-socials">
            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-pinterest"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <!-- <a href="#" target="_blank"><i class="fab fa-github"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a> -->
        </div>
        <div class="container footer-container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <?php 
                    $all_categories_query = "SELECT * FROM categories";
                    $all_categories = mysqli_query($connection, $all_categories_query);
                    ?>
                    <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
                    <li><a href="<?= ROOT_URL?>categories-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></li>
                    <?php endwhile ?>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online support</a></li>
                    <li><a href="">Call numbers</a></li>
                    <li><a href="">Emalis</a></li>
                    <li><a href="">Social support</a></li>
                    <li><a href="">location</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">popular</a></li>
                    <li><a href="">Categories</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contacts.php">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer-copyright">
            <small>Copyright &copy; 2022 Nashon Ernest</small>
        </div>
    </footer>

    <script src="<?= ROOT_URL ?>Assets/JavaScript/Script.js"></script>
</body>
</html>