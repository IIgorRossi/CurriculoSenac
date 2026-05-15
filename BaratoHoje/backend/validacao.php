<?php
// iniciar sessao 
session_start();

//se nao existir a variavel email e senha 
if(!isset($_SESSION["email"]) or !isset($_SESSION["senha"])){
    //destruir session_start
    session_destroy();

    //limpar variaves de sessao 
    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    //manda login
    header('location:../baratohoje/login.php');
}
?>