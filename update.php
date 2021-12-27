<?php
require_once 'includes/database.php';


	$id=$_GET['updateid'];
	$sql="SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);

if($row) {
	$email=$row['email'];
	$domain = $row['domain'];
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Email</title>
</head>

<body>

<form method="post">
<input type="text" name="email" id="email" placeholder="E-mail" value=<?php echo$email;?>>
<button type="submit" name="submit" id="submit">Update</button>
</form>

<?php 

if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	$domain = explode('@', $email)[1];
		
	$sql="UPDATE users SET email='$email', domain='$domain' WHERE id=$id;";
	
	$result = mysqli_query($conn,$sql);
	
	if($result) { 
	header('location: display.php');
	}
}
?>

</body>
</html>