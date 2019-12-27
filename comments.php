<?php

require 'connection.php';

$postId = $_GET['post_id'];
$sql = "SELECT * FROM comments WHERE post_id='$postId'";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$comments = $statement->fetchAll();


?>

<ul id="hide">
    <?php foreach ($comments as $comment): ?>

        <li>
            <h6><?php echo  $comment['author']; ?></h6>
            <p><?php echo $comment['text']; ?></p>
            <form method="post" action="delete-comment.php" >
                <button type="submit" class="btn btn-default">Delete</button>
                <input type="hidden" value="<?php echo $comment['id']; ?>" name="id"/>
                <input type="hidden" value="<?php echo $comment['post_id']; ?>" name="post_id"/>
            </form>
        </li>
        <hr>
    <?php endforeach ?>

</ul>


<script>
    let comments = document.querySelector('#hide');
    let button = document.querySelector('.button-hide')

    function hideComments() {
        if(button.innerHTML == "Show Comments") {
            comments.classList.remove('hide');  //upravlja klasom hide na komentarima
            button.innerHTML = "Hide Comments"  //menja naziv buttona u Hide comments
        } else {
            comments.className = "hide";
            button.innerHTML = "Show Comments"
        }
    }
</script>

</main>
