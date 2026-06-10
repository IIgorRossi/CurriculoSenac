<?php
include './backend/conexao.php';

$id = $_GET['id'] ?? 0;
$dadosMercado = mysqli_query($conexao, "SELECT * FROM mercado WHERE id='$id'");
$mercado = mysqli_fetch_assoc($dadosMercado);

if(!$mercado){
  echo "Mercado nao encontrado!";
  exit;
}

$produtos = mysqli_query($conexao , "SELECT * FROM produto WHERE mercado_id='$id' AND disponibilidade <> 'inativo' ORDER BY nome");
$telefoneWhats = preg_replace('/\D/', '', $mercado['telefone']);
$mapa = $mercado['mapa'] ?: 'https://maps.google.com/maps?q=' . urlencode($mercado['endereco']) . '&output=embed';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');</style>
    <title><?=$mercado['nome']?> | Ecolote</title>
</head>
<body>
<nav class="navbar navbar-expand-lg fundoamarelo public-navbar">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
      <i class="fa-solid fa-basket-shopping"></i> Ecolote
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php#mercados"><i class="fa-solid fa-arrow-left"></i> Mercados</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#produtos"><i class="fa-solid fa-tags"></i> Produtos</a></li>
      </ul>
      <a class="btn btn-roxo navbar-login" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
    </div>
  </div>
</nav>

<header class="mercado-banner" style="background-image:url('<?=$mercado['foto']?>')">
  <div class="container mercado-banner-content">
    <h1 class="fw-bold"><?=$mercado['nome']?></h1>
    <p class="mb-0"><i class="fa-solid fa-location-dot"></i> <?=$mercado['endereco']?></p>
  </div>
</header>

<section class="info-strip py-4">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-6"><strong>Email</strong><br><?=$mercado['email']?></div>
          <div class="col-md-6"><strong>Telefone</strong><br><?=$mercado['telefone']?></div>
          <div class="col-md-6"><strong>Endereco</strong><br><?=$mercado['endereco']?></div>
          <div class="col-md-6"><strong>CNPJ</strong><br><?=$mercado['cnpj']?></div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="map-box">
          <?php if(strpos($mapa, 'http') === 0){ ?>
            <iframe src="<?=$mapa?>" width="100%" height="180" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php }else{ ?>
            <div class="p-4"><?=$mapa?></div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<main class="container" id="produtos">
  <h2 class="mt-5 mb-2 fw-bold" style="color:#330672;">Produtos disponiveis</h2>
  <div class="row">
    <?php while($produto = mysqli_fetch_assoc($produtos)){?>
      <?php
        $mensagem = urlencode("Ola, gostaria de saber se o produto ".$produto['nome']." esta disponivel.");
        $whatsapp = "https://wa.me/55".$telefoneWhats."?text=".$mensagem;
        $receitas = mysqli_query($conexao, "SELECT receita.* FROM receita INNER JOIN produto_receita ON receita.id = produto_receita.receita_id WHERE produto_receita.produto_id=".$produto['id']." ORDER BY receita.nome");
      ?>
      <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex">
        <div class="card product-card">
          <img src="<?= $produto['imagem']?>" class="card-img-top card-img-fixed" alt="<?= $produto['nome']?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold" style="color:#330672;"><?= $produto['nome']?></h5>
            <p class="fs-4 fw-bold mb-3" style="color:#330672;">R$ <?= number_format($produto['preco'], 2, ',', '.')?></p>
            <a href="<?=$whatsapp?>" target="_blank" class="btn btn-whats w-100"><i class="fa-brands fa-whatsapp"></i> Consultar no WhatsApp</a>

            <?php if($receitas && mysqli_num_rows($receitas) > 0){ ?>
              <div class="recipe-list">
                <span class="recipe-title"><i class="fa-solid fa-utensils"></i> Receitas com este produto</span>
                <?php while($receita = mysqli_fetch_assoc($receitas)){ ?>
                  <div class="recipe-item d-flex gap-2 align-items-center mt-2">
                    <img src="<?=$receita['foto']?>" alt="<?=$receita['nome']?>">
                    <div>
                      <div class="fw-semibold"><?=$receita['nome']?></div>
                      <small><?=$receita['descricao']?></small>
                    </div>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</main>

<footer class="site-footer">
  <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
    <strong><?=$mercado['nome']?></strong>
    <span>Ofertas acompanhadas pelo Ecolote.</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
