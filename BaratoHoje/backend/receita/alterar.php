<?php
include '../conexao.php';
include '../upload.php';

$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$descricao = $_REQUEST['descricao'];
$fotoAtual = $_REQUEST['foto_atual'] ?? '';
$foto = salvarUpload('foto', $fotoAtual);

$sql = "UPDATE receita SET nome='$nome', foto='$foto', descricao='$descricao' WHERE id='$id'";
mysqli_query($conexao, $sql);

header('Location:../../receita.php');
?>
