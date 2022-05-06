<?php
	//Connect database
	include "connect.php";
	//Read session
	include 'session.php';
	//Read button script
	include "top_button.html";
?>
</!DOCTYPE html>
<html>
<head>
	<title>UNIVERSITY Events</title>
	<style type="text/css">
		.top{
			font-size: 45px;
			font-family: Helvetica;
			text-align: center;
			color: white;
			font-weight: bold;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;
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
		table{
			margin-left:200px;
			margin-right:200px;
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
<body id="AAA" class="bg-image"
	style="
		/* background-image: url('background1.jpg'); */
		background: rgb(98, 9, 121);
    	background: linear-gradient(56deg, rgba(98, 9, 121, 1) 0%, rgba(0, 255, 246, 1) 100%);
		height: 100vh;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	";>
	<div>	
		<button type="button" id="myBtn"  title="Go to top" onclick="topFunction()" class="btn btn-default">
		<span class="glyphicon glyphicon-menu-up"></span>
		</button>
		<div class="top">
			<p>Student event Management System</p>
		</div>

		<div class="content" align="center">
			<?php
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				$read_DB = "SELECT * FROM event_details ORDER BY EventDate DESC";
				$result = mysqli_query($conn, $read_DB);
				
				if($result){
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						echo "<form action='event_detail.php' method='POST'><table style='background: linear-gradient(to top left, #ccffcc 0%, #ffffff 100%);'>";
						echo "<tr><td style='text-align:center; padding-top:40px;'><input  class ='event_name' style='text-align:center; font-family: Helvetica' type='text' name='eventname' value='".$row['EventName']."' size=65 readonly></td></tr>";
						echo "<tr><td><br></td></tr>";
						echo "<tr><td style='text-align:center; padding-bottom:40px;'><input type='submit' name='more_detail' value='More Details'/></td></tr>";
						echo "<tr><td><br></td></tr>";
						echo "</table></form><br>";
					}
				}
			?>
		</div>
	</div>
</body>
</html>