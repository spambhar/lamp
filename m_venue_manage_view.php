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
?>

<!DOCTYPE html>
<html>
<head>
	<title>TARUC Events - View Venue</title>
	<style type="text/css">
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			max-width:1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			text-align:center;
		}
		th{
			background-color: #66CDAA;
			border:1px solid #66CDAA;
			font-size: 22px;
			text-align: center;
			padding-top: 10px ;
			padding-bottom: 10px ;
		}
		td{
			border:1px solid black;
			font-size: 20px;
			font-family: Times New Roman;
			text-align: center;
			padding-top: 5px ;
			padding-bottom: 5px ;
		}
		input[type=submit]{
			padding: 5px;
			color: black;
			border: none;
			background-color:#00ffff;
			font-weight: 700;
			font-family: Times New Roman;
			font-size: 18px;
			text-align: center;
			width: 100px;
		}
		input[type=submit]:hover{
			background-color: #20B2AA;
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
	";>
	<div id="view" align="center">
		<br>
		<p><span style="text-decoration: none;font-weight: 900;font-size: 30px; color:white">Venue Details</span></p>
		<table align="center" cellpadding="20px" cellspacing="6px">
			<tr>
				<th>No.</th>
				<th>Venue Name</th>
				<th>Venue Information</th>
			</tr>
			<?php
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$count=0;
				$read_venue = "SELECT * FROM venue_details ORDER BY VenueName ASC";
				$result_read_venue = mysqli_query($conn, $read_venue);
				if(mysqli_num_rows($result_read_venue)>0){
					while($row = mysqli_fetch_array($result_read_venue, MYSQLI_ASSOC)){
						$count=$count+1;
						echo "<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['VenueName']."</td>";
						echo "<td>".$row['VenueInfo']."</td>";
						echo "<tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>