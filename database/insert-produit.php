<?php
	require_once 'conn.php';
 
	if(ISSET($_POST['insert'])){
		try{
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) VALUES ('$firstname', '$lastname', '$username', '$password')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		$conn = null;
 
		echo "<script>alert('Successfully inserted data!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
?>