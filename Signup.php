<?php
include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$rpassword = md5($_POST['rpassword']);
	
	if($password==$rpassword){
		$sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
		$result = mysqli_query($conn,$sql);
		if(!$result->num_rows>0){
			$sql = "INSERT INTO users (first_name,last_name,username,email,password)
				VALUES ('$fname','$lname','$username','$email','$password')";
			$result = mysqli_query($conn,$sql);
		
			if($result){
				echo"<script>alert('Wow! User Registration Completed.')</script>";
				$fname="";
				$lname="";
				$username="";
				$email="";
				$_POST['password']="";
				$_POST['rpassword']="";
			}
			else{
				echo"<script>alert('Woops! Something wrong went.')</script>";
			}
		}
		else{
			echo"<script>alert('Woops! Email Or Username Already Exists.')</script>";
		}
		}
		else{
			echo"<script>alert('Password Not Matched!')</script>";
		}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Zero Hunger / SDG 02 / Sri Lanka / News</title>
	<link rel="stylesheet" type="text/css" href="SignUp_Style.css">
</head>

<body>
	
	<!-- Login -->
	
	<div id="Signup">
		<div class="container-fluid">
			<h2 id="login_Topic">Sign Up</h2>
			<form action="" method="POST" class="was-validated">
				<div class="mt-10 mb-10">
					<label for="firstName">First Name : </label>
					<input type="text" class="form-control" id="firstname" placeholder="amal" name="fname" value="<?php echo $fname; ?>" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="mt-10 mb-10">
					<label for="Lastname">Last Name : </label>
					<input type="text" class="form-control" id="lastname" placeholder="perera" name="lname" value="<?php echo $lname; ?>"  required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="mt-10 mb-10">
					<label for="username">Username : </label>
					<input type="text" class="form-control" id="username" placeholder="amalperera" name="username" value="<?php echo $username; ?>" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="mt-10 mb-10">
					<label for="Email">Email : </label>
					<input type="text" class="form-control" id="email" placeholder="amalperera@gmail.com" name="email" value="<?php echo $email; ?>" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="mt-10 mb-10">
					<label for="password">Password : </label>
					<input type="password" class="form-control" id="password" placeholder="Abc12@de" name="password" value="<?php echo $_POST['password']; ?>" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				    <div class="mt-10 mb-10">
					<label for="Repeatpassword">Repeat Password : </label>
					<input type="password" class="form-control" id="rpassword" placeholder="Abc12@de" name="rpassword" value="<?php echo $_POST['rpassword']; ?>" required>
					<div class="valid-feedback">Valid.</div>
      				<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				  <div class="clearfix">
      
      <button type="submit" name="submit" class="signupbtn" id="Sign">Sign Up</button>
    </div>
			<p>Already have account <a href="Login.php"> Login </a></p>
			</form>
		</div>
	</div>
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
