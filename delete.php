<?php
require_once 'includes/database.php';

if(isset($_GET['deleteid'])) {
	$id=$_GET['deleteid'];
	
	$sql="DELETE FROM users WHERE id = $id;";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header('location: display.php');
	} else {
		echo "Not Deleted successfully";
	// die(mysqli_error($conn));
	}
} else {
echo "Problem!";
}
?>