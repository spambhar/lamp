<?php
session_start();
//Check session user

if (isset($_SESSION['UserFullName'])!=null){
	$login_status="yes";
	$uid=$_SESSION['UserID'];
	$utype=$_SESSION['Usertype'];
	// $utype = "Admin";

	if($utype=='Admin')
	{
		echo '
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse"
		style="background: linear-gradient(to right, #000066 0%, #0000cc 100%);
		border-radius: 0px 0px 0px 0px; 
		border: none;">
			<div>
				<div class="navbar-header">
					<span class="navbar-brand" style="color:white;">Greetings, Admin</span>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="Admin_index.php">Admin Management</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="my_profile.php">My Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="change_password.php">Change Password</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" style="color:white;" href="logout.php">Logout&nbsp;&nbsp;</a>
					</li>
				</ul>
			</div>
		</nav>';
	}
	else if ($utype=='Student')
	{
		echo '
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse"
		style="background: linear-gradient(to right, #000066 0%, #0000cc 100%);
		border-radius: 0px 0px 0px 0px; 
		border: none;">
			<div>
				<div class="navbar-header">
					<span class="navbar-brand" style="color:white;">Greetings, '.$_SESSION["UserFullName"].'</span>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="my_profile.php">My Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="my_booking.php">My Booking</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="check_booked.php">Check availability</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color:white;" href="change_password.php">Change Password</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" style="color:white;" href="logout.php">Logout&nbsp;&nbsp;</a>
					</li>
				</ul>
			</div>
		</nav>';
	}
}
else{
	echo '
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse"  
	style="background: linear-gradient(to right, #000066 0%, #0000cc 100%);
	border-radius: 0px 0px 0px 0px; 
	border: none;
	color: white;">
		<div>
			<div class="navbar-header">
				<span class="navbar-brand" style="color:white;">Welcome</span>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" style="color:white;" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:white;" href="login_register.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:white;" href="login_register.php">Register&nbsp;&nbsp;</a>
				</li>
			</ul>
		</div>
	</nav>';
	$login_status="no";
}
?>
