<?php 
        //require connection
        require("includes/connection.php");

        //require session
        require("includes/session.php");
?>
<?php

     //check whether form has been submitted
     if (isset($_POST['btn_login'])) {//
     	//form data
     	 $email =  mysqli_escape_string($conn, $_POST['email']);
     	 $password = md5($_POST['password']);

     	$query = "SELECT * FROM budgetusers_tbl WHERE email = '$email' AND password = '$password' ";
     	$result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));

     	 $row = mysqli_fetch_array($result);

     	 if ($row > 0 ){
     	    
     	        //user exist
               $_SESSION['email']  = $email;
               header("Location: index.php");
     	}
     	else{
     		//no user exists
     		header("Location: login.php?error_login=true");
     	}



     }//

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
            
            <h2>LOGIN FORM</h2>
            <?php if(isset($_GET['success'])){// ?>
			<div class="alert alert-success">
				Registered successfully
			</div>
            <?php }// ?>

            <?php if(isset($_GET['error_login'])){// ?> 
			<div class="alert alert-danger">
				Access denied
			</div>
            <?php }// ?>
			
			
			<form action="login.php" method="post">
				   
				<label>Enter Email</label>
				<input type="email" class="form-control" name="email" >
				<label>Enter Password</label>
				<input type="password" class="form-control" name="password" >
			 <br/>
				<input type="submit" style="width:100%;" class="btn btn-primary" name="btn_login">
			</form>
			<h3 align="center"><a href="register.php">CREATE ACCOUNT</a></h3>
		</div>
        <div class="col-md-2"></div>
	</div>

</div>

</body>
</html>