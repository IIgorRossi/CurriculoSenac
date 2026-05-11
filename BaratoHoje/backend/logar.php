<?php
    //conectar com banco
    include './conexao.php';


    //receber o email e senha do front end po requisição
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    //sql que busca no banco um usuario com email e senha especifica 
    $sql = "SELECT * FROM  usuario WHERE email = '$email' AND senha = '$senha' ";
    //executar sql
    $resultado = mysqli_query($conexao, $sql);
    //pegar valores das colunas
    $coluna = mysqli_fetch_assoc($resultado);
    //imprimir o encontrado
    echo $coluna['nome'];
?>