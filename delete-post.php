<?php

include("connection.php");
$id = $_GET['id'];

$sqlDeletePost = "DELETE FROM posts WHERE id = $id ;";

$statementDeletePost = $connection->prepare($sqlDeletePost);

$statementDeletePost->execute();

header("Location: http://localhost:8000/index.php");
?>