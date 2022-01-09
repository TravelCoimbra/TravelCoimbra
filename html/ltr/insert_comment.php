<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados


$insert = "INSERT INTO comments (
								description,
								date_created,
								users_idusers,
								places_idplaces)
					VALUES ('".$_POST['comment']."',
									NOW(),
									'".$_SESSION['id_user']."',
									'".$_POST['place']."')";

		mysqli_query($conn,$insert);
		$_SESSION['comment_added']= "1";
		header('Location: add_comment.php');

		exit();
?>
