<?php
    require_once('../setting.php');
    //require_once(__ROOT__. '/csv_utils.php');
    require_once(__ROOT__. '/functions.php');
    session_start();
    if (count($_SESSION) == 0) {
        header('location: '.__ROOT__.'/index.php');
    };
    $users[] = ['name' => $_POST['name'], 'username' => $_POST['username']];
    $author_index = findAuthor($authors, $_POST['author_firstname'], $_POST['author_lastname']);
    $quotes[] = ['quote' => $_POST['quote'], 'author_id' => $author_index];
    if (count($_POST) == 0) {
        echo 'Nothing here!';
        die();
    }
    addLastCSV(__ROOT__.'/users.csv.php', $_POST['name'], $_POST['username']);
    if ($author_index > count($authors)) {
        addLastCSV(__ROOT__.'/authors.csv.php', $_POST['author_firstname'], $_POST['author_lastname']);
    }
    addLastCSV(__ROOT__.'/quotes.csv.php', $_POST['quote'], $author_index);
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
                    <h2 class="text-light">Quote has been <span class="text-warning">created</span>!</h2>
                    <p class="text-light">Redirecting to homepage in <span id="countdown" class="fw-bold">5</span> seconds...</p>
                    <a href="quotes.php"><button class="btn btn-warning">Back To Homepage</button></a>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        let seconds = 5;

        function countdown() {
            seconds = seconds - 1;
            if (seconds < 0) {
                window.location = "./quotes.php";
            } else {
                document.getElementById("countdown").innerHTML = seconds;
                window.setTimeout("countdown()", 1000);
            }
        }
        countdown();
    </script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>