<?php
      //require connection
        require("includes/connection.php");

?>
<?php
//check if form submit
if (isset($_POST['btn_register'])) {
	//start data
	$fname= ucfirst(mysqli_escape_string($conn,$_POST['fname']));
    $lname= ucfirst(mysqli_escape_string($conn,$_POST['lname']));
    $email= mysqli_escape_string($conn,$_POST['email']);
    $password= md5($_POST['password']);
    $squery = "INSERT INTO budgetuser_tbl( firstname,lastname,email,password)VALUES('{$fname}',
    '{$lname}','{$email}','{$password}')";

     $result= mysqli_query($conn,$squery) OR die (mysqli_error ($conn));
     header("Location:login.php?success=true");


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Budgetapp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(image/v2.jpg);
           background-size: 100%; background-repeat: no-repeat;">
<div class="container-fluid" >
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<script type="text/javascript">
		function validateform(){
			    var fname=document.register_form.fname.value;
				var lname=document.register_form.fname.value;
			    var email=document.register_form.email.value;
				var password=document.register_form.password.value;
				var cpassword=document.register_form.cpassword.value;

		if (fname=="") {
			alert ('please enter your first name');
			return false;
		}


		if (lname=="") {
			alert ('please enter your Last name');
			return false;
		}

		if (email=="") {
			alert ('please enter a valid email address');
			return false;
		}

		if (password=="") {
			alert ('please enter password');
			return false;
		}
		if (cpassword=="") {
			alert ('please enter your password');
			return false;
		}
		if (password !=cpass) {
			alert ('password do not match');
			return false;
		}


		}
	</script>
		<h2 style="color:#fff">REGISTRATION FORM</h2>
		<form action="register.php" name="register_form" onsubmit=" return validateform()"  method="POST">
		<label style="color: #fff">Enter Fistname</label>
		<input type="text" class="form-control" name="fname"></input>
		<label style="color: #fff">Enter Lasttname</label>
		<input type="text" class="form-control" name="lname"></input>
        <label style="color: #fff">Enter Email</label>
		<input type="email" class="form-control" name="email"></input>

        <label style="color: #fff">Enter password</label>
		<input type="password" class="form-control" name="password"></input>
		<label style="color: #fff">Confirm password</label>
		<input type="password" class="form-control" name="cpassword"></input>

		<input type="submit" name ="btn_register" value"submit" class="btn btn-primary" style="width: 100%;margin-top: 10px"></input>
		</form>

			
		
</div>
		<div class="col-md-2"></div>
	</div>
</div>
  
</body>
</html>
