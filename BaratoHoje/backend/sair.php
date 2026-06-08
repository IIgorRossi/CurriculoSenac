<?php
session_start();
session_destroy();

unset($_SESSION['usuario']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['tipo']);
unset($_SESSION['mercado_id']);

header('Location:../login.php');
exit;
?>
