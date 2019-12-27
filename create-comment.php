<?php

require 'connection.php';
$id = $_POST('id');

$text = $_POST['text'];

if (isset($_POST['author'])) {
    $author = $_POST['author'];
} else {
    header("Location: http://localhost:8000/single-post.php?post_id=$id&required=false");
    exit;
}

$commentInsert = "INSERT INTO comments (author, text, post_id) VALUES ('{$author}', '{$text}', '{$id}'";
$statement = $connection->prepare($commentInsert);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);



?>