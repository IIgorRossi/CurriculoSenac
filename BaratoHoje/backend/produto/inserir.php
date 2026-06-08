<?php
include '../conexao.php';
include '../upload.php';
session_start();
//receber os dados dos names do frontend
$nome = $_REQUEST['nome'];
$preco = normalizarPreco($_REQUEST['preco']);
$disponibilidade = $_REQUEST['disponibilidade'];
if(!in_array($disponibilidade, ['ativo', 'inativo'])){
    $disponibilidade = 'ativo';
}
$imagem = salvarUpload('imagem');
$mercado = $_REQUEST['mercado'];
if(($_SESSION['tipo'] ?? '') == 'mercado'){
    $mercado = $_SESSION['mercado_id'];
}
$receitas = $_REQUEST['receitas'] ?? [];

//inserção em SQL - linguagem do banco
$sql = "INSERT INTO produto(nome, preco, disponibilidade, imagem, mercado_id) 
VALUES ('$nome','$preco','$disponibilidade','$imagem','$mercado')";
//executar
$resultado = mysqli_query($conexao, $sql);
$produtoId = mysqli_insert_id($conexao);

foreach ($receitas as $receitaId) {
    $receitaId = (int) $receitaId;
    mysqli_query($conexao, "INSERT INTO produto_receita(produto_id, receita_id) VALUES ('$produtoId', '$receitaId')");
}

//atualizar a pagina
header('Location:   ../../produto.php');
?>
