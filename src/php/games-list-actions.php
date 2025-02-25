<?php
require_once __DIR__ . '/db-functions.php';


// *** Functions ***

// Function used exclusively in filterByGenre, return clean string of the genre to filter 
function _genreMatchesFilter($genreString, $filter)
{
    $cleanedGenre = strtolower(trim($genreString));

    if (str_contains($cleanedGenre, " ")) {
        $twoGenreArr = explode(" ", $cleanedGenre);
        return ($twoGenreArr[0] === $filter || $twoGenreArr[1] === $filter);
    } else {
        return ($cleanedGenre === $filter);
    }
}

// Function used to filter t
function filterByGenres($filter, $gamesDict)
{
    $name = $gamesDict[0];
    $genre = $gamesDict[2];
    $review = $gamesDict[4];
    $imgPath = $gamesDict[5];

    $genreConst = $gamesDict[2];
    $len = count($genreConst);

    for ($i = $len - 1; $i >= 0; $i--) {
        if (! _genreMatchesFilter($genreConst[$i], $filter)) {
            array_splice($genre, $i, 1);
            array_splice($name, $i, 1);
            array_splice($review, $i, 1);
            array_splice($imgPath, $i, 1);
        }
    }
    $filteredGamesDict = [$name, $genre, $review, $imgPath];

    return $filteredGamesDict;
}

// Handle dynamically changing the color of review text to match the score.
function handleReviewColor($reviewScore)
{
    if ($reviewScore >= 90) {
        $reviewHtml = "<span class=\"game-review-cl--green\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    } else if ($reviewScore > 70) {
        $reviewHtml = "<span class=\"game-review-cl--lightgreen\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    } else if ($reviewScore >= 50) {
        $reviewHtml = "<span class=\"game-review-cl--lightgreen\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    } else {
        $reviewHtml = "<span class=\"game-review-cl--red\"><i class=\"review-icon ph-fill ph-star\"></i> ";
    }
    $res = $reviewHtml . $reviewScore . '/100</span>';
    return $res;
}


/** -- Handle extracting and processing games infos from db to use to display games list -- */

$gamesList = getDbTable('games');

// Create empty array to store table columns
$nameArr = [];
$descArr = [];
$genreArr = [];
$priceArr = [];
$reviewArr = [];
$imgDataAttributeArr = [];

// Store table infos in arrays representing columns 
foreach ($gamesList as $dict) {
    foreach ($dict as $key => $item) {
        switch ($key) {
            case "name":
                $nameArr[] = $item;
                break;
            case "description":
                $descArr[] = $item;
                break;
            case "genre":
                $genreArr[] = $item;
                break;
            case "price":
                $priceArr[] = $item;
                break;
            case "review":
                $reviewArr[] = $item;
                break;
            case "image_data_attribute":
                $imgDataAttributeArr[] = $item;
                break;
        }
    }
}

// Put these arrays back in a dictionnary
$gamesDict = [$nameArr, $descArr, $genreArr, $priceArr, $reviewArr, $imgDataAttributeArr];

// Get the gamesFilter value from session
$gamesListFilterValue = $_SESSION['gamesListGenreFilter'] ?? '';
$gamesFilterText = ucfirst($gamesListFilterValue);

if ($gamesListFilterValue !== 'all' and $gamesListFilterValue) {
    $filteredGamesDict = filterByGenres($gamesListFilterValue, $gamesDict);
    // Remove from sessions since filter are to be executed after btn press
    $gamesFilterText = ucfirst($gamesListFilterValue);;
    $gamesListFilterValue = '';
}
