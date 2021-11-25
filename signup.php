
<!DOCTYPE html>
<html>
<head>
     <style >
     ::-webkit-input-placeholder { 
        color:  #E0E0E0;
      }

      :-ms-input-placeholder { 
          color: #E0E0E0;
       }

       ::placeholder {
           color: #E0E0E0;
        }
      
	</style>

	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<body1>
		<div class="signupbox">
			<img src="img/signup.png" class ="signup">
			<h1>Signup Here</h1>
			<form action="registration.php" method="post">
				<p>Username</p>
				<input type="text" required name="username" placeholder="Enter Username">

				<p>Password</p>
				<input type="Password" required name="password" placeholder="Enter Password">

				<p>Email</p>
				<input type="email" required name="email" placeholder="Enter email">

				<p>Mobile number</p>
				<input type="tel" required name="phnno" pattern="01[5-9]{1}[0-9]{8}" required placeholder="Enter mobile no:">

                <p>address</p>
				<input type="text" required name="address" placeholder="Enter address">


				<input type="submit" name="reg" value="Signup">
				<a href="login.php">Already have an account ?</a>
				<a class="back" href="everyones view.php">Back to home</a>




			</form>
			
		</div>
	</body1>
</head>
<body>

</body>
</html>