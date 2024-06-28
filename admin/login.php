<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require_once("../database/db_connection.php");
checkLoginAtLogin();

if (isset($_POST['btnLogin'])) {
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	$checkUsername = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
	if ($data = mysqli_fetch_assoc($checkUsername)) {
		if (password_verify($password, $data['password'])) {
			$_SESSION = [
				'id_user' => $data['id_user'],
				'username' => $data['username']
			];
			header("Location: index.php");
		} else {
			setAlert("Login Failed!", "Incorrect username or password!", "error");
			header("Location: login.php");
		}
	} else {
		setAlert("Login Failed!", "Username not found!", "error");
		header("Location: login.php");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include '../include_admin/css.php'; ?>
	<title>Login Administrator</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			min-height: 100vh;
			background-size: cover;
			background-repeat: no-repeat;
			background-image: url(../assets/img/img_properties/bg-login.jpeg);
		}

		.container {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -55%);
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 mx-5 py-4 px-5 text-dark rounded border border-dark" style="background-color: rgba(180,190,196,.6);">
				<h2 class="text-center">Welcome</h2>
				<h3 class="text-center">at Backstage</h3>
				<form method="post">
					<div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input required class="form-control rounded-pill" type="text" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input required class="form-control rounded-pill" type="password" name="password" id="password">
					</div>
					<div class="form-group">
						<a href="../index.php" class="btn btn-info rounded-pill text-left"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
						<button class="btn btn-success rounded-pill float-right" type="submit" name="btnLogin"><i class="fas fa-fw fa-sign-in-alt"></i> Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
		<div style="background-color: transparent;" class="container-fluid mt-5">
			<div class="row justify-content-center">
				<div class="col-lg text-center text-white pt-4 pb-2">
					<p>&copy; Copyright 2024 Movie Hunter All Right Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>