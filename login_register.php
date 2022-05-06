 <?php
	include_once "connect.php";

	if (isset($_POST['register'])) {
		$uid = $_POST['userid'];
		$upass = $_POST['userpass'];
		$upass1 = $_POST['userpass1'];
		$uname = $_POST['username'];
		$uemail = $_POST['useremail'];
		$utype = $_POST['usertype'];

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$insert_user = "INSERT INTO user_details (UserID, UserFullName, UserPassword, UserEmail, Usertype) VALUES ('$uid', '$uname', '$upass', '$uemail','$utype')";

		//check password reconfirmation
		if (($upass!=$upass1)){
			$message="Password and re-enter password is incorrect. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			$result_insert_user = mysqli_query($conn, $insert_user);
			if($result_insert_user){
    			$message="Register success. You can login now.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				$message="Registration fail. Please try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}

	if (isset($_POST['login'])) {
		$uid = $_POST['userid'];
		$upass = $_POST['userpass'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$read_DB = "SELECT * FROM user_details WHERE UserID='$uid' AND UserPassword='$upass'";
		$result = mysqli_query($conn, $read_DB);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				//Compare string to check entered password and database record. Case sensitive.
				if(strcmp($upass, $row['UserPassword']) == 0) { 
    				session_start();
					$_SESSION['UserFullName'] = $row['UserFullName'];
					$_SESSION['UserID'] = $row['UserID'];
					$_SESSION['Usertype'] = $row['Usertype'];
					$message="Login Success.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					header("Refresh: 0; index.php");
					} 
				else { 
    				$message="Login Fail. Please try again.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} 
			}
		}
		else{
			$message="User does not exist or password incorrect. Please try again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TARUC Events - Login or Register</title>
	<style>
		.login_button{
			font-family: Times New Roman;
			color: white;
			font-size: 26px;
			font-weight: 900;
			width: 50%;
			text-align: center;
			border: none;
			background-color: #000066;
			padding: 8px 0px;
			display: inline-block;
		}
		.register_button{
			font-family: Times New Roman;
			color: black;
			font-size: 26px;
			font-weight: 900;
			width: 50%;
			text-align: center;
			border: none;
			background-color: white;
			padding: 8px 0px;
			display: inline-block;
		}
		input[type=submit], input[type=button]{
			padding: 10px 5px; 
			color: white;
			border: none;
			background-color: #000066;
			font-weight: 700;
			font-size: 18px;
			font-family: Times New Roman;
			text-align: center;
			width: 22%;
		}
		input[type=submit]:hover, input[type=button]:hover{
			background-color: #0000cc;
		}
		input[type=text], input[type=password], input[type=email]{
			background-color: white;
			padding: 6px 2px;
			text-align: center;
			border-style: none;
			border-bottom: 2px solid #000066;
			font-size: 18px;
			font-family: Times New Roman;
			width: 60%;
		}
		.loginform{
			margin-top: 50px;
			width: 500px;
			height: 500px;
			margin-left: 33%;
			margin-right: 33%;
			text-align: center;
			background-color: white; 
			font-size: 18px;
			font-family: Times New Roman;
			z-index: 1;
			position: absolute;
		}
		.registerform{
			margin-top: 50px;
			width: 500px;
			height: 500px;
			margin-left: 33%;
			margin-right: 33%;
			text-align: center;
			background-color: white; 
			font-size: 18px;
			font-family: Times New Roman;
			position: absolute;
		}
		.register-active{
			z-index: 2;
		}
		#AAA::-webkit-scrollbar {
			display: none;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script>
	    $(document).ready(function(){
	        $(".register_button").click(function(){
	          $(".login_button").css('background-color','white');
	          $(".login_button").css('color','black');
	          $(".register_button").css('color','white');
	          $(".register_button").css('background-color','#000066');
	          $(".registerform").addClass("register-active");
	        });
	    });
	    $(document).ready(function(){
	        $(".login_button").click(function(){
	          $(".register_button").css('background-color','white');
	          $(".login_button").css('background-color','#000066');
			  $(".login_button").css('color','white');
	          $(".register_button").css('color','black');
	          $(".registerform").removeClass("register-active");
	        });
	    });
	    $(document).ready(function(){
	        $(".home").click(function(){
	          window.location="index.php";
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
	";>
	<!--Login form-->
	<form method="POST" class="loginform" action="login_register.php">
		<br><br>
		<button type="button" class="login_button">Login</button><button type="button" class="register_button">Register</button>
		<br><br><br><br>
		<input type="text" class="" name="userid" placeholder="User ID" required>
		<br><br><br>
		<input type="password" class="" name="userpass" placeholder="Password" required>
		<br><br><br>
		<input type="submit" name="login" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="home" value="Home">
		<br><br><br><br>
	</form>				
	<form method="POST" class="registerform" action="login_register.php">
		<br><br>
		<button type="button" class="login_button">Login</button><button type="button" class="register_button">Register</button>
		<br><br>
		<input type="text" name="userid" placeholder="User ID" required>
		<br><br>
		<input type="text" name="username" placeholder="Name" required>
		<br><br>
		<input type="password" name="userpass" placeholder="Password" required>
		<br><br>
		<input type="password" name="userpass1" placeholder="Re-enter Password" required>
		<br><br>
		<input type="email" name="useremail" placeholder="E-mail" required>
		<br><br>
		<input type="text" name="usertype" value="Student" placeholder="User Type" readonly>
		<br><br>
		<input type="submit" name="register" value="Register">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" class="home" value="Home">
	</form>
</body>
</html>