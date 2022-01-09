<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados

$text = str_replace('"', '', $_POST['text_save']);
$update = 'UPDATE comments
					SET description="'.$text.'"
					WHERE idcomments="'.$_POST['save_hidden'].'";';

					echo $update;
		mysqli_query($conn,$update);
		$_SESSION['comment_updated']= "1";
		header('Location: comments.php');


		exit();
?>
