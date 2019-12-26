<?php
include 'includes/head.php';
include  'includes/header.php';
require 'connection.php';

?>
<body>

<?php
$postId = $_GET['post_id'];
$sqlPost = "SELECT * FROM posts WHERE id='$postId'";
$statement = $connection->prepare($sqlPost);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$singlePost = $statement->fetch();



?>

    <main role="main" class="container">

        <div class="row">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $singlePost['title'] ?></h2>
                <p class="blog-post-meta"><?php echo $singlePost['created_at'] ?> <a href="#"><?php echo $singlePost['author'] ?></a></p>

                <p><?php echo $singlePost['body'] ?></p>

                <hr>
                <?php include 'comments.php'; ?>

            </div><!-- /.blog-post -->

            <?php include 'includes/sidebar.php'; ?>
        </div>

    </main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
