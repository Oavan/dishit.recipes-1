<?php
    require('model/users.php');
    require('model/recipes.php');
    require('model/comments.php');
    require('model/ratings.php');
    include('model/connect_db.php');

    $lifetime = 60 * 60;  //Measured in seconds
    session_set_cookie_params($lifetime,'/');
    session_start();

    // debugging output

    echo '<br><br>$_SESSION = <pre>';
    print_r($_SESSION);
    echo "</pre>\n" . '$_REQUEST = <pre>';
    print_r($_REQUEST);
    echo '</pre>';

    // look to the request array for an action, or go to the recipe list
    if (isset($_REQUEST['action']))
        $action=$_REQUEST['action'];
    else
        $action='recipeList';
    //end if


// TODO: move more of the functionality into the models
    switch($action){
        case 'login':
            $username = (isset($_REQUEST['username']))?$_REQUEST['username']:"";
            $password = (isset($_REQUEST['password']))?$_REQUEST['password']:"";
            if(isAuthorizedUser($username, $password)) {
                $_SESSION['authorizedUser'] = true;
                $_SESSION['user_id'] = getUserID($username);
                $recipes = getRecipeList();
                include('views/recipeList.php');
            } else {
                if($username=="")
                    $loginMessage = "You must login to access this website.";
                else
                    $loginMessage = "<span style='color:red';>Invalid username or password.</span>";
                //end if
                include('views/login.php');
            } // end-if
            break; // end login
        case 'logout':
            $_SESSION['authorizedUser'] = false;
            $_SESSION['user_id'] = null;
            $recipes = getRecipeList();
            include('views/recipeList.php');
            break; // end logout
        case 'recipeList':
            $recipes = getRecipeList();
            include('views/recipeList.php');
            break; // end recipeList
        case 'recipeDetails':
            $recipe = getRecipeDetails($_REQUEST['id']);
            $comments = getComments($_REQUEST['id']);
            include('views/recipeDetails.php');
            break; // end recipeDetails
        case 'recipeUpdate':
        case 'recipeNew': // triggered by new recipe link
            // add check to only allow this when user is logged in
            if(isset($_REQUEST['recipe_id']))
            {
                $recipeDetails = getRecipeDetails($_REQUEST['recipe_id']);
            }
            $details = $_REQUEST;
            include('views/recipeEntry.php');
            break; //end recipeNew
        case 'recipeSaveNew': // triggered by save recipe
        case 'recipeSaveUpdate':
            switch(true){ // determine if save or cancel was selected
                case isset($_REQUEST['btnCancel']):
                    header("Location: .");
                    break;
                case isset($_REQUEST['btnSave']):
                    $errors = array(); #$validateRecipeInputs();
                    echo "btnSave";
                    if(count($errors)==0) {
                        if ($action == 'recipeSaveUpdate') {
                            $lastID = updateRecipe($_REQUEST['recipe_id']);
                            header("Location: .?action=recipeDetails&id=" . $_REQUEST['recipe_id']);
                        } else {
                            $lastID = insertRecipe();
                            header("Location: .?action=recipeDetails&id=" . $lastID);
                        }
                    }
            }
            break; // end recipeSaveNew, recipeUpdate
        case 'commentNew': // triggered by New Comment Link
            $details = $_REQUEST;
            include('views/commentEntry.php');
            break; // end commentNew
        case 'commentSaveNew': // triggered by save button
        case 'commentUpdate':
            switch(true){ // determine if save or cancel was selected
                case isset($_REQUEST['btnCancel']):
                    header("Location: .");
                    break;
                case isset($_REQUEST['btnSave']):
                    $errors = array(); #$validateRecipeInputs();
                    if(count($errors)==0) {
                        if ($action == 'commentUpdate') {
                            updateComment();
                            header("Location: .?action=recipeDetails&id=" . $_REQUEST['recipe_id']);
                        } else {
                            insertComment();
                            header("Location: .?action=recipeDetails&id=" . $_REQUEST['recipe_id']);
                        }
                    }
            } // end commentSaveNew, commentUpdate
        case 'rateRecipe':
            rateRecipe($_REQUEST['recipe_id'], $_REQUEST['rating']);
            header("Location: .?action=recipeDetails&id=" . $_REQUEST['recipe_id']);
            break; // end rateRecipe
        case 'register':
            include('views/registerUser.php');
            break; // end register
        case 'registerSave':
            // check for PW match and go to recipe list, else return to try again
            echo 'registerSave';
                $id = registerUser($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['passwordConfirm'],$_REQUEST['email']);
                if($id <> 0){
                    $_SESSION['authorizedUser'] = true;
                    $_SESSION['user_id'] = $id;
                    header("Location: .");
                } else { echo "fail"; } // need to deal with failure also
            break;
        case 'manageaccount' :
            $recipes = getuserrecipes($_SESSION['user_id']);
            include('views/manageuser.php');






            break;
    }