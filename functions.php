<?php
require_once('csv_utils.php');

$imgs = [
    "https://i.ibb.co/0MSRhGc/1.png",
    "https://i.ibb.co/Jy5hGRh/2.png",
    "https://i.ibb.co/Ny42x4n/3.png",
    "https://i.ibb.co/wRfd9h5/4.png",
    "https://i.ibb.co/yNK7Mz0/5.png",
    "https://i.ibb.co/Trm1g8y/6.png",
    "https://i.ibb.co/QPz9TjX/7.png",
    "https://i.ibb.co/kGKxG67/8.png"
];
function findAuthor($authors, $author_firstname, $author_lastname)
{
    for ($i = 1; $i <= count($authors); $i++) {
        if ($authors[$i]['first_name'] == $author_firstname && $authors[$i]['last_name'] == $author_lastname) {
            return $i;
        }
    }
    return $i++;
}

function createCards($users, $authors, $quotes, $imgs)
{
    for ($i = 1; $i <= count($quotes); $i++) { 
        if (($authors[$quotes[$i]['author_id']]['first_name'] == 'Deleted') and ($authors[$quotes[$i]['author_id']]['last_name'] == 'Author')) continue; ?>
        <div class="slider-item align-content-center">
            <div class="animation-card_image">
                <img src=<?php $img_index = random_int(0, 7);
                            echo $imgs[$img_index]; ?>>
            </div>
            <div class="animation-card_content">
                <h3 class="animation-card_content_title title-2 fw-bold"><?= $users[$i]['name'] ?></h3>
                <p class="text-dark fw-lighter">@<?= $users[$i]['username'] ?></p>
                <figure>
                    <blockquote class="blockquote animation-card_content_description p-2 pt-1">
                        <p><i class="bx bxs-quote-alt-left quote-icon-left text-secondary pe-2"></i><?= $quotes[$i]['quote'] ?><i class="bx bxs-quote-alt-right quote-icon-right text-secondary ps-2"></i></p>
                    </blockquote>
                    <figcaption class="blockquote-footer text-end">
                        <cite title="Source Title"><?= $authors[$quotes[$i]['author_id']]['first_name'] . " " . $authors[$quotes[$i]['author_id']]['last_name'] ?></cite>
                    </figcaption>
                </figure>

                <div class="d-flex justify-content-end">
                    <a href="detail.php?index=<?= $i ?>"><button class="btn btn-sm btn-success ms-1">Detail</button></a>
                </div>

            </div>

        </div>
    <?php
    }
}

function createCardsAuthors($authors, $imgs, $link="detail.php")
{
    for ($i = 1; $i <= count($authors); $i++) {
        if (($authors[$i]['first_name'] == 'Deleted') and ($authors[$i]['last_name'] == 'Author')) continue; ?>
        <div class="col">
            <div class="card h-100 rounded-3">
                <img src="<?php $img_index = random_int(0, 7);
                            echo $imgs[$img_index]; ?>" class="card-img-top px-3" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title p-3"><?= $authors[$i]['first_name'] . ' ' . $authors[$i]['last_name']; ?></h5>
                    <a href="<?= $link ?>?index=<?= $i ?>"><button class="btn btn-success">Detail</button></a>
                </div>
            </div>
        </div>
        <?php
    }
}

function authorsQuotes($index, $quotes)
{
    for ($i = 1; $i <= count($quotes); $i++) {
        if ($quotes[$i]['author_id'] == $index) { ?>
            <figure>
                <blockquote class="blockquote animation-card_content_description p-1 pt-1">
                    <p><i class="bx bxs-quote-alt-left quote-icon-left text-secondary pe-2"></i><?= $quotes[$i]['quote'] ?><i class="bx bxs-quote-alt-right quote-icon-right text-secondary ps-2"></i></p>
                </blockquote>
            </figure>
<?php
        }
    }
}

function findQuotesByAuthor($index, $quotes) {
    $quoteIndex = [];
    $count = 1;
    for ($i = 0; $i < count($quotes); $i++) {
        if ($quotes[$i]['author_id'] == $index) {
            $quoteIndex[$count] = $i;
            $count++;
        }
    }
    return $quoteIndex;
}
