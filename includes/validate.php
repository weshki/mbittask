<?php

if (isset($_POST['submit'])) {
	require_once 'database.php';
	$email = $_POST['email'];
	
// error message if email field is empty

	if (empty($email) || trim($email)=='') {
	header("Location: ../index.php?error=emptyfield");
	exit();
	}

// checks if symbols allowed

	if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/", $email)) {
		header("Location: ../index.php?error=invalidemail");
		exit();
	} 
	
// checks if checkbox is checked

	if (!isset($_POST['agree'])) {

 		header("Location: ../index.php?error=checkboxunchecked");
		exit();
	}

// checkes if .co is used

	if (substr($email,-3)==".co") {
 		header("Location: ../index.php?error=coaddress");
		exit();		
	}

// checks if email already exists with prepared statement

else {
	$sql = "SELECT email FROM users WHERE email = ?";
	
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("Location: ../index.php?error=sqlerror1");
	exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$rowCount = mysqli_stmt_num_rows($stmt);
		if ($rowCount > 0) {
			header("Location: ../index.php?error=emailtaken");
			exit();
			} else {
				
// INSERT DATA
				$domain = explode('@', $email)[1];
				$sql = "INSERT INTO users (email, domain) VALUES (?, ?);";
				$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) { 
	
					header("Location: ../index.php?error=sqlerror2");
					exit();			
					} else {
						mysqli_stmt_bind_param($stmt, "ss", $email, $domain);
						mysqli_stmt_execute($stmt); 
					header("Location: ../success.php?succes=registered");
					exit();							
					}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

?>