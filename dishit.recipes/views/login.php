<?php include('views/header.php'); ?>

<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 250px;">
        <img class="uk-margin-bottom" width="140" height="120" src="images/Dish_It_Logo.PNG" alt="can add an image here">
        <p><b><?php echo isset($loginMessage)?$loginMessage:"" ?></b></p>
		<form method="post" class="uk-panel uk-panel-box uk-form" >
            <div class="uk-form-row">
                <input type="hidden" name="action" value="login">
                <label for="txtUsername" class="label">Username</label>
                <input class="uk-width-1-1 uk-form-large" type="text" id="txtUsername" name="username" value="<?php echo isset($_REQUEST['username'])? $_REQUEST['username']: "" ?>">
            </div>

            <div class="uk-form-row">
            <label for="txtPassword" class="label">Password</label>
			        <input class="uk-width-1-1 uk-form-large" type="password" id="txtPassword" name="password">
            </div>

            <div class="uk-form-row">
            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit" id="btnLogin" name="btnLogin">Login</button>
            </div>
        </form>
	</div>
</div>

<?php include('views/footer.php'); ?>