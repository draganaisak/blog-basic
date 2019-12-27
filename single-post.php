<?php

session_start();

include 'includes/head.php';
require 'connection.php';

?>
<body>

<?php
include  'includes/header.php';


$postId = $_GET['post_id'];
$sqlPost = "SELECT * FROM posts WHERE id='$postId'";
$statement = $connection->prepare($sqlPost);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$singlePost = $statement->fetch();
$inputError = "";

?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-post">
            <h2 class="blog-post-title"><?php echo $singlePost['title'] ?></h2>
            <p class="blog-post-meta"><?php echo $singlePost['created_at'] ?> <a href="#"><?php echo $singlePost['author'] ?></a></p>

            <p><?php echo $singlePost['body'] ?></p>

            <form method="GET" action="delete-post.php" name="deletePostForm">
                <button id="delete" class="btn btn-primary" onclick="confirmDelete()">Delete this post</button>
                <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="id"/>
            </form>

            <script>
                document.getElementById("delete").addEventListener("click", function(event){
                    event.preventDefault()
                    if(window.confirm("Do you really want to delete this post?")){
                        document.deletePostForm.submit();
                    }
                });
            </script>

            <br>
            <p>Write comment</p>
            <br>

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

            <button type="button" onclick="hideComments()" class="btn btn-default button-hide">Hide Comments</button>
            <hr>
            <?php include 'comments.php'; ?>

        </div><!-- /.blog-post -->
        <?php include 'includes/sidebar.php'; ?>
    </div>

</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>