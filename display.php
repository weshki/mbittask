<?php
require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CRUD PHP Display</title>
</head>
<body>
    
<button><a href="user.php">Add user</a></button>
<table>
<thead>
<tr>
<th>ID</th>
<th>EMAIL</th>
<th>TIME</th>
<th>DOMAIN</th>
<th>BUTTONS</th>
</tr>
</thead>
<tbody>
<?php
    
if(isset($_POST['sort'])) {
	$sort=$_POST['sort'];
	$sql="SELECT * FROM users ORDER BY $sort ASC;"; 
	
	} elseif (isset($_POST['searchdomain'])) {
		$searchdomain = $_POST['searchdomain'];
	$sql="SELECT * FROM users WHERE domain='$searchdomain';";

	} else {
	$sql="SELECT * FROM users ORDER BY ts DESC";
}
echo $sql;
$result=mysqli_query($conn,$sql);
if($result) {
	
	while($row=mysqli_fetch_assoc($result)) {
	$id=$row['id'];
	$email=$row['email'];
	$time=$row['ts'];
	$domain = $row['domain'];

echo '<tr>
<td>'.$id.'</td>
<td>'.$email.'</td>
<td>'.$time.'</td>
<td>'.$domain.'</td>
<td>
<button><a href="update.php?updateid='.$id.'">Update</a></button>
<button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
</td>
</tr>';
	}
	echo '</tbody></table>';
}

echo '<form method="POST" action="display.php">';

echo '<input type="submit" name="sort" value="domain">';
echo '<input type="submit" name="sort" value="ts">';
echo '<input type="submit" name="sort" value="email">';
echo '<input type="submit" name="sort" value="id">';

echo '</form>';

// DOMAINS LIST

echo '<br/><table>
<thead>
<tr>
<th>DOMAIN LIST</th>
</tr>
</thead>
<tbody>';

$sql="SELECT  domain, email FROM users ORDER BY domain ASC";
$result=mysqli_query($conn,$sql);
if($result) {
	
	while($row=mysqli_fetch_assoc($result)) {
	$email = $row['email'];	
	$domain = $row['domain'];
echo '<tr>
<td>'.$domain.'</td>
<td>'.$email.'</td>
</tr>';
	}
	echo '</tbody></table>';
}

// UNIQUE DOMAIN LIST 

echo '<br/><table>
<thead>
<tr>
<th>UNIQUE DOMAINS</th>
</tr>
</thead>
<tbody>';

$sql="SELECT DISTINCT domain FROM users ORDER BY domain ASC";
$result=mysqli_query($conn,$sql);
if($result) {
	echo '<form method="post">';
	while($row=mysqli_fetch_assoc($result)) {
	$domainunique = $row['domain'];
echo '<tr><td><form method="post">
<input type="submit" name="searchdomain" value="'.$domainunique.'"></td></tr>';
	}
	echo '</form></tbody></table>';
}

?>


</body>
</html>

