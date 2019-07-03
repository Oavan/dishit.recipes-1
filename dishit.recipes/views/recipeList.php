<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

    <div class="uk-panel-box uk-margin-left uk-margin-right" xmlns="http://www.w3.org/1999/html">
        <div class="uk-text-bold">Recipes</div>
        <?php foreach ($recipes as $recipe) : ?>
            <ul><a href='?action=recipeDetails&id=<?php echo $recipe['id']; ?>'>
                    <?php echo $recipe['title']; ?>
                </a></ul>
        <?php endforeach; ?>
    </div>
<br>



    <div id="browseBy">
        <br style=“line-height:556;”>
        <br style = “line-height:100px;”>
        For future implementation...
        <ul class=" uk-margin-left uk-margin-right uk-margin-large-top uk-thumbnav uk-thumbnav-vertical uk-grid-width-1-3">

            <li class=""><a class="uk-thumbnail" href=""><div class="uk-thumbnail-caption">Browse by Recipes</div><img src="https://pilarny.com/wp-content/uploads/2016/12/a62a9ae030a424ce5ae51cf9a80af246-compressor.jpg" alt=""></a></li>

            <li class="uk-margin"><a  class="uk-thumbnail" href=""><div class="uk-thumbnail-caption">Browse by Ingredients</div> <img src="https://www.foodbusinessnews.net/ext/resources/TopicLandingPages/Product-Development-Ingredient-Applications.jpg?1519144948" alt="">
                </a></li>

            <div><li class="uk-margin"><a class="uk-thumbnail" href=""><div class="uk-thumbnail-caption">Browse by Meal</div> <img src="https://s.hswstatic.com/gif/three-meals-daily-orig.jpg" alt="">
                    </a></li></div>
        </ul>
    </div>


<?php include('views/footer.php'); ?>