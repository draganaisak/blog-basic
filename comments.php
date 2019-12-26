<?php

require 'connection.php';

$postId = $_GET['post_id'];
$sql = "SELECT * FROM comments WHERE post_id='$postId'";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$comments = $statement->fetchAll();


?>

<ul>
<?php foreach ($comments as $comment): ?>

    <li>
        <h6><?php echo  $comment['author']; ?></h6>
        <p><?php echo $comment['text']; ?></p>
    </li>
<hr>
<?php endforeach ?>
</ul>

</main>
