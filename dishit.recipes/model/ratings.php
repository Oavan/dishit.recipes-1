<?php
function getUserRating($recipe_id) {
    global $db;

    $query = "Select rating from ratings where user_id=:user_id and recipe_id=:recipe_id";

    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':recipe_id', $recipe_id);
    //Parameters processed here
    $statement->execute();

    $results = $statement->fetch();

    $statement->closeCursor();

    return $results;
}//end getUserRating

function insertRating($recipe_id, $rating){
    global $db;

    extract($_REQUEST);

    $query = "INSERT INTO ratings(user_id,recipe_id,rating,created,modified) 
                                values (
                                    :user_id,
                                    :recipe_id,
                                    :rating,
                                    NOW(),
                                    NOW())"; // approve by default for testing
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':recipe_id', $recipe_id);
    $statement->bindValue(':rating', $rating);

    $statement->execute();
    $statement->closeCursor();

    return $statement->rowCount();
} //end insertRating

function updateRating($recipe_id, $rating){
    global $db;

    extract($_REQUEST);

    $query = "UPDATE RATINGS SET rating=:rating, modified=NOW()
                WHERE recipe_id=:recipe_id and user_id=:user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $_SESSION['user_id']);
    $statement->bindValue(':recipe_id', $recipe_id);
    $statement->bindValue(':rating', $rating);

    $statement->execute();
    $statement->closeCursor();

    // return the recipe_id or the rowCount if add is unsuccessful
    return $statement->rowCount();

} //end updateRating


function rateRecipe($recipe_id, $rating){
    $current_rating = getUserRating($recipe_id);
    // if empty then insert new
    if($current_rating) {
        updateRating($recipe_id, $rating); // doesn't seem to work
    } else{
        insertRating($recipe_id, $rating);
    }
    return getUserRating($recipe_id);
} // end rateRecipe