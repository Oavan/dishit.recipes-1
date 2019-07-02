<?php include('views/header.php'); ?>

<div id="main" >
	<div id="content">
		<p><b><?php echo isset($loginMessage)?$loginMessage:"" ?></b></p>
		<form method="post" class="formStyle" action="" >
			<input type="hidden" name="action" value="login">
			<label for="txtUsername" class="label">Username</label>
			<input type="text" id="txtUsername" name="username" value="<?php echo isset($_REQUEST['username'])? $_REQUEST['username']: "" ?>">
			<br>
			<label for="txtPassword" class="label">Password</label>
			<input type="password" id="txtPassword" name="password">
			<br>
			<button type="submit" id="btnLogin" name="btnLogin">Login</button>
		</form>
	</div>
</div>

<?php include('views/footer.php'); ?>