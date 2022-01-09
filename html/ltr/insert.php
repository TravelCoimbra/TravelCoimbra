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
							'".$_POST['permission']."')";


		mysqli_query($conn,$insert);
		$_SESSION['user_created']= "1";
		header('Location: add_user.php');

		exit();
?>
