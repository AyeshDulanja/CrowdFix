<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=0.7">
	<title>CROWD FIX</title> 
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div id="head">
	<h1 id="sub1">CROWD <a id="ad">FIX </a>&nbsp;<i class="fa fa-weixin" aria-hidden="true"></i></h1>
	</div>

	<ul>
	<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="account.php"><i class="fa fa-address-card"></i> My Account</a></li>
	<li><a href="members.php"><i class="fa fa-users"></i> Members</a></li>
	<li style="float: right;"><a href="index.php?action=logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
	<li style="float: right;">
		<?php 
		$check = mysqli_query($connect,"SELECT * FROM users WHERE username='".$_SESSION['username']."'");
		$row = mysqli_num_rows($check);
		while ($row = mysqli_fetch_assoc($check)) {
			$id = $row['id'];
		}
		echo "<a class='active' href='profile.php?id=$id'><i class='fa fa-user'></i> "; echo @$_SESSION['username']; 
		?></a></li>
</ul>

<style>
#name{
	color: black;
}
	form{
		padding-top: 3%;
		padding-left: 5%;
		padding-right: 5%;
		padding-bottom: 3%;


		width: 50%;
        
        margin: 1%;

		border-style: solid;
	    border-width: 2px;
	    border-radius: 5px;
	    border-color: white;

	    background-color: white;
	    color: #1d2120;
	    height: 100%;

	    text-align: center;

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

button {
    font-weight: bold;
    background-color: #ffd200;
    border: none;
    color: white;
    border-radius: 5px;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
}

button:hover {
    background-color: green;
    color: white;
}
</style>
</head>

<body>
	<br>
    <center>
	<form>

	<?php


if (@$_GET['id']) {
	$check = mysqli_query($connect,"SELECT * FROM users WHERE id='".@$_GET['id']."'");
	$rows = mysqli_num_rows($check);

	if (mysqli_num_rows($check) != 0) {
		while ($row = mysqli_fetch_assoc($check)) 
		{
			echo "<h1 id='name'>".$row['username']."</h1><img src=".$row['propic']." width='200'><br/>";
			echo "<h2>Date Registered: ".$row['date']."<br/>";
			echo "Email: ".$row['email']."<br/></h2>";
		}
	}
	else
	{
		echo "Couldn't found ID.";
	}
}
else
{
	header("Location: index.php");
}



?>
</form>
</center>
</body>
</body>
</html>

<?php
if(@$_GET['action'] == "logout")
{
	session_destroy();
	header("Location: login.php");
}
	}
	else
	{
		echo "You must be Logged in.";
	}
?>