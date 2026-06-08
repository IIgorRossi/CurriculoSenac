<?php
include '../conexao.php';
include '../upload.php';

$nome = $_REQUEST['nome'];
$descricao = $_REQUEST['descricao'];
$foto = salvarUpload('foto');

$sql = "INSERT INTO receita(nome, foto, descricao) VALUES ('$nome', '$foto', '$descricao')";
mysqli_query($conexao, $sql);

header('Location:../../receita.php');
?>
