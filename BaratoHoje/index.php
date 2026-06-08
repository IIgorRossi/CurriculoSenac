<?php
include './backend/conexao.php';

$mercados = mysqli_query($conexao, "SELECT * FROM mercado ORDER BY nome");
$totalMercados = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM mercado"))['total'] ?? 0;
$totalProdutos = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM produto WHERE disponibilidade='ativo'"))['total'] ?? 0;
@mysqli_query($conexao, "INSERT INTO site_visita(pagina, visualizacoes) VALUES ('index', 1) ON DUPLICATE KEY UPDATE visualizacoes = visualizacoes + 1");
$dadosVisita = @mysqli_query($conexao, "SELECT visualizacoes FROM site_visita WHERE pagina='index'");
$visualizacoes = $dadosVisita ? (mysqli_fetch_assoc($dadosVisita)['visualizacoes'] ?? 0) : 0;
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
    <title>Ecolote</title>
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
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#mercados"><i class="fa-solid fa-shop"></i> Mercados</a></li>
        <li class="nav-item"><a class="nav-link" href="#mercados"><i class="fa-solid fa-tags"></i> Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="#mercados"><i class="fa-solid fa-utensils"></i> Receitas</a></li>
      </ul>
      <a class="btn btn-roxo" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active"><img src="./img/imagem3.png" class="d-block w-100" alt="Ofertas do Ecolote"></div>
    <div class="carousel-item"><img src="./img/imagem1.png" class="d-block w-100" alt="Economia no mercado"></div>
    <div class="carousel-item"><img src="./img/imagem2.png" class="d-block w-100" alt="Produtos acessiveis"></div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Proximo</span>
  </button>
</div>

<section class="text-center py-4">
  <h2 class="fw-bold" style="color: #330672;">Bem-vindo ao Ecolote</h2>
</section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1830 85.285"><g transform="translate(0 -2185)"><path d="M4661.665,1785.181c-259.119,3.056-375.993,61.328-576.223,58.3-214.726-3.241-313.76-58.487-572.881-55.435-143.507,1.692-260.3,20.072-313.545,34.408v47.86h1830v-39.258C4967.885,1808.12,4859.114,1782.856,4661.665,1785.181Z" transform="translate(-3199.016 399.968)" fill="#330672"></path></g></svg>
<section class="hero-copy">
  <p class="text-center text-white">O Ecolote ajuda voce a encontrar produtos com precos acessiveis, economizar dinheiro e combater o desperdicio.</p>
</section>

<main class="container" id="mercados">
  <div class="social-proof">
    <div class="proof-item text-center">
      <span class="proof-number"><?= $visualizacoes ?></span>
      <span>visualizacoes na pagina inicial</span>
    </div>
    <div class="proof-item text-center">
      <span class="proof-number"><?= $totalMercados ?></span>
      <span>mercados parceiros</span>
    </div>
    <div class="proof-item text-center">
      <span class="proof-number"><?= $totalProdutos ?></span>
      <span>produtos ativos</span>
    </div>
  </div>

  <h3 class="mt-5 mb-2 fw-bold" style="color:#330672;">Mercados em destaque</h3>
  <div class="row">
    <?php while($mercado = mysqli_fetch_assoc($mercados)){ ?>
      <div class="col-12 col-sm-6 col-lg-3 mt-4 d-flex">
        <div class="card market-card">
          <img src="<?=$mercado['foto'] ?>" class="card-img-top card-img-fixed" alt="<?=$mercado['nome']?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold" style="color:#330672;"><?=$mercado['nome']?></h5>
            <p class="card-text small mb-2"><i class="fa-solid fa-map-pin"></i> <?=$mercado['endereco']?></p>
            <p class="card-text small"><i class="fa-brands fa-whatsapp"></i> <?=$mercado['telefone']?></p>
            <a href="mercado_detalhe.php?id=<?= $mercado['id'] ?>" class="btn btn-roxo w-100 mt-auto">Acessar ofertas</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</main>

<footer class="site-footer">
  <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
    <strong>Ecolote</strong>
    <span>Economia inteligente para compras do dia a dia.</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
