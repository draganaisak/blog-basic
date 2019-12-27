<?php

session_start();

include 'connection.php';

$post_id = $_POST['post_id'];
$author = $_POST['author'];
$text = $_POST['text'];

if (empty($author) or empty($text)) {
    $_SESSION["validation_error"] = "All fields are required";
    header("Location: http://localhost:8000/single-post.php?post_id=$post_id");
    exit;
}

try {
    $commentInsert = "INSERT INTO comments (author, text, post_id) VALUES ('{$author}', '{$text}', {$post_id})";
    $statement = $connection->prepare($commentInsert);
    $statement->execute();
}
catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: http://localhost:8000/single-post.php?post_id=$post_id"); //refresuje stranicu sa prikazom i novog komentara

?>