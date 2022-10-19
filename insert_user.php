<?php 

include("connection.php");

	if (isset($_POST['sign_up'])) {
		# code...
		$pass       = htmlentities(mysqli_real_escape_string($con, $_POST['password'])); 
		$email      = htmlentities(mysqli_real_escape_string($con, $_POST['email'])); 


		#verifying the password if is less than 9 char
		if (strlen($pass) < 9) {
			# code...
			echo "<script>alert('Password should be minimun 9 characters!')</script>";
			exit();  //allow you user to be permanent in the current page, allow him to stop there
		}

		#verifying all the email one by one
		$check_email = "SELECT * from users where email = 'email'";
		$run_email = mysqli_query($con, $check_email);
		$check = mysqli_num_rows($run_email);    #the numbers of rows of the table users in collumn of email

		if ($check == 1) { #if check is equal of any email from database
			# code...
			echo "<script>alert('Email already exist, please try using another email!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		//$recovery_account = "Iwanttoputading intheuniverse.";
		$insert = "INSERT INTO users (email, password) VALUES('$email', '$pass')";

		$query = mysqli_query($con, $insert);

		if ($query) {
			# code...
			echo "<script>alert('Well Done $email, you are good to go.')</script>";
			echo "<script>window.open('index.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('index.php', '_self')</script>";
		}
	}


?>