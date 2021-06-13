<?php 

session_start();
if (!isset($_SESSION['userdata'])) {
	header("location: ../index.html");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($_SESSION['userdata']["status"]==0) {
	$status = '<b style = color:red;">Not Voted</b>';
}else{
	$status = '<b style = color:green;">Voted</b>';
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
<body>

	<style type="text/css">
		#back{
			padding: 5px;
			font-size: 15px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			border: 2px solid black;
			float: left;
			margin: 25px;
		}
		#logout{
			padding: 5px;
			font-size: 15px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			border: 2px solid black;
			float: right;
			margin: 25px;
		}
		#profile{
			background-color: white;
			width: 30%;
			padding: 20px;
			float: left;

		}
		#group{
			background-color: white;
			width: 55%;
			padding: 20px;
			float: right;
		}
		#votebutton{
			padding: 5px;
			font-size: 15px;
			border-radius: 5px;
			background-color: blue;
			color: white;
			border: 2px solid black;
			width: 10%;
		}
		#mainpanel{
			padding: 10px;
		}
		#voted{
			padding: 5px;
			font-size: 15px;
			border-radius: 5px;
			background-color: green;
			color: white;
			border: 2px solid black;
			width: 10%;
		}
	</style>

	<div id="mainsection">
		<center>
		<div id="headersection">
			<a href="../index.html" ><button id="back"> Back </button></a>
			<a href="logout.php"><button id="logout"> Logout </button></a>
			<h1>Online Voting System</h1>
		</div>
		</center>
		<hr>

		<div id="mainpanel">
		<div id="profile">
			<center><img src='../uploads/<?php echo $userdata["imagename"] ?>' height="100" width="100"></center><br><br><br>
			<b>Name :</b> <?php echo $userdata['name']; ?> <br><br><br>
			<b>Mobile :</b>  <?php echo $userdata['mobile']; ?> <br><br><br>
			<b>Address :</b>  <?php echo $userdata['address']; ?> <br><br><br>
			<b>Status :</b>  <?php echo $status; ?> <br><br><br>

		</div>

		
			<?php 

			if ($_SESSION['groupsdata']) {
				for ($i=0; $i < count($groupsdata); $i++) { 
					?>
					<div id="group">
						<img style="float: right;" src='../uploads/<?php echo $groupsdata[$i]['image'] ?>' height="100" width="100">
						<b>Group Name : </b> <?php echo $groupsdata[$i]['name'] ?> <br><br>
						<b>Votes : </b> <?php echo $groupsdata[$i]['votes'] ?> <br><br>
						<form action="../api/vote.php" method="POST">
							<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
							<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
							<?php 
								if ($_SESSION['userdata']['status']==0) {
									?>
										<input type="submit" name="votebutton" value="vote" id="votebutton">
									<?php
								}else{
									?>
										<button disabled type="button" name="votebutton" value="vote" id="voted">Voted</button>
									<?php
								}

							 ?>
							
						</form>
						<br><hr>
					</div>
					

					<?php
				}
			}


			 ?>

		</div>

	</div>
	
</body>
</html>