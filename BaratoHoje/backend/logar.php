<?php
    //conectar com banco
    include './conexao.php';

    //receber o email e senha do front end por requisição
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    //sql que busca no banco um usuario com email e senha especifica
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' ";

    //executar sql
    $resultado = mysqli_query($conexao, $sql);

    //pegar valores das colunas
    $coluna = mysqli_fetch_assoc($resultado);

    //se o numero de linhas for maior que zero, pode logar
    if(mysqli_num_rows($resultado) > 0){
        session_start();
        //variaveis de sessao 
        $_SESSION['usuario'] = $coluna['nome'];
        $_SESSION['email'] = $coluna['email'];
        $_SESSION['senha'] = $coluna['senha'];
        $_SESSION['tipo'] = 'admin';


        header('location:../principal.php');
    }else{
        $sqlMercado = "SELECT * FROM mercado WHERE email = '$email' AND senha = '$senha' ";
        $resultadoMercado = mysqli_query($conexao, $sqlMercado);
        $mercado = mysqli_fetch_assoc($resultadoMercado);

        if(mysqli_num_rows($resultadoMercado) > 0){
            session_start();
            $_SESSION['usuario'] = $mercado['nome'];
            $_SESSION['email'] = $mercado['email'];
            $_SESSION['senha'] = $mercado['senha'];
            $_SESSION['tipo'] = 'mercado';
            $_SESSION['mercado_id'] = $mercado['id'];

            header('location:../produto.php');
        }else{
            // mantem na pagina no login caso errar
            header('location:../login.php');
        }
    }


?>
