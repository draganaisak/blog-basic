<?php
require_once 'connection.php';


try {
    $post_id = $_POST['post_id'];
    $comment_id = $_POST['id'];
    $sqlDelete ="DELETE FROM comments WHERE post_id=$post_id AND id=$comment_id";
    $statement = $connection->prepare($sqlDelete);
    $statement->execute();
}
catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: http://localhost:8000/single-post.php?post_id=$post_id");

?>