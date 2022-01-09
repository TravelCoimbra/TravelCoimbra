<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados


$update = "UPDATE places
					SET approved=1
					WHERE idplaces='".$_POST['approve_hidden']."';";


		mysqli_query($conn,$update);
		$_SESSION['user_deleted']= "1";
		header('Location: list_points.php');


		exit();
?>
