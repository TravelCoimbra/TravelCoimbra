<?php
session_start(); //para utilizar "session" tem de estar aqui no topo e em todos os scripts



include ("acess_db.php"); //script de acesso à base de dados

//******************************deteta se o user existe********************************
$select = "SELECT
				users.idusers,
				users.username,
				users.password,
				users.email,
				users.permissions_idpermissions
			FROM
				users
			WHERE users.username ='".$_POST['Username']. "'
			LIMIT 1" ;

//echo $select;
//exit();

$resultado = mysqli_query($conn, $select);

$numero_de_linhas = mysqli_num_rows($resultado);

if($numero_de_linhas==0)
	{
		$_SESSION['user_nonexistent']= "1";
		mysqli_close($conn);
		header('Location: authentication-login.php');
		exit();
	}
//*************************************************************************************
else
//*****************deteta se tem tentativas ou se está bloqueado na descrição**********
{
			$select = "SELECT
							users.idusers,
							users.username,
							users.password,
							users.email,
							users.permissions_idpermissions
						FROM
							users
						WHERE users.username ='".$_POST['Username']. "'
							AND users.password = '".$_POST['Password']. "'
						LIMIT 1" ;
			$resultado = mysqli_query($conn, $select);

			$numero_de_linhas = mysqli_num_rows($resultado);
			if($numero_de_linhas==0)
				{
				$_SESSION['wrong_password']= "1";
				mysqli_close($conn);
				header('Location: authentication-login.php');
				exit();
				}
			else
				{

				$linha=mysqli_fetch_array($resultado);
				$_SESSION['user_permission']= $linha["permissions_idpermissions"];
				$_SESSION['id_user']= $linha["idusers"];
				$_SESSION['user']= $linha["username"];

				header('Location: index.php');

				exit();
				}
			}
?>
