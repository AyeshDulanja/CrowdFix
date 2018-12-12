<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register to CROWDFIX</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="login.css">
	<div id="head">
	<h1 align="center" id="sub1">WELCOME TO CROWD <a id="ad">FIX</a></h1>
</div>
	<style>
    h1{
        font-size: 300%;
    }
	#head{
		color: white;
		text-align: left;
		padding-left: 0;
	}
	#ad{
	color: #ffd200;
	}
	body{
		font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
		background-color: #1d2120;
		margin: 0%;
	}
	form{
		padding-top: 3%;
		padding-left: 5%;
		padding-right: 5%;
		padding-bottom: 3%;

		width: 270px;

		border-style: solid;
	    border-width: 2px;
	    border-radius: 5px;
	    border-color: white;

	    background-color: white;
	    color: #1d2120;
	    height: 100%;

	    text-align: left;

	    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
	}
	input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #ffd200;
    color: #1d2120;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #e6bb00;
}
h4{
	color: white;
}

a{
	text-decoration: none;
	color: #ffd200;
}
</style>
</head>
<body>
<center>
	<form action="register.php" method="POST">

	Username:<input type="text" name="username" placeholder="Enter a Username">
	<br>
	Password:<input type="Password" name="password" placeholder="Enter a Password">
	<br>
	Conform Password:<input type="password" name="repassword" placeholder="Re-Enter above Password">
	<br>
	Email:<input type="text" name="email" placeholder="Enter your Email here">
	<br>
	<input type="submit" name="submit" value="Register">

	</form>
	</center>
	<h4 align="center">Already have an account?  <a href="login.php">Login</a></h4>

</body>
</html>

<?php
require('connect.php');
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$repass = @$_POST['repassword'];
	$email = @$_POST['email'];
	$date = date("Y-m-d");
	$pass_en = sha1($password);

	if (isset($_POST['submit'])) 
	{
		if($username && $password && $repass && $email)
		{
			if (strlen($username)>=5 && strlen($username) < 25 && strlen($password) > 6) 
			{
				if ($repass == $password) {

					if ($query = mysqli_query($connect,"INSERT INTO users(id, username, password, email, date) VALUES ('','$username','$pass_en','$email','$date')")) 
					{
					//echo "You have been Registered as $username. Click <a href='login.php'>here</a> to login";
                    //echo "<script type='text/javascript'>alert('You have been Registered');</script>";
                    header("Location: welcome.php");
					}
					else
					{
					echo "Failure".mysql_error();
					}

				}
				else{
					//echo "Passwords do not match.";
                    echo "<script type='text/javascript'>alert('Passwords did not matched');</script>";
				}
			}
			else
				//echo "Incorrect Username. ";
                echo "<script type='text/javascript'>alert('Incorrect Username');</script>";
			{
				if (strlen($username)<5 || strlen($username) > 25)
				{
					//echo "Username must be between 5 and 25 charactors. ";
                    echo "<script type='text/javascript'>alert('Username must be between 5 and 25 charactors');</script>";
				}

				if (strlen($password) < 6) 
				{
					//echo "Password must be longer than 6 charactors. ";
                    echo "<script type='text/javascript'>alert('Password must be longer than 6 charactors');</script>";
				}
			}
		}
		else
		{
			//echo("please fill all the blanks");
            echo "<script type='text/javascript'>alert('Please fill the all the blanks');</script>";
		}
	}
?>