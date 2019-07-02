<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

<script type="text/javascript" src="javascript/donors.js"></script>
<script type="text/javascript" src="javascript/toTitleCase.js"></script>
<script type="text/javascript" src="javascript/formatPhone.js"></script>


<div id="main">
    <?php if($details<>"") extract($details); ?>
    <form class='formStyle' id='frmDetails' method='post' action='.'>
        <input type='hidden' name='action'
               value='<?php echo ($action=='commentNew' or $action=='commentSaveNew')?'commentSaveNew':'commentUpdate'; ?>'>
        <input type='hidden' name='user_id' value='<?php echo(isset($user_id))?$user_id:"" ?>'>
        <input type='hidden' name='recipe_id' value='<?php echo(isset($recipe_id))?$recipe_id:"" ?>'>

        <label for='txtComment'>Comment:</label>
        <textarea name="comment" id="txtComment" rows="5" cols="50"></textarea>
        <img src="images/Error.gif" id="errComment"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['description']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['comment'])) ? $errors['comment']:""; ?>"
        >
        <br>

        <label>&nbsp;</label>
        <button type='reset' id='btnReset'><img src='images/undo.gif'> Reset</button>
        <button type='submit' id='btnSave' name='btnSave'><img src='images/save.gif'> Save</button>
        <button type='submit' id='btnCancel' name='btnCancel'><img src='images/list.gif'>Cancel</button>

    </form>
</div>

<?php include('views/footer.php'); ?>