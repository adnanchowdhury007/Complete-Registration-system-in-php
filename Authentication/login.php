<?php
session_start();

//connect to database
$db = mysqli_connect("localhost", "root", "", "authentication");

if (isset($_POST['login_btn'])) {

	$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($db, $sql);


if(mysqli_num_rows($result)>0) {
	$_SESSIOn['message'] = "You are logged in";
	$_SESSIOn['username'] = $username;
	header("location: home.php"); //redirect to home page
}else {
	$_SESSION['message'] = "username/password is incorrect";
}

}
	/*$username = mysqli_real_escape_string($_POST['username']);
	$email = mysqli_real_escape_string($_POST['email']);
	$password = mysqli_real_escape_string($_POST['password']);
	$password2 = mysqli_real_escape_string($_POST['password2']);*/

	//$password = md5($password); // hash password before 

?>





<!DOCTYPE html>
<html>
<head>
	<title>Gal GAdot</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="intro1">
	<div class="header">
		<h1>Please Login Here</h1>
	</div>

	<form method="post" action="login.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="login_btn" value="login"></td>
			</tr>

		</table>

	</form>

</body>
</html>