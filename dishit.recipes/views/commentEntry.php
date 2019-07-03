<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

<script type="text/javascript" src="javascript/donors.js"></script>
<script type="text/javascript" src="javascript/toTitleCase.js"></script>
<script type="text/javascript" src="javascript/formatPhone.js"></script>


<div id="main">
    <?php if($details<>"") extract($details); ?>
    <div class="uk-vertical-align uk-text-center uk-height-1-1">
        <div class="uk-vertical-align-middle" style="width: 750px;">
            <form class="uk-panel uk-panel-box uk-form" id='frmDetails' method='post' action='.'>
                <input type='hidden' name='action'
               value='<?php echo ($action=='commentNew' or $action=='commentSaveNew')?'commentSaveNew':'commentUpdate'; ?>'>
        <input type='hidden' name='user_id' value='<?php echo(isset($user_id))?$user_id:"" ?>'>
        <input type='hidden' name='recipe_id' value='<?php echo(isset($recipe_id))?$recipe_id:"" ?>'>

                <div class="uk-margin-top uk-float-left">
                    <label for='txtComment'>Comment: </label>
                </div>
                    <div class="uk-form-row">
                    <textarea class="uk-width-1-1 uk-form-large" name="comment" id="txtComment" rows="5" cols="50"></textarea>
                    </div>
        <img src="images/Error.gif" id="errComment"
             width="14" height="14" alt="Error icon"
             style="visibility: <?php echo (isset($errors['description']))? "visible;": "hidden;"; ?>"
             title=" <?php echo (isset($errors['comment'])) ? $errors['comment']:""; ?>"
        >

                <div class="uk-form-row">
                    <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large uk-icon-save" type='submit' id='btnSave' name='btnSave'> Save</button>
                </div>

                <div class="uk-form-row">
                    <button class="uk-width-1-1 uk-button uk-button-danger uk-button-large uk-icon-save" type='submit' id='btnCancel' name='btnCancel'> Cancel</button>
                </div>

                <div class="uk-form-row">
                <button class="uk-width-1-1 uk-button uk-button-secondary uk-button-large uk-icon-undo" type='reset' id='btnReset'> Reset</button>
                </div>

    </form>
</div>

<?php include('views/footer.php'); ?>