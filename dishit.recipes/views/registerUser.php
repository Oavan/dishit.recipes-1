<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

    <script type="text/javascript" src="javascript/toTitleCase.js"></script>
    <script type="text/javascript" src="javascript/formatPhone.js"></script>


    <div id="main">
        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 750px;">
                <form class="uk-panel uk-panel-box uk-form" id='frmDetails' method='post' action='.'>
                    <input type='hidden' name='action' value='registerSave'>

                    <div class="uk-margin-top">
                        <label for='txtUsername'>Username: </label>
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" name="username" id="txtUsername" rows="5" cols="50">
                    </div>
                    <img src="images/Error.gif" id="errUsername"
                         width="14" height="14" alt="Error icon"
                         style="visibility: <?php echo (isset($errors['description']))? "visible;": "hidden;"; ?>"
                         title=" <?php echo (isset($errors['username'])) ? $errors['username']:""; ?>"
                    >
                    <div class="uk-form-row">
                        <label for="txtEmail" class="label">Email</label>
                        <input class="uk-width-1-1 uk-form-large" id="txtEmail" name="email">
                    </div>

                    <div class="uk-form-row">
                        <label for="txtPassword" class="label">Password</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" id="txtPassword" name="password">
                    </div>
                    <div class="uk-form-row">
                        <label for="txtPasswordConfirm" class="label">Confirm Password</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" id="txtPasswordConfirm" name="passwordConfirm">
                    </div>
                    <div class="uk-form-row">
                        <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large uk-icon-save" type='submit' id='btnSave' name='btnSave'> Save</button>
                    </div>

                    <div class="uk-form-row">
                        <button class="uk-width-1-1 uk-button uk-button-danger uk-button-large uk-icon-save" type='submit' id='btnCancel' name='btnCancel'> Cancel</button>
                    </div>
                </form>
            </div>

<?php include('views/footer.php'); ?>