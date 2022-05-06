<?php
	//Connect database
	include "connect.php";
	
	//Read session
	include 'session.php';
	$uid=$_SESSION['UserID'];
	if($uid=='' || $uid==null){
		$message="Please login to continue";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Refresh: 0, login_register.php");
	}
	//Read button script
	include "top_button.html";

	if(isset($_POST['editname'])){
		$newname=$_POST['username'];
		$update_name = "UPDATE user_details SET UserFullName='$newname' WHERE UserID='$uid'";
		$result_update_name = mysqli_query($conn, $update_name);
		if($result_update_name){
			$_SESSION['UserFullName']=$newname;
			$message="Update name success.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0, my_profile.php");
		}
		else{
			$message="Fail to update name. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	else if(isset($_POST['editemail'])){
		$newemail=$_POST['email'];
		$update_email = "UPDATE user_details SET UserEmail='$newemail' WHERE UserID='$uid'";
		$result_update_email = mysqli_query($conn, $update_email);
		if($result_update_email){
			$message="Update e-mail success.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0, my_profile.php");
		}
		else{
			$message="Fail to update e-mail. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TARUC Events - Edit Event</title>
	<style type="text/css">
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			max-width:750px;
			margin-top:50px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
		}
		th{
			font-size: 28px;
			text-align: center;
			padding-top: 30px ;
			padding-bottom: 30px; ;
			width: 50%;
		}
		td, input[type=text], input[type=email]{
			font-family: Times New Roman;
			font-size: 22px;
			text-align: center;
			padding-top: 2px ;
			padding-bottom: 2px ;
		}
		input[type=file]{
			font-family: Times New Roman;
			font-size: 16px;
			text-align: center;
			padding-top: 2px;
			padding-bottom: 2px;
		}
		input[type=submit], input[type=reset]{
			padding: 10px;
			color: white;
			border: none;
			background-color: #000033;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 20px;
			text-align: center;
			width: 120px;
		}
		input[type=submit]:hover, input[type=reset]:hover{
			background-color: #00001a;
		}
		#AAA::-webkit-scrollbar {
			display: none;
		}
	</style>
</head>
<body id="AAA" background="image\bg.png"
	style="
		background: rgb(98, 9, 121);
    	background: linear-gradient(56deg, rgba(98, 9, 121, 1) 0%, rgba(0, 255, 246, 1) 100%);
		height: 100vh;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	"; >

	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<div id="ename">
		<form action="edit_profile.php" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th>Edit Name</th></tr>
				<tr><td>New Name: <input style="margin-bottom:30px;" type="text" name="username" size="30" required ></tr>
				<tr><td colspan="2"><input style="margin-bottom:30px;" type="submit" name="editname" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>
	<br>
	<div id="eemail">
		<form action="edit_profile.php" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th>Edit E-mail</th></tr>
				<tr><td>New E-mail: <input style="margin-bottom:30px;" type="email" name="email" size="30" required ></tr>
				<tr><td colspan="2"><input style="margin-bottom:30px;" type="submit" name="editemail" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input  type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>
</body>
</html>