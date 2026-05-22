<?php
    include '../conexao.php';

    $id       = $_REQUEST['id'];
    $foto     = $_REQUEST['foto'];
    $nome     = $_REQUEST['nome'];
    $email    = $_REQUEST['email'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $cnpj     = $_REQUEST['cnpj'];
    $mapa     = $_REQUEST['mapa'];
    $senha    = $_REQUEST['senha'];

    $sql = "UPDATE mercado 
        SET 
            nome='$nome',
            cnpj='$cnpj',
            email='$email',
            senha='$senha',
            endereco='$endereco',
            telefone='$telefone',
            foto='$foto',
            mapa='$mapa'
        WHERE id='$id'";

    $resultado = mysqli_query($conexao, $sql);

    header ('Location:../../mercado.php')

?>