<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados


$delete = "DELETE FROM comments
					WHERE idcomments='".$_POST['delete_hidden']."';";


		mysqli_query($conn,$delete);
		$_SESSION['comment_deleted']= "1";
		header('Location: comments.php');

		exit();
?>
