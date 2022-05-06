<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		margin-top: 30px;
		text-align: center;
	";>
<?php
	session_start();
	if (isset($_SESSION['UserFullName'])){
		session_destroy();
		echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			  <div style="font-size: 50px; font-weight:" role="status">
			  	<i class="fa fa-spinner fa-spin"></i>Loading
	  		  </div>';
		header('Refresh: 2; index.php');
	}
?>
</body>
</html>
