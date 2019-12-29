<?php require_once 'includes/head.php'; ?>

<body>

<?php require_once 'includes/header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php require_once 'posts.php' ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php require_once 'includes/sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php require_once 'includes/footer.php'; ?>

</body>
</html>
