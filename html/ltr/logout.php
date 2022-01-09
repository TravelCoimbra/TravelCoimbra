<?php
session_start(); //para utilizar "session" tem de estar aqui no topo e em todos os scripts

//********destroi as variáveis sessão*******
unset($_SESSION["user_permission"]);
unset($_SESSION["id_user"]);
unset($_SESSION["user"]);
session_destroy();
//******************************************
header('Location: authentication-login.php');
exit();
?>
