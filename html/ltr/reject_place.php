<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados


$delete = "DELETE FROM places
					WHERE idplaces='".$_POST['reject_hidden']."';";


		mysqli_query($conn,$delete);
		$_SESSION['place_deleted']= "1";
		header('Location: list_points.php');

		exit();
?>
