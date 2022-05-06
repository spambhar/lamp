<?php
	include_once "connect.php";

	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			min-width: 550px;
			max-width: 800px;
			margin-top:50px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			padding: 30px;
			min-height: 400px;
		}
		th{
			font-size: 30px;
			text-align: center;
			text-decoration: underline;
			padding-bottom: 5px;
		}
		td{
			padding: 5px;
			font-size: 20px;
			font-family: Times New Roman;
		}
		input[type=submit]{
			padding: 11px;
			color: black;
			border: none;
			background-color: #00ffff;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 20px;
			text-align: center;
			width: 120px;
		}
		input[type=submit]:hover{
			background-color: #20B2AA;
		}
		.dropdown{
			display: inline-block;
			position: relative;
		}
		.dropdown-content{
			display: none;
			position: absolute;
			z-index: 1;
			background: #ccffff;
			padding: 5px;
			color:black;
		}
		.dropdown-button{
			display: inline-block;
			width: 100%;
			padding: 5px;
			font-family: Times New Roman;
			font-size: 18px;
			background: #ccffff;
			border: none;
			color:black;
		}
		.dropdown-button:hover{
			background-color: #00ffff;
		}
		#AAA::-webkit-scrollbar {
			display: none;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	        $(".dropdown").mouseleave(function(){
	        	$(".dropdown-content").hide();
	        });
	    });
		$(document).ready(function(){
	        $(".dropdown").mouseenter(function(){
	        	$(".dropdown-content").show();
	        });
	    });
	    $(document).ready(function(){
	        $("#ename").click(function(){
	        	window.location="edit_profile.php#ename";
	        });
	    });
	    $(document).ready(function(){
	        $("#eemail").click(function(){
	        	window.location="edit_profile.php#eemail";
	        });
	    });
	</script>
</head>
<body id="AAA" 
	style="
		background: rgb(98, 9, 121);
    	background: linear-gradient(56deg, rgba(98, 9, 121, 1) 0%, rgba(0, 255, 246, 1) 100%);
		height: 100vh;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	"; >
	<form action="edit_profile.php" method="POST">
		<table cellspacing="1" style="margin-top:160px; background: linear-gradient(to top right, #ff99cc 0%, #ffffff 100%);">
			<tr><th style="text-decoration: none; padding-top:30px;" colspan="3">My Profile</th></tr>
			<tr>
				<?php
					$read_user = "SELECT UserID FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td style='text-align:right;' width='16%'><b>User ID: </b></td>";
							echo "<td width='50%'>".$row['UserID']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$read_user = "SELECT UserFullName FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td style='text-align:right;' width='16%'><b>Name: </b></td>";
							echo "<td width='50%'>".$row['UserFullName']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<?php
					$read_user = "SELECT UserEmail FROM user_details WHERE UserID='$uid'";
					$result_read_user = mysqli_query($conn, $read_user);
					if($result_read_user){
						while($row = mysqli_fetch_array($result_read_user, MYSQLI_ASSOC)){
							echo "<td style='text-align:right;' width='16%'><b>E-mail: </b></td>";
							echo "<td width='50%'>".$row['UserEmail']."</td>";
						}
					}
				?>
			</tr>
			<tr>
				<td colspan="3" style="text-align: right">
					<div class="dropdown">
						<input style="margin-right:20px;" type="submit" name="editprofile" value="Edit Profile">
						<div class="dropdown-content" align="center">
							<input type="button" class="dropdown-button" id="ename" value="Name">
							<input type="button" class="dropdown-button" id="eemail" value="E-mail">
						</div>
					</div>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>