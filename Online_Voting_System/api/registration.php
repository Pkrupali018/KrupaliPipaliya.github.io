<?php 

require_once "connect.php";

$name = $_POST['uname'];
$mobile = $_POST['mnum'];
$password = $_POST['pword'];
$confirm_password = $_POST['cpword'];
$address = $_POST['address'];
$imagename = $_FILES['image']['name'];
$size = $_FILES['image']['size'];
$tmp_name = $_FILES['image']['tmp_name'];
$ext = pathinfo($imagename,PATHINFO_EXTENSION);
$role = $_POST['role'];

if ($password==$confirm_password) {
	if (isset($image)) {
		if (!empty($imagename)) {
			$location = "../uploads/$image";
			$path = "$location.$image";
			move_uploaded_file($tmp_name, $path);
		}
	} 

	$sql = "INSERT INTO user(name, mobile, password, address, photo, role, status, votes) VALUES('$name', '$mobile', '$password', '$address', '$imagename', '$role', 0, 0)";
	if ($insert = mysqli_query($connect, $sql)) {
		

		echo "
	 	<script>
	 	alert('Register Successfully!!!');
	 	window.location = '../index.html';
 		</script>
 		";


	} else {
		echo "
	 	<script>
	 	alert('Some error occure');
	 	window.location = '../routes/registration.html';
 		</script>
 		";
	}
	
	
}else{
	echo "
	 	<script>
	 	alert('Password and Confirm Password dose not match: Please enter same password');
	 	window.location = '../routes/registration.html';
 		</script>
 		";
}

 ?>