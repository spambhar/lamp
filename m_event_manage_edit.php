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
			background-color: #00ccff;
		}
		th{
			font-size: 28px;
			text-align: center;
			padding-top: 20px ;
			padding-bottom: 20px ;
			width: 50%;
		}
		td, input[type=text], input[type=number], select{
			font-family: Times New Roman;
			font-size: 22px;
			text-align: center;
			padding-top: 2px ;
			padding-bottom: 2px ;
		}
		textarea{
			font-family: Times New Roman;
			font-size: 18px;
			text-align: center;
			padding-top: 2px ;
			padding-bottom: 2px ;
		}
		input[type=submit], input[type=reset]{
			padding: 10px;
			color: black;
			border: none;
			background-color: #00ffff;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 20px;
			text-align: center;
			width: 120px;
		}
		input[type=submit]:hover, input[type=reset]:hover{
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
	<div id="editname">
		<form action="m_event_manage_edit.php#editname" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: none;color:white;">Edit Event Name</th></tr>
				<tr><td>Event: 
					<select name="edit_event_name" >
						<option value="">Select</option>
						<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$read_event = "SELECT * FROM event_details";
							$result_read_event = mysqli_query($conn, $read_event);
							if(mysqli_num_rows($result_read_event)>0){
								while($row = mysqli_fetch_array($result_read_event, MYSQLI_ASSOC)){
									echo "<option value='".$row["EventName"]."'>".$row["EventName"]."</option>";
								}
							}
						?>
					</select>
				&nbsp;&nbsp;<input type="reset" name="refreshevent" value="Refresh"></td></tr>
				<tr><td>New Event Name: <input type="text" name="e_eventname" size="35" required></td></tr>
				<tr><td colspan="2"><input type="submit" name="editname" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>
	<div id="editdate">
		<form action="m_event_manage_edit.php#editdate" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: none;color:white;">Edit Event Date</th></tr>
				<tr><td>Event: 
					<select name="edit_event_name" >
						<option value="">Select</option>
						<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$read_event = "SELECT * FROM event_details";
							$result_read_event = mysqli_query($conn, $read_event);
							if(mysqli_num_rows($result_read_event)>0){
								while($row = mysqli_fetch_array($result_read_event, MYSQLI_ASSOC)){
									echo "<option value='".$row["EventName"]."'>".$row["EventName"]."</option>";
								}
							}
						?>
					</select>
				&nbsp;&nbsp;<input type="reset" name="refreshevent" value="Refresh"></td></tr>
				<tr>
					<td>New Event Date: 
						<input type="number" name="e_eventyear" min="2019" max="2050" placeholder="YYYY" required> -
						<input type="number" name="e_eventmonth" min="01" max="12" placeholder="MM" required> -
						<input type="number" name="e_eventday" min="01" max="31" placeholder="DD" required>
					</td>
				</tr>
				<tr><td colspan="2"><input type="submit" name="editdate" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>
	<div id="edittime">
		<form action="m_event_manage_edit.php#edittime" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: none;color:white;">Edit Event Time</th></tr>
				<tr><td>Event: 
					<select name="edit_event_name" >
						<option value="">Select</option>
						<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$read_event = "SELECT * FROM event_details";
							$result_read_event = mysqli_query($conn, $read_event);
							if(mysqli_num_rows($result_read_event)>0){
								while($row = mysqli_fetch_array($result_read_event, MYSQLI_ASSOC)){
									echo "<option value='".$row["EventName"]."'>".$row["EventName"]."</option>";
								}
							}
						?>
					</select>
				&nbsp;&nbsp;<input type="reset" name="refreshevent" value="Refresh"></td></tr>
				<tr>
					<td>New Event Time (24-hour format): 
						<input type="number" name="e_eventhour" min="00" max="24" placeholder="HH" required> : 
						<input type="number" name="e_eventminute" min="00" max="60" placeholder="MM" required>
					</td>
				</tr>
				<tr><td colspan="2"><input type="submit" name="edittime" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>
	<div id="editvenue">
		<form action="m_event_manage_edit.php#editvenue" method="POST">
			<table align="center" cellspacing="20px">
				<tr><th style="text-decoration: none;color:white;">Edit Event Venue</th></tr>
				<tr><td>Event: 
					<select name="edit_event_name" >
						<option value="">Select</option>
						<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$read_event = "SELECT * FROM event_details";
							$result_read_event = mysqli_query($conn, $read_event);
							if(mysqli_num_rows($result_read_event)>0){
								while($row = mysqli_fetch_array($result_read_event, MYSQLI_ASSOC)){
									echo "<option value='".$row["EventName"]."'>".$row["EventName"]."</option>";
								}
							}
						?>
					</select>
				&nbsp;&nbsp;<input type="reset" name="refreshevent" value="Refresh"></td></tr>
				<tr><td>New Venue: 
					<select name="e_eventvenue" >
						<option value="">Select</option>
						<?php
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$read_venue = "SELECT * FROM venue_details";
							$result_read_venue = mysqli_query($conn, $read_venue);
							if(mysqli_num_rows($result_read_venue)>0){
								while($row = mysqli_fetch_array($result_read_venue, MYSQLI_ASSOC)){
									echo "<option value='".$row["VenueID"]."'>".$row["VenueName"]."</option>";
								}
							}
						?>
					</select>
				</td></tr>
				<tr><td colspan="2"><input type="submit" name="editvenue" value="Save">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="cancel" value="Cancel"></td></tr>
			</table>
		</form>
	</div>

	<?php
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if(isset($_POST['editname'])){
			$selectname=$_POST['edit_event_name'];
			if($selectname==''){
				$message="No event name selected. Please select event name and try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				//Read event id
				$read_event_id = "SELECT EventID FROM event_details WHERE EventName='$selectname'";
				$result_read_event_id = mysqli_query($conn, $read_event_id);
				if(mysqli_num_rows($result_read_event_id)>0){
					while($row = mysqli_fetch_array($result_read_event_id, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$ename=$_POST['e_eventname'];
						$update_name = "UPDATE event_details SET EventName='$ename' WHERE EventID='$eid'";
						$result_update_name = mysqli_query($conn, $update_name);
						if($result_update_name){
							$message="Update event name success.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else{
							$message="Fail to update event name. Please try again.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					}
				}
			}
		}		
		else if(isset($_POST['editdate'])){
			$selectname=$_POST['edit_event_name'];
			if($selectname==''){
				$message="No event name selected. Please select event name and try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				//Read event id
				$read_event_id = "SELECT EventID FROM event_details WHERE EventName='$selectname'";
				$result_read_event_id = mysqli_query($conn, $read_event_id);
				if(mysqli_num_rows($result_read_event_id)>0){
					while($row = mysqli_fetch_array($result_read_event_id, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$eyear=$_POST['e_eventyear'];
						$emonth=$_POST['e_eventmonth'];
						$eday=$_POST['e_eventday'];
						//Add '0' to month
						if(($emonth>0) && ($emonth<10)){
							$emonth='0'.$emonth;
						}
						//Add '0' to day
						if(($eday>0) && ($eday<10)){
							$eday='0'.$eday;
						}
						$edate=$eyear.'-'.$emonth.'-'.$eday;
						$update_date = "UPDATE event_details SET EventDate='$edate' WHERE EventID='$eid'";
						$result_update_date = mysqli_query($conn, $update_date);
						if($result_update_date){
							$message="Update event date success.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else{
							$message="Fail to update event date. Please try again.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					}
				}
			}
		}
		else if(isset($_POST['edittime'])){
			$selectname=$_POST['edit_event_name'];
			if($selectname==''){
				$message="No event name selected. Please select event name and try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				//Read event id
				$read_event_id = "SELECT EventID FROM event_details WHERE EventName='$selectname'";
				$result_read_event_id = mysqli_query($conn, $read_event_id);
				if(mysqli_num_rows($result_read_event_id)>0){
					while($row = mysqli_fetch_array($result_read_event_id, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$ehour=$_POST['e_eventhour'];
						$eminute=$_POST['e_eventminute'];
						//Add '0' to hour
						if(($ehour>-1) && ($ehour<10)){
							$ehour='0'.$ehour;
						}
						//Add '0' to minute
						if(($eminute>-1) && ($eminute<10)){
							$eminute='0'.$eminute;
						}
						$etime=$ehour.':'.$eminute.':00';
						$update_time = "UPDATE event_details SET EventTime='$etime' WHERE EventID='$eid'";
						$result_update_time = mysqli_query($conn, $update_time);
						if($result_update_time){
							$message="Update event time success.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else{
							$message="Fail to update event time. Please try again.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					}
				}
			}
		}
		else if(isset($_POST['editvenue'])){
			$selectname=$_POST['edit_event_name'];
			if($selectname==''){
				$message="No event name selected. Please select event name and try again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
				//Read event id
				$read_event_id = "SELECT EventID FROM event_details WHERE EventName='$selectname'";
				$result_read_event_id = mysqli_query($conn, $read_event_id);
				if(mysqli_num_rows($result_read_event_id)>0){
					while($row = mysqli_fetch_array($result_read_event_id, MYSQLI_ASSOC)){
						$eid=$row['EventID'];
						$evenue=$_POST['e_eventvenue'];
						if($evenue==''){
							$message="No event venue selected. Please try again.";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else{
							$read_venue_id="SELECT VenueID FROM venue_details WHERE VenueID='$evenue'";
							$result_read_venue_id = mysqli_query($conn, $read_venue_id);
							if($result_read_venue_id){
								while($row = mysqli_fetch_array($result_read_venue_id, MYSQLI_ASSOC)){
									$vid=$row['VenueID'];
									$update_venue = "UPDATE event_details SET VenueID=$vid WHERE EventID='$eid'";
									$result_update_venue = mysqli_query($conn, $update_venue);
									if($result_update_venue){
										$message="Update event venue success.";
										echo "<script type='text/javascript'>alert('$message');</script>";
									}
									else{
										$message="Fail to update event venue. Please try again.";
										echo "<script type='text/javascript'>alert('$message');</script>";
									}
								}
							}
						}
					}
				}
			}
		}
	?>
</body>
</html>