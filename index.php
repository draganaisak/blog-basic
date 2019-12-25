<?php include 'includes/head.php'; ?>

<body>

<?php include 'includes/header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Sample blog post</h2>
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">Another blog post</h2>
            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">New feature</h2>
            </div><!-- /.blog-post -->

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include 'includes/sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include 'includes/footer.php'; ?>

</body>
</html>
