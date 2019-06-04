<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="public/app-assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/app-assets/css/login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body id="LoginForm">
	<div class="container">
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<h2>Admin Login</h2>
					<p>Please enter your ID and password</p>
				</div>
				<?php 
        			if (isset($_COOKIE['msg'])) {
    			?>
    				<div class="alert alert-danger"><?php echo $_COOKIE['msg']; ?></div>
			    <?php        
				       }
			    ?>
				<form id="Login" method="POST" action="?mod=login&act=login">
					<div class="form-group">
						<input type="text" class="form-control" id="inputEmail" placeholder="ID" name="code">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
					</div>
					<!-- <div class="forgot">
						<a href="reset.html">Forgot password?</a>
					</div> -->
					<button type="submit" class="btn btn-primary" name="submit">Login</button>

				</form>
			</div>
			<p class="botto-text"> Designed by HuyenMinnn</p>
		</div>
	</div>
</body>
</html>
