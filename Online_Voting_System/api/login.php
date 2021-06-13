<?php 
session_start();

require_once "connect.php";

$mobile = $_POST['mnum'];
$password = $_POST['pword'];
$role = $_POST['role'];

$sql = "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role'";
$check = mysqli_query($connect, $sql);

if (mysqli_num_rows($check)>0) {
	$userdata = mysqli_fetch_array($check);
	$sql1 = "SELECT * FROM user WHERE role=2";
	$groups = mysqli_query($connect, $sql1);
	$groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

	$_SESSION['userdata'] = $userdata;
	$_SESSION['groupsdata'] = $groupsdata;

	echo "
	 	<script>
	 	window.location = '../routes/dashboard.php';
 		</script>
 		";

}else{
	echo "
	 	<script>
	 	alert('Invalid Credentials or User not found!');
	 	window.location = '../index.html';
 		</script>
 		";
}

 ?>