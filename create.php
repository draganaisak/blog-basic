<?php
session_start();

include 'includes/head.php';
include 'includes/header.php';
require 'connection.php';
$inputError = "";
?>

<form action="create-post.php" method="post">
    <input type="text" name="title" placeholder="Title of post" style="display:block; margin-bottom:1rem; padding:0.5rem"/>
    <textarea name="body" rows="5" cols="60" placeholder="Your post" style="display:block; margin-bottom:1rem"></textarea>
    <input type="text" name="author" placeholder="Your name" style="display:block; margin-bottom:1rem; padding:0.5rem"/>

    <?php

    if (!empty($_SESSION["validation_error"])) {
        $inputError = $_SESSION["validation_error"];
        unset($_SESSION['validation_error']);
        echo '<span class="alert alert-danger">' . $inputError . '</span><br>';
    }
    ?>
    <button class="btn btn-default" type="submit" value="submit">Publish</button>
</form>