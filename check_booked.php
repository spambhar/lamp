<?php
	include "connect.php";
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
	<title>Ticket Booked</title>
	<style type="text/css">
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
		}
		#view{
			margin: auto;
			padding-bottom: 5px;
			min-width: 50%;
			max-width: 80%;
			background-color: white;
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
	"; >
	<br><br><br>
	<div id="view" align="center">
		<p style="padding-top: 30px; font-size: 30px;font-weight: 900">My Booking</p>
		<hr>
		<table class="table table-borderless" align="center" cellpadding="6px" cellspacing="6px">
			<tr>
				<th>Events</th>
				<th>Ticket available</th>
			</tr>
			<?php
				$count=0;
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				
				$read_user_booking = "SELECT * FROM event_details";
				$result_read_user_booking = mysqli_query($conn, $read_user_booking);
				if ($result_read_user_booking)
                {
					while($row = mysqli_fetch_array($result_read_user_booking, MYSQLI_ASSOC))
                    {
						$eid=$row['EventID'];

                        $count = "SELECT available FROM event_details WHERE EventID = $eid";
						$cc = mysqli_query($conn, $count);
                        $ro = mysqli_fetch_array($cc);
                        echo "<tr><td>".$row['EventName']."</td>";
                        echo "<td>".$ro[0]."</td>";
						echo "</tr>";
					}
				}
			?>
		</table>
	</div>
</body>
</html>