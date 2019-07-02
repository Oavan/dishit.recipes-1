<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

<script type="text/javascript" src="javascript/donors.js"></script>
<script type="text/javascript" src="javascript/toTitleCase.js"></script>
<script type="text/javascript" src="javascript/formatPhone.js"></script>


<div id="main">
    <?php if($details<>"") extract($details); ?>

    <form class='formStyle' id='frmDetails' method='post' action='.'>
        <input type='hidden' name='action'
               value='<?php echo ($action=='recipeNew' or $action=='recipeSaveNew')?'recipeSaveNew':'recipeUpdate'; ?>'>
        <input type='hidden' name='user_id' value='<?php echo(isset($user_id))?$user_id:"" ?>'>

        <?php $title = (isset($title))?$title:"" ?>
        <label for='txtTitle'>Title:</label>
        <input type='text' name='title' id='txtTitle' size='50'
               value="<?php echo $title; ?>">
        <img src="images/Error.gif" id="errTitle"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['title']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['title'])) ? $errors['title']:""; ?>"
        >
        <br>

        <label for='txtDescription'>Description:</label>
        <textarea name="description" id="txtDescription" rows="5" cols="50"><?php echo $description?></textarea>
        <img src="images/Error.gif" id="errDescription"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['description']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['description'])) ? $errors['description']:""; ?>"
        >
        <br>

        <label for='txtIngredients'>Ingredients:</label>
        <textarea name="ingredients" id="txtIngredients" rows="5" cols="50"><?php echo $ingredients?></textarea>
        <img src="images/Error.gif" id="errIngredients"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['ingredients']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['ingredients'])) ? $errors['ingredients']:""; ?>"
        >
        <br>

        <label for='txtDirections'>Directions:</label>
        <textarea name="directions" id="txtDirections" rows="5" cols="50"><?php echo $directions?></textarea>
        <img src="images/Error.gif" id="errDirections"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['directions']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['directions'])) ? $errors['directions']:""; ?>"
        >
        <br>

        <label>&nbsp;</label>
        <button type='reset' id='btnReset'><img src='images/undo.gif'> Reset</button>
        <button type='submit' id='btnSave' name='btnSave'><img src='images/save.gif'> Save</button>
        <button type='submit' id='btnCancel' name='btnCancel'><img src='images/list.gif'>Cancel</button>

    </form>
</div>

<?php include('views/footer.php'); ?>