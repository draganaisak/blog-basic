<?php

session_start();

include 'connection.php';


$title = $_POST['title'];
$body = $_POST['body'];
$author = $_POST['author'];


if (empty($title) or empty($body) or empty($author)) {
    $_SESSION["validation_error"] = "All fields are required";
    header("Location: http://localhost:8000/create.php");
    exit;
}

try {
    $postInsert = "INSERT INTO posts (title, body, author) VALUES ('{$title}', '{$body}', '{$author}')";
    $statement = $connection->prepare($postInsert);
    $statement->execute();
}
catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: http://localhost:8000/index.php");
