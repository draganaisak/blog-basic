<?php require 'connection.php'; ?>

<?php
$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$sidePosts = $statement->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>
        <?php foreach ($sidePosts as $post): ?>
            <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
        <?php endforeach;  ?>
    </div>

</aside><!-- /.blog-sidebar -->