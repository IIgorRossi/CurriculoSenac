<?php 

include '../conexao.php';
include '../upload.php';

    $id       = $_REQUEST['id'];
    $foto     = salvarUpload('foto');
    $nome     = $_REQUEST['nome'];
    $email    = $_REQUEST['email'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $cnpj     = $_REQUEST['cnpj'];
    $mapa     = $_REQUEST['mapa'];
    $senha    = $_REQUEST['senha'];

$sql = "INSERT INTO mercado(nome, cnpj, email, senha, endereco, telefone, foto, mapa) 
VALUES ('$nome', '$cnpj', '$email', '$senha', '$endereco', '$telefone', '$foto', '$mapa')";

$resultado = mysqli_query($conexao, $sql);

header('Location:../../mercado.php');

?>  
