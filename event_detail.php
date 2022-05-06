<?php
	//Connect database
	include "connect.php";
	
	//Read session
	include 'session.php';

	//Read button script
	include "top_button.html";

	//Join any event
	if(isset($_POST['join'])){
		//Go login page if not login
		if($login_status=="no"){
			$message="Please login to continue.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh: 0; login_register.php");
		}

		//Purchase ticket to join event, Only ONE booking per user
		else if ($login_status=="yes"){
			$ename=$_POST['joineventname'];

			//Read selected event ID
			$read_eventid = "SELECT EventID FROM event_details WHERE EventName='$ename'";
			$result_read_eventid = mysqli_query($conn, $read_eventid);
			if($result_read_eventid){
				while($row = mysqli_fetch_array($result_read_eventid, MYSQLI_ASSOC)){
					$eid=$row['EventID'];
				}
			}

			//Check if user purchased ticket for the event
			$read_book_record = "SELECT * FROM booking_details WHERE UserID='$uid' AND EventID='$eid'";
			$result_read_book_record = mysqli_query($conn, $read_book_record);
			$number_of_rows = mysqli_num_rows($result_read_book_record);
		
			$check = "SELECT available FROM event_details WHERE EventID='$eid'";
			$check11 = mysqli_query($conn, $check);
			$arr = mysqli_fetch_array($check11);

			if($arr[0]>0)
			{
				//If purchased
				if($number_of_rows>0){
					$message="Sorry, you purchased the ticket for the event. For every event, only one ticket can be purchased by each user.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					header("Refresh: 0; index.php");
				}
				else{
					date_default_timezone_set('Asia/kolkata');
					$current_time = date('Y-m-d H:i:s');
					$insert_booking = "INSERT INTO booking_details (BookingTimeStamp, UserID, EventID) VALUES ('$current_time', '$uid', '$eid' ) ";
					$result_insert_booking = mysqli_query($conn, $insert_booking);
					if($result_insert_booking){

						$up = "UPDATE event_details SET available = available - 1 WHERE EventID = $eid";
						$xx = mysqli_query($conn, $up);

						$message="Ticket purchase success.";
						echo "<script type='text/javascript'>alert('$message');</script>";	
					}
					else{
						$message="Ticket purchase fail. Please try again";
						echo "<script type='text/javascript'>alert('$message');</script>";
					}
				}
			}
			else
			{
				$message="All tickets are booked.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UNIVERSITY Events - Event Detail/Search Event</title>
	<style>
		.top{
			font-size: 34px;
			font-family: Helvetica;
			text-align: center;
		}
		input[type=submit]{
			padding: 12px;
			color: black;
			border: none;
			background-color: #000033;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 16px;
			text-align: center;
			width: auto;
			color: white;
		}
		input[type=submit]:hover{
			background-color: #00001a;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		table{
			margin-left:60px;
			margin-right:60px;
			text-align:justify;
			background-color: white;
		}
		.event_name{
			font-family: Times New Roman;
			border-style: none;
			font-size: 30px;
			margin-top: 10px;
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
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<br><br>
	<div class="top">
		<h1>UNIVERSITY EVENTS</h1>
	</div>
	<br><br>
	<!--dislay search result area-->
	<div class="content" align="center">
		
		<?php
			$searchkey='-';

			if(((isset($_POST['search'])) && ($_POST['searchevent'] != ""))){
				$searchkey=$_POST['searchevent'];
			}
			else if (isset($_POST['more_detail'])){
				$searchkey=$_POST['eventname'];
			}
			else{
				$searchkey='-';
			}
		
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			//Read related event
			$read_DB = "SELECT * FROM event_details INNER JOIN venue_details ON event_details.VenueID = venue_details.VenueID WHERE event_details.EventName LIKE '$searchkey%'";
			$result = mysqli_query($conn, $read_DB);
			//Display related result and details
			if(mysqli_num_rows($result)>0){
				echo "<form action='event_detail.php' method='POST'>";
    			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    				echo "<br><table>";
        			echo "<tr><td style='text-align:center'><input class ='event_name' style='text-align:center; font-family: Helvetica' type='text' name='joineventname' value='".$row['EventName']."' size=65 readonly></td></tr>";
        			echo "<tr>
        					<td>
        						<ul>
        							<li><b>Date: </b>". $row['EventDate']."</li>
        							<li><b>Time: </b>". $row['EventTime']."</li>
        							<li><b>Venue: </b>".$row['VenueName']."</li>
        						</ul></span></td></tr>";
        			echo "<tr><td style='text-align:center'><input type='submit' name='join' value='Join Event'/></td></tr>";
        			echo "<tr><td><br></td></tr>";
        			echo "</table><br>";
    			}
    			echo "</form>";
    		}
    	?>
	</div>
</body>
</html>
