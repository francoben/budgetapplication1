
<?php
      //require connection
        require("includes/connection.php");
        //
        require("includes/session.php");
       

?>
<?php
//check if form submit
if (isset($_POST['btn_login'])) {
	//start data

   
    $email= mysqli_escape_string($conn,$_POST['email']);
    $password= md5($_POST['password']);

    $squery = "SELECT * FROM budgetuser_tbl WHERE email = '$email' AND password = '$password'";
    $result= mysqli_query($conn,$squery) OR die (mysqli_error ($conn));
    $row=mysqli_fetch_array($result);

    if ($row > 0) {

    	$_SESSION['email'] = $email;
    	header("Location:index.php");
    	  
    }
 else

 	header("Location:login.php?error_login=true");
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

<div class="container-fluid">
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
<?php
	if (isset($_GET['success'])) {?>
	<div class="alert alert-success">
       <strong>success!</strong> sucessful
        </div>

 <?php
		
	}?>

<?php
	if (isset($_GET['error_login'])) {?>
	<div class="alert alert-danger">
       <strong>deny!</strong>
        </div>

 <?php
		
	}?>
      


	<script type="text/javascript">
		function validateform(){
			    
			    var email=document.login_form.email.value;
				var password=document.login_form.password.value;
				

		

		if (email=="") {
			alert ('please enter a valid email address');
			return false;
		}

		if (password=="") {
			alert ('please enter password');
			return false;
		}
		


		}

	</script>
	
		<h2 style="color:#fff"><center>LOGIN FORM</center></h2>
		<form action="login.php" name="login_form" onsubmit=" return validateform()"  method="POST">
		
        <label style="color:#fff">Enter Email</label>
		<input type="email" class="form-control" name="email"></input>

        <label style="color:#fff">Enter password</label>
		<input type="password" class="form-control" name="password"></input>
	

		<input type="submit" name ="btn_login" value"submit" class="btn btn-primary" style="width: 100%;margin-top: 10px"></input>
		</form>
        <h3 align="center"><a href="register.php">CREATE ACCOUNT</a></h3>
			
		
</div>
		<div class="col-md-2"></div>
	</div>
</div>
  
</body>
</html>