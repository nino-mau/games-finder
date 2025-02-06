<?php
include $ROOT.'/games-finder/src/includes/header.php';

$gamesDict = $_SESSION['gamesDict'];

// For indications only
$name = $gamesDict[0];
$desc = $gamesDict[1];
$genre = $gamesDict[2];
$price = $gamesDict[3];
$review = $gamesDict[4];
$img_path = $gamesDict[5];

$gamesAmount = count($gamesDict[0]);


function handleReviewColor($reviewScore) {
    if ($reviewScore >= 90) {
        $reviewHtml = "<span class=\"game-review-cl--green\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    }
    else if ($reviewScore > 70) {
        $reviewHtml = "<span class=\"game-review-cl--lightgreen\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    }    
    else if ($reviewScore >= 50) {
        $reviewHtml = "<span class=\"game-review-cl--lightgreen\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    } else {
        $reviewHtml = "<span class=\"game-review-cl--red\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    }
    $res = $reviewHtml . $reviewScore . '/100</span>';
    return $res;
}
?>
<nav class="games-list-navbar d-flex flex-row justify-content-center">
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/action-icon.svg">
        <p class="navbar-text">Action</p>        
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/adventure-icon4.svg">
        <p class="navbar-text">Adventure</p>
    </div>    
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/horror-icon.svg">
        <p class="navbar-text">Horror</p>
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/immersive-sim-icon.svg">
        <p class="navbar-text">Imm-sim</p>        
    </div>      
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/open-world-icon.svg">
        <p class="navbar-text">Open-world</p>
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/platformer-icon.svg">
        <p class="navbar-text">Platformer</p>
    </div>    
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/racing-icon2.svg">
        <p class="navbar-text">Racing</p>
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/rpg-icon.svg">
        <p class="navbar-text">RPG</p>        
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/shooter-icon.svg">
        <p class="navbar-text">Shooter</p>
    </div>
    <div class="navbar-containers">
        <img class="navbar-icons" src="/games-finder/public/assets/img/icons/simulation-icon.svg">
        <p class="navbar-text">Simulations</p>
    </div>    
</nav> 

<main>
    <div class="games-grid container text-center">
    <?php
        $displayReview = 'handleReviewColor';
        $i = 0; 
        while ($i < $gamesAmount) {
            $i2 = $i + 1;
            $i3 = $i + 2;
            $reviewHtml1 = handleReviewColor($review[$i]);
            $reviewHtml2 = handleReviewColor($review[$i2]);
            $reviewHtml3 = handleReviewColor($review[$i3]);
            echo 
            <<<HTML
                <div role="list" class="row row-cols-3">
                    <div role="listitem" class="games-grid-containers col">
                        <img class="game-img shadow rounded " src="$img_path[$i]">
                        <div class="game-grid-sub-containers d-flex flex-row justify-content-between">
                            <p class="game-review">$reviewHtml1 </p>
                            <!-- <div class="col game-price"><p>$price[$i]$</p></div> -->
                            <p class="game-genre">$genre[$i]</p>
                        </div>
                        <!-- <p class="game-titles">$name[$i]</p> -->
                        <!-- <p class="game-genre">$genre[$i]</p> -->
                    </div>
                    <div role="listitem" class="games-grid-containers col">
                        <img class="game-img shadow rounded " src="$img_path[$i2]">
                        <div class="game-grid-sub-containers d-flex flex-row justify-content-between">
                            <p class="game-review">$reviewHtml2 </p>
                            <!-- <div class="col game-price"><p>$price[$i2]$</p></div> -->
                            <p class="game-genre">$genre[$i2]</p>
                        </div>
                        <!-- <p class="game-titles">$name[$i2]</p> -->
                        <!-- <p class="game-genre">$genre[$i2]</p> -->
                    </div>
                    <div class="games-grid-containers col">
                        <img class="game-img shadow rounded " src="$img_path[$i3]">
                        <div role="listitem" class="game-grid-sub-containers d-flex flex-row justify-content-between">
                            <!-- <div class="col game-price"><p>$price[$i3]$</p></div> -->
                            <p class="game-review">$reviewHtml3 </p>
                            <p class="game-genre">$genre[$i3]</p>
                        </div>
                        <!-- <p class="game-titles">$name[$i3]</p> -->
                        <!-- <p class="game-genre">$genre[$i3]</p> -->
                    </div>
                </div>            
            HTML;
            $i += 3;
        }
    ?>
    </div>
</main>









    <!-- <div class="games-grid container text-center">
        <div class="row row-cols-3">
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/games/the-witcher-3-wild-hunt.jpeg">
                <p class="game-titles ">#item 1</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 2</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 3</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
        </div>        
        <div class="row row-cols-3">
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 5</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 6</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 7</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
        </div>        
        <div class="row row-cols-3">
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 9</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 10</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
            <div class="games-grid-containers col">
                <img class="game-img" src="/games-finder/public/assets/img/example.jpeg">
                <p class="game-titles ">#item 11</p>
                <div class="game-grid-sub-containers row row-cols-2">
                    <div class="col"><p class="game-price">#Price</p></div>
                    <div class="game-review col">#Review</div>
                </div>
            </div>
        </div>
    </div>
</main> -->


<?php
include $ROOT.'/games-finder/src/includes/footer.php';
?>