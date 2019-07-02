<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>
<div id="main" >
	<div id="content">
		<h1><?php echo $recipe['title']?></h1>
        <h2>By: <?php echo $recipe['username'] ?></h2>
        <h3>Description</h3>
        <?php echo $recipe['description']?><br/>
        <h3>Ingredients</h3>
        <?php echo $recipe['ingredients']?><br/>
        <h3>Directions</h3>
        <?php echo $recipe['directions']?><br/><br/>
        Modified: <?php echo $recipe['modified']?><br/>
	</div><br/>

    <!-- only provide ability to rate if user is logged in -->
    Overall Rating: <?php echo calculateRecipeRating($_REQUEST['id']) ?><br/>
    <?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true ) { ?>
        Your Rating: <?php echo getUserRating($_REQUEST['id'])['rating'] ?><br/>
        <form class='formStyle' id='frmRating' method='post' action='.'>
            <input type='hidden' name='action' value='rateRecipe'; ?>
            <input type='hidden' name='user_id' value='<?php echo (isset($_SESSION['user_id']))?$_SESSION['user_id']:"" ?>'>
            <input type='hidden' name='recipe_id' value='<?php echo $_REQUEST['id'] ?>'>
            <select name="rating" id='lstRating'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br/>
            <button type='submit' id='btnSave' name='btnSave'><img src='images/save.gif'> Save</button>
        </form>
    <?php } ?>

    <h3>Comments:</h3>
    <?php foreach ($comments as $comment){ ?>
        <h4><?php echo $comment['username'] ?></h4>
        Modified: <?php echo $comment['modified'] ?><br/>
        <?php echo $comment['comment'] ?> <br/>
    <?php } ?> <br/>

    <!-- only allow ability to comment if logged in -->
    <?php if(isset($_SESSION['authorizedUser']) and $_SESSION['authorizedUser'] == true ) { ?>
        <a href=".?action=commentNew&recipe_id=<?php echo $_REQUEST['id']?>">New Comment</a>
    <?php } ?>
</div>
<?php include('views/footer.php'); ?>