<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Dish-It</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/css/uikit.almost-flat.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Fugaz+One&amp;display=swap'>

    <link rel="stylesheet" href="./style.css">


</head>

<body>

<!--Ref: https://getuikit.com/-->

<!--top navigation bar-->
<div>
    <nav style="background-color:orange;" class="uk-navbar-container uk-margin" uk-navbar>
        <div class="uk-navbar-flip">
            <ul class="uk-navbar-nav uk-margin uk-margin-top">
                <?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true ) { ?>
                    <li class=""><a href=".?action=recipeNew"><i class="uk-icon-plus-circle"></i> New Recipe</a></li>
                    <li class=""><a href=".?action=manageaccount"><i class="uk-icon-user"></i> Manage Account: <?php echo getUserName($_SESSION['user_id']) ?></a></li>
                    <li class=""><a href=".?action=logout">Logout</a></li>
                <?php }else{ ?>
                    <li class=""><a href=".?action=register">Sign Up</a></li>
                    <li class=""><a href=".?action=login">Login</a></li>
                <?php } ?>
            </ul>
        </div
        <div id="title">
            <ul class="uk-navbar-nav uk-margin uk-margin-left">
                <li ><a id="title" href="index.php">Dish-It</a></li>
                <li class="uk-margin-large-left"><a href=".?action=recipeList">Browse Recipes</a></li>
    </nav>
</div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/2.18.0/js/uikit.min.js'></script>




</body>

</html>
