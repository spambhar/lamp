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
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			max-width: 1200px;
			margin-bottom:50px;
			margin-left:auto;
			margin-right:auto;
			background-color: white;
			text-align:center;
		}
		th{
			background-color: #66CDAA;
			border:1px solid #66CDAA;
			font-size: 18px;
			text-align: center;
			padding: 5px 10px;
		}
		td{
			border:1px solid black;
			font-size: 16px;
			font-family: Times New Roman;
			padding: 5px 5px;
		}
		input[type=submit]{
			padding: 5px;
			color: black;
			border: none;
			background-color: #00ffff;
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
	<div id="view" align="center" style="margin-top:60px;">
		<p><span style="text-decoration: none;font-weight: 900;font-size: 30px; color:white;">Student Event</span></p>
		<table align="center" cellpadding="20px" cellspacing="6px">
			<tr>
				<th width="4%">No.</th>
				<th width="25%">Name</th>
				<th width="11%">Date</th>
				<th width="11%">Time</th>
				<th width="20%">Venue</th>
				<th width="20%">Available</th>
				<th width="20%">Maximum ticket</th>
			</tr>
			<?php
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$read_event = "SELECT * FROM event_details INNER JOIN venue_details ON event_details.VenueID = venue_details.VenueID ORDER BY EventName ASC";
				$result_read_event = mysqli_query($conn, $read_event);
				if(mysqli_num_rows($result_read_event)>0){
					while($row = mysqli_fetch_array($result_read_event, MYSQLI_ASSOC)){
						$count=$count+1;
						echo "<tr>";
						echo "<td style='text-align:center'>".$count."</td>";
						echo "<td>".$row['EventName']."</td>";
						echo "<td>".$row['EventDate']."</td>";
						echo "<td>".$row['EventTime']."</td>";
						echo "<td>".$row['VenueName']."</td>";
						echo "<td>".$row['available']."</td>";
						echo "<td>".$row['max']."</td>";
						echo "<tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>