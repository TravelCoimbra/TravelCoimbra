<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados


$insert = "INSERT INTO users (
								username,
								password,
								email,
								permissions_idpermissions)
					VALUES ('".$_POST['username']."',
							'". $_POST['password'] ."',
							'".$_POST['email']."',
							2)";


		mysqli_query($conn,$insert);
		$_SESSION['user_created']= "1";
		header('Location: authentication-login.php');

		exit();
?>
