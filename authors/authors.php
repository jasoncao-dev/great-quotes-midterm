<?php
require_once('../setting.php');
require_once(__ROOT__ . '/functions.php');
session_start();
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <title>Great Quotes</title>

    <style>
        .title {
            padding-top: 5rem;
            padding-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="text-light">
            <h1 class="fw-bold title">Welcome <span class="text-warning"><?= $_SESSION['name'] ?></span> 👋 to our <span class="text-warning">Authors</span></h1>
            <p class="lead p-1">
                Click on details to see what they are saying
            </p>
            <a href="../quotes/quotes.php"><button class="btn btn-primary m-3 mt-1">Back To Quotes Gallery</button></a>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php createCardsAuthors($authors, $imgs); ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gsap/1.19.1/TweenMax.min.js'></script>
    <script src="../js/scripts.js"></script>

</body>