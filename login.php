<!DOCTYPE html>
<?php require_once('functions.php'); ?>
<html lang="en">
<head>
    <title>Login - ANS</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
</head>
<body>

	<div class="container">


		<form class="form-signin" method="POST">
			<?php get_alert('login_user'); ?>

			<input type="hidden" name="action" value="login_user">

			<h2 class="form-signin-heading">Sign in to continue</h2>

			<label for="username" class="sr-only">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>

			<label for="password" class="sr-only">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>

	</div> <!-- /container -->

	<script src="js/bootstrap.min.js" type="text/javascript" />
</body>
</html>
