<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>
<div id="main" >
	<div id="content">
            <div class="uk-panel uk-margin-left uk-margin-right">
                <div class="uk-panel uk-panel-box">
                <h1><?php echo $recipe['title']?></h1>
                    <p>By: <?php echo $recipe['username'] ?></p>
    Overall Rating: <?php echo calculateRecipeRating($_REQUEST['id']) ?><br/>
<?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true and isRecipeOwner($_SESSION['user_id'],$recipe['user_id']) ) { ?>
                    <form class='formStyle' id='update' method='post' action='.'>
                        <input type='hidden' name='action' value='recipeUpdate'; ?>
                        <input type='hidden' name='user_id' value='<?php echo (isset($_SESSION['user_id']))?$_SESSION['user_id']:"" ?>'>
                        <input type='hidden' name='recipe_id' value='<?php echo $_REQUEST['id'] ?>'>
                        <button class="uk-button uk-button-primary" type='submit' id='btnUpdate' name='btnUpdate'><img src='images/save.gif'> Update</button>
                    </form>
    <?php } ?>

                </div>
        <h3 class="uk-text-bold">Description</h3>
        <?php echo $recipe['description']?>
        <h3 class="uk-text-bold">Ingredients</h3>
        <?php echo $recipe['ingredients']?>
        <h3 class="uk-text-bold">Directions</h3>
        <?php echo $recipe['directions']?><br/><br/>
        Modified: <?php echo $recipe['modified']?><br/>

            </div>
        </div>
    </div>
    </div>

    <div class="uk-panel uk-panel-box uk-margin-left uk-margin-right">
    <!-- only provide ability to rate if user is logged in -->
    <?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true ) { ?>
        Your Rating: <?php echo getUserRating($_REQUEST['id'])['rating'] ?><br/>
        <form class='formStyle' id='frmRating' method='post' action='.'>
            <input type='hidden' name='action' value='rateRecipe'; ?>
            <input type='hidden' name='user_id' value='<?php echo (isset($_SESSION['user_id']))?$_SESSION['user_id']:"" ?>'>
            <input type='hidden' name='recipe_id' value='<?php echo $_REQUEST['id'] ?>'>
            <div class="uk-float-left uk-width-1-1 uk-form-select">
            <select class="uk-width-1-4" name="rating" id='lstRating'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></div><br/>
            <button class="uk-button uk-button-primary" type='submit' id='btnSave' name='btnSave'><img src='images/save.gif'> Save</button>
        </form>
    <?php } ?>
    </div>

    <div class="uk-panel uk-panel-box uk-margin-left uk-margin-right">
    <h3>Comments:</h3>
    <div class="uk-comment uk-comment-primary">
    <?php foreach ($comments as $comment){ ?>
        <h4><?php echo $comment['username'] ?></h4>
        <?php echo $comment['comment'] ?> <br/>
        <div class="uk-text-muted">
        Modified: <?php echo $comment['modified'] ?><br/>
        ------------------------------------------</div>
    <?php } ?>
        </div>

        <br/>

    <!-- only allow ability to comment if logged in -->
    <?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true ) { ?>
    <button class="uk-button  uk-button-secondary"><a class=" uk-icon-comment"  href=".?action=commentNew&recipe_id=<?php echo $_REQUEST['id']?>">  New Comment</button></a>
    <?php } ?>
    </div>



<?php include('views/footer.php'); ?>