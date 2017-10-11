<?php 
        //require connection
        require("includes/connection.php");
?>
<?php
        //check if form is submitted
        if(isset($_POST['btn_register'])){// start

         //form data
         $fname  = ucfirst(mysqli_escape_string($conn, $_POST['fname']));
         $lname  = ucfirst(mysqli_escape_string($conn, $_POST['lname']));
         $email  = mysqli_escape_string($conn, $_POST['email']);
         $password  = md5($_POST['password']);


         $query = "INSERT INTO budgetusers_tbl (firstname, lastname, email, password) VALUES ('{$fname}', '{$lname}' , '{$email}', '{$password}')";
         $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
         header("Location: login.php?success=true");






        }//end

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
			<h2>REGISTRATION FORM</h2>
			<script type="text/javascript">
				function validateform(){
                    var Fname = document.register_form.fname.value;
                    var Lname = document.register_form.lname.value;
  					var Email = document.register_form.email.value;
                    var Pass = document.register_form.password.value;
                    var Cpass = document.register_form.cpass.value;

                    if(Fname==""){
                    	alert("Please enter your first name");
                    	return false;
                    }

                     if(Lname==""){
                    	alert("Please enter your last name");
                    	return false;
                    }

                     if(Email==""){
                    	alert("Please enter your email");
                    	return false;
                    }

                    if (Email.indexOf("@", 0) < 0)
			         {
			     	    alert("Please enter a valid e-mail address.");
				        return false;
			        }
			
			
			        if (Email.indexOf(".", 0) < 0)
			        {
				        alert("Please enter a valid e-mail address.");
				        return false;
			        }

                     if(Pass==""){
                    	alert("Please enter your password");
                    	return false;
                    }
                     if(Cpass==""){
                    	alert("Please confirm your password");
                    	return false;
                    }

                    if(Pass != Cpass){
                    	alert("Password Do Not Match");
                    	return false;


                    }

					return true;
				}
			</script>
			<form action="register.php" name="register_form" method="post" onsubmit="return validateform();">
				<label>Enter First Name</label>
				<input type="text" class="form-control" name="fname" >
				<label>Enter Last Name</label>
				<input type="text" class="form-control" name="lname" >
				<label>Enter Email</label>
				<input type="email" class="form-control" name="email" >
				<label>Enter Password</label>
				<input type="password" class="form-control" name="password" >
				<label>Enter Confirm Password</label>
				<input type="password" class="form-control" name="cpass" ><br/>
				<input type="submit" style="width:100%;" class="btn btn-primary" name="btn_register">
			</form>
		</div>
        <div class="col-md-2"></div>
	</div>

</div>

</body>
</html>