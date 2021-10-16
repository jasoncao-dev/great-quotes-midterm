<?php
    require_once('setting.php');
    //require_once(__ROOT__. '/csv_utils.php');
    require_once('./functions.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Great Quotes</title>
</head>

<body>
    <section class="p-5 mx-auto">
        <div class="container">
            <div class="slider-wrap align-items-center justify-content-between">
                <div id="card-slider" class="slider">
                    <?= createCards($users, $authors, $quotes, $imgs); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="title-section">
        <div class="container">
            <div class="text-center text-light">
                <h1 class="fw-bold">Welcome to <span class="text-warning">Great Quotes</span></h1>
                <p class="lead p-3">
                    Refocus and recharge with these inspirational sayings.
                </p>
                <a href="authors.php">
                    <button class="btn btn-success">See Authors</button>
                </a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signup">
                    Sign up
                </button>
                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#signin">
                    Sign in
                </button>
            </div>
        </div>
    </section>

    <!-- Create Signup -->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel">Create an account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="auth.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Display name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Enter your username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Enter your password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="action" value="signup">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Signin -->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalLabel">Sign in your account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="auth.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Enter your username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Enter your password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="action" value="signin">Sign in</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gsap/1.19.1/TweenMax.min.js'></script>
    <script src="./js/scripts.js"></script>
</body>

</html>