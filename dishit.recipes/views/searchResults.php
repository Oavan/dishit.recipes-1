<?php include('header.php'); ?>

<div class="form-wrapper" style="max-width:700px;margin:auto;">
    <form class="uk-search" id='search' method="get" action=".">
        <ul><input type='hidden' name='action' value='searchResults'; ?>
        <input class="uk-search-input uk-form-width-large uk-form-large" type="text" name="Keywords" placeholder="Search by Recipes, Ingredients, or Users">
         <input  type="submit" value="Search"> </ul>
    </form>
</div>

<div class="uk-panel-box uk-margin-left uk-margin-right" >
    <div class="uk-text-bold"><?php echo $num_results  ?> Search Results</div>

    <?php foreach ($recipes as $recipe) : ?>
        <ul><a href='?action=recipeDetails&id=<?php echo $recipe['id']; ?>'>
                <?php echo $recipe['title'];?> </a> by <?php echo $recipe['username']."<br>"; ?>
            <?php echo $recipe['description']; ?>
        </ul>
    <?php endforeach; ?>
</div>
