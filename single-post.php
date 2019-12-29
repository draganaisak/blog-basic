<?php

session_start();

require_once 'includes/head.php';
require_once 'connection.php';

?>
<body>

<?php
require_once 'includes/header.php';


$postId = $_GET['post_id'];
$sqlPost = "SELECT * FROM posts WHERE id='$postId'";
$statementPost = $connection->prepare($sqlPost);
$statementPost->execute();
$statementPost->setFetchMode(PDO::FETCH_ASSOC);
$singlePost = $statementPost->fetch();
$inputError = "";

?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-post">
            <h2 class="blog-post-title"><?php echo $singlePost['title'] ?></h2>
            <p class="blog-post-meta"><?php echo $singlePost['created_at'] ?> <a href="#"><?php echo $singlePost['author'] ?></a></p>

            <p><?php echo $singlePost['body'] ?></p>

            <form method="GET" action="delete-post.php" name="deletePost">
                <button id="delete" class="btn btn-primary">Delete this post</button>
                <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="id"/>
            </form>

            <script>
                document.querySelector('#delete').addEventListener("click", function(event){
                    event.preventDefault()
                    if(window.confirm("Do you really want to delete this post?")){
                        document.deletePost.submit();
                    }
                });
            </script>

            <br>
            <p>Write comment</p>

            <form action="create-comment.php" method="post">
                <input type="text" name="author" placeholder="Write your name" style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                <textarea name="text" rows="5" cols="60" placeholder="Write your comment" style="display:block; margin-bottom:1rem"></textarea>
                <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="post_id"/>

                <?php

                if (!empty($_SESSION["validation_error"])) {
                    $inputError = $_SESSION["validation_error"];
                    unset($_SESSION['validation_error']);
                    echo '<span class="alert alert-danger">' . $inputError . '</span><br>';
                }
                ?>
                <button class="btn btn-default" type="submit" value="submit">Publish</button>
            </form>
            <hr>
            <?php require_once 'comments.php'; ?>

        </div><!-- /.blog-post -->

        <?php require_once 'includes/sidebar.php'; ?>

    </div>

</main>

<?php require_once 'includes/footer.php'; ?>

</body>
</html>