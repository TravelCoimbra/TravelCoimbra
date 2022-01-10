<?php
session_start();
include ("acess_db.php"); //script de acesso à base de dados

$latitude = str_replace(',', '.', $_POST['latitude']);
$longitude = str_replace(',', '.', $_POST['longitude']);
if($latitude>40.2183258 || $latitude<40.202591 || $longitude>(-8.3930668) || $longitude<(-8.5251928)){
	$_SESSION['out_of_bounds']= "1";
	header('Location: add_point.php');
	exit();
}
$insert = "INSERT INTO places (
								name,
								description,
								website,
								lat,
								lon,
								approved)
					VALUES ('".$_POST['name']."',
							'".$_POST['description']."',
							'".$_POST['website']."',
							'".$latitude."',
							'".$longitude."',
							0)";

		mysqli_query($conn,$insert);
		$_SESSION['point_added']= "1";
		header('Location: add_point.php');

		exit();
?>
