<?php

include 'config.php';

session_start();

error_reporting(0);

session_start();

if(isset($_SESSION['username'])){
    header("location : Account.php");
}

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
		$result = mysqli_query($conn,$sql);
		if(!$result->num_rows>0){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['username'];
			header("location : Account.php");
		}
}else{
	echo"<script>alert('woops! Username Or Password is Wrong.')</script>";
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Zero Hunger / SDG 02 / Sri Lanka / News</title>
	<link rel="stylesheet" type="text/css" href="css/Login_Style.css">
</head>

<body>
	
	<!-- Login -->
	
	<div id="Login">
		<div class="container">
			<h2 id="login_Topic">Login</h2>
			<form class="was-validated">
				<div class="mt-10 mb-10">
					<label for="username">Username : </label>
					<input type="text" class="form-control" id="username" placeholder="amalperera" name="fname" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="mt-10 mb-10">
					<label for="password">Password : </label>
					<input type="password" class="form-control" id="password" placeholder="Abc12@de" name="lname" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
                <button type="submit" class="button">Login</button>
                <p>Don't you have an account?<a href="url">Create a new account</a></p>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
