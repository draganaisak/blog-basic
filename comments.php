<?php

require_once 'connection.php';

$postId = $_GET['post_id'];
$sqlComment = "SELECT * FROM comments WHERE post_id='$postId'";
$statementComment = $connection->prepare($sqlComment);
$statementComment->execute();
$statementComment->setFetchMode(PDO::FETCH_ASSOC);
$comments = $statementComment->fetchAll();


?>

<button type="button" onclick="hideComments()" class="btn btn-default button-hide">Hide Comments</button>
<br>
<br>

<ul id="hide">
    <?php foreach ($comments as $comment): ?>

        <li>
            <h6><?php echo  $comment['author']; ?></h6>
            <p><?php echo $comment['text']; ?></p>
        </li>
        <form method="post" action="delete-comment.php">
            <button type="submit" class="btn btn-default">Delete</button>
            <input type="hidden" value="<?php echo $comment['id']; ?>" name="id"/>
            <input type="hidden" value="<?php echo $comment['post_id']; ?>" name="post_id"/>
        </form>
        <hr>
    <?php endforeach ?>

</ul>


<script>
    let comments = document.querySelector('#hide');
    let button = document.querySelector('.button-hide')

    function hideComments() {
        if(button.innerHTML == "Show Comments") {
            comments.classList.remove('hide');
            button.innerHTML = "Hide Comments"
        } else {
            comments.className = "hide";
            button.innerHTML = "Show Comments"
        }
    }
</script>
