<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados

$select = "SELECT
				users.*
			FROM
				users
			WHERE users.username ='".$_POST['username']."'
			LIMIT 1" ;

//echo $select;
//exit();

$resultado = mysqli_query($conn, $select);

$numero_de_linhas = mysqli_num_rows($resultado);

if($numero_de_linhas==1)
	{
		$_SESSION['user_exists']= "1";
		mysqli_close($conn);
		header('Location: authentication-register.php');
		exit();
	}

	$select = "SELECT
					users.*
				FROM
					users
				WHERE users.email ='".$_POST['email']."'
				LIMIT 1" ;

	//echo $select;
	//exit();

	$resultado = mysqli_query($conn, $select);

	$numero_de_linhas = mysqli_num_rows($resultado);

	if($numero_de_linhas==1)
		{
			$_SESSION['email_exists']= "1";
			mysqli_close($conn);
			header('Location: authentication-register.php');
			exit();
		}

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
