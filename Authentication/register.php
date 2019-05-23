<?php
session_start();

//connect to database
$db = mysqli_connect("localhost", "root", "", "authentication");

if (isset($_POST['register_btn'])) {

	$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
	/*$username = mysqli_real_escape_string($_POST['username']);
	$email = mysqli_real_escape_string($_POST['email']);
	$password = mysqli_real_escape_string($_POST['password']);
	$password2 = mysqli_real_escape_string($_POST['password2']);*/

	if ($password == $password2) {
		// create user

		//$password = md5($password); // hash password before storing for securing purposes
			$sql = "INSERT INTO users (username,email,password) values('$username','$email','$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "you are now loggin in";
			$_SESSION['username'] = $username;
			header("location: login.php");  //redirect to home page
	}else {
		$_SESSION['message'] = "The two password do not match";
	}
}
?>





<!DOCTYPE html>
<html>
<head>
	<title>Gal GAdot</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="intro">
	<div class="header">
		<h1>Welcome to the website of Gal Gadot</h1>
	</div>

	<form method="post" action="register.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>

			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" class="textInput"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>

			<tr>
				<td>Confirm Password</td>
				<td><input type="password" name="password2" class="textInput"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="register_btn" value="Register"></td>
			</tr>

		</table>

	</form>

</body>
</html>