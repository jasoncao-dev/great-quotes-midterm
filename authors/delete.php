<?php
require_once('../setting.php');
require_once(__ROOT__ . '/functions.php');
session_start();
if (count($_SESSION) == 0) {
    $path = 'location: detail.php?index=' . $_GET['index'];
    header($path);
};
$index = $_GET['index'];
$author_firstname = 'Deleted';
$author_lastname = 'Author';
modifyLineCSV(__ROOT__ . '/authors.csv.php', $index, $author_firstname . ";" . $author_lastname . "\n"); //change authors to Deleted Author, all quotes by this authors will not be displayed

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User is deleted</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>
<div class="container vh-100">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="row flex-column p-5 text-center">
                <h2 class="text-light">Author has been <span class="text-warning">deleted</span>!</h2>
                <p class="text-light">Redirecting to homepage in <span id="countdown" class="fw-bold">5</span> seconds...</p>
                <a href="authors.php"><button class="btn btn-warning">Back To Homepage</button></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let seconds = 5;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            window.location = "authors.php";
        } else {
            document.getElementById("countdown").innerHTML = seconds;
            window.setTimeout("countdown()", 1000);
        }
    }
    countdown();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gsap/1.19.1/TweenMax.min.js'></script>
    <script src="../js/scripts.js"></script>

</body>

</html>