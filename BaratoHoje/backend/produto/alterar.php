<?php
    include '../conexao.php';
    include '../upload.php';
    session_start();

    $id       = $_REQUEST['id'];
    if(($_SESSION['tipo'] ?? '') == 'mercado'){
        $verifica = mysqli_query($conexao, "SELECT id FROM produto WHERE id='$id' AND mercado_id='".$_SESSION['mercado_id']."'");
        if(mysqli_num_rows($verifica) == 0){
            header('Location:../../produto.php');
            exit;
        }
    }
    $nome     = $_REQUEST['nome'];
    $preco   = normalizarPreco($_REQUEST['preco']);
    $disponibilidade = $_REQUEST['disponibilidade'];
    if(!in_array($disponibilidade, ['ativo', 'inativo'])){
        $disponibilidade = 'ativo';
    }
    $imagemAtual = $_REQUEST['imagem_atual'] ?? '';
    $imagem = salvarUpload('imagem', $imagemAtual);
    $mercado = $_REQUEST['mercado'];
    if(($_SESSION['tipo'] ?? '') == 'mercado'){
        $mercado = $_SESSION['mercado_id'];
    }
    $receitas = $_REQUEST['receitas'] ?? [];

    $sql = "UPDATE produto 
        SET 
            nome='$nome',
            preco='$preco', 
            disponibilidade = '$disponibilidade',
            imagem='$imagem',
            mercado_id='$mercado'
        WHERE id='$id'";
    if(($_SESSION['tipo'] ?? '') == 'mercado'){
        $sql .= " AND mercado_id='".$_SESSION['mercado_id']."'";
    }

    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) >= 0){
        mysqli_query($conexao, "DELETE FROM produto_receita WHERE produto_id='$id'");
        foreach ($receitas as $receitaId) {
            $receitaId = (int) $receitaId;
            mysqli_query($conexao, "INSERT INTO produto_receita(produto_id, receita_id) VALUES ('$id', '$receitaId')");
        }
    }

    header ('Location:../../produto.php')

?>
