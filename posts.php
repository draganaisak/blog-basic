<?php
include 'includes/head.php';
require 'connection.php';

?>

<body>

<?php

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();



?>

<?php include 'includes/header.php'; ?>

<main role="main" class="container">

    <?php foreach ($posts as $post): ?>

    <div class="row">
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $post['created_at']; ?> <a href="#"><?php echo $post['author']; ?></a></p>

            <p><?php echo $post['body']; ?></p>

        </div><!-- /.blog-post -->
    </div>

    <?php endforeach ?>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
