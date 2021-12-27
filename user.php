<?php
require_once 'includes/database.php';
?>

<?php
if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	$domain = explode('@', $email)[1];
		
	$sql="INSERT INTO users (email,domain) VALUES ('$email','$domain');";
	
	$result = mysqli_query($conn,$sql);
	
	if($result) { 
	echo "Data inserted successfully";
	header('location: display.php');
	} else {
		die(mysqli_error($conn));
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Add User Email</title>
</head>

<body>

<form method="post">
<input type="text" name="email" id="email" placeholder="E-mail">
<button type="submit" name="submit" id="submit">Submit</button>
</form>

</body>
</html>
