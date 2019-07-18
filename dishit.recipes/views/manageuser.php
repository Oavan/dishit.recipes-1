<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

<div class="uk-panel-box uk-margin-left uk-margin-right">
    <div class="uk-text-bold">Account Details</div>
    <ul> Email :    <?php echo $email ; ?> <br>
        Username:  <?php echo $username; ?> <br>
        Member Since: <?php echo $createdDate; ?> <br>


        <button class="uk-button  uk-button-secondary"><a   href=".?action=newPassword&user_id=<?php echo $_SESSION['user_id']?>"> Update Password</button></a>

    </ul>
</div>



<div class="uk-panel-box uk-margin-left uk-margin-right" xmlns="http://www.w3.org/1999/html">
    <div class="uk-text-bold">Recipes</div>
    <?php foreach ($recipes as $recipe) : ?>
        <ul><a href='?action=recipeDetails&id=<?php echo $recipe['id']; ?>'>
                <?php echo $recipe['title']; ?>
            </a></ul>
    <?php endforeach; ?>
</div>
