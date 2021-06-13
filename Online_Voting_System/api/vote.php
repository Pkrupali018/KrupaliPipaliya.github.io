<?php 

session_start();
require_once "connect.php";

$votes = $_POST['gvotes'];
$_POST['gvotes'] = $_POST['gvotes'] +'1';
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];


$upd_v = "UPDATE user SET votes='$_POST[gvotes]' WHERE id='$gid'";
$update_votes = mysqli_query($connect, $upd_v);

$upd_u_s = "UPDATE user SET status=1 WHERE id=$uid";
$update_user_status = mysqli_query($connect, $upd_u_s);

if ($update_votes & $update_user_status) {
	$grp = "SELECT id,name,votes,photo FROM user WHERE role=2";
	$groups = mysqli_query($connect, $grp);

	$groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

	$_SESSION['userdata']['status'] = 1;
	$_SESSION['groupsdata'] = $groupsdata;

	echo "
	 	<script>
	 	alert('Voting successful!');
	 	window.location = '../routes/dashboard.php';
 		</script>
 		";

}else{
	echo "
	 	<script>
	 	alert('Some error occured!');
	 	window.location = '../routes/dashboard.php';
 		</script>
 		";
}

 ?>