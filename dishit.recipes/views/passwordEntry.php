<?php include('views/header.php'); ?>
<?php include('views/menubar.php'); ?>

    <script type="text/javascript" src="javascript/toTitleCase.js"></script>
    <script type="text/javascript" src="javascript/formatPhone.js"></script>


    <div id="main">
        <?php if($details<>"") extract($details); ?>
        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 750px;">

                <form class="uk-panel uk-panel-box uk-form" id='frmDetails' method='post' action='.'>
                    <input type='hidden' name='action' value='passwordUpdate'>

                    <div class="uk-form-row">
                        <label for="txtCurrentPassword" class="label">Current Password</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" id="txtPassword" name="enteredPassword">
                    </div>
                    <div class="uk-form-row">
                        <label for="txtNewPassword" class="label">New Password</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" id="txtPassword" name="passwordNew">
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

                    <div class="uk-form-row">
                        <button class="uk-width-1-1 uk-button uk-button-secondary uk-button-large uk-icon-undo" type='reset' id='btnReset'> Reset</button>
                    </div>
                </form>
            </div>

<?php include('views/footer.php'); ?>