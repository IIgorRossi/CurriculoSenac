<?php
function salvarUpload($campo, $atual = '')
{
    if (empty($_FILES[$campo]) || $_FILES[$campo]['error'] !== UPLOAD_ERR_OK) {
        return $atual;
    }

    $permitidos = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $nomeOriginal = $_FILES[$campo]['name'];
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    if (!in_array($extensao, $permitidos)) {
        return $atual;
    }

    $pastaFisica = __DIR__ . '/../img/uploads/';
    if (!is_dir($pastaFisica)) {
        mkdir($pastaFisica, 0777, true);
    }

    $nomeArquivo = uniqid($campo . '_', true) . '.' . $extensao;
    $destino = $pastaFisica . $nomeArquivo;

    if (move_uploaded_file($_FILES[$campo]['tmp_name'], $destino)) {
        return './img/uploads/' . $nomeArquivo;
    }

    return $atual;
}

function normalizarPreco($preco)
{
    $preco = str_replace(['R$', ' ', '.'], '', $preco);
    return str_replace(',', '.', $preco);
}
?>
