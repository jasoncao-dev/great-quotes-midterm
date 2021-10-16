<?php
require_once('setting.php');
require_once(__ROOT__ . '/functions.php');

$index = $_GET['index'];
$author_firstname = $authors[$index]['first_name'];
$author_lastname = $authors[$index]['last_name'];
$author = $author_firstname . " " . $author_lastname;

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Great Quotes</title>

    <style>
        .card {
            background-color: #fff;
            border-radius: 2.5rem;
        }

        .detail .quote-icon-left,
        .quote-icon-right {
            font-size: 36px;
        }

        .blockquote-footer cite {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="container vh-100">
            <div class="row vh-100 detail align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="row card flex-row p-5">
                        <div class="col-sm-3">
                            <div class="animation-card_image">
                                <img class="img-fluid" src=<?= $imgs[random_int(0, 7)] ?>>
                            </div>
                        </div>
                        <div class="col-sm-9 ps-3">
                            <h3 class="animation-card_content_title title-2 fw-bold">Author <?= $author ?></h3>
                            <?php authorsQuotes($index, $quotes); ?>
                            <div id="buttons">
                                <a href="authors.php"><button type="button" class="btn btn-outline-primary">Back To Homepage</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gsap/1.19.1/TweenMax.min.js'></script>
    <script src="./js/scripts.js"></script>

</body>