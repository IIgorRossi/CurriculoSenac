<?php

include './backend/conexao.php';

$mercados = mysqli_query($conexao, "SELECT * FROM mercado ORDER BY nome");
$produtos = mysqli_query($conexao, "SELECT produto.*, mercado.nome
FROM produto INNER JOIN mercado ON mercado.id = produto.mercado_id ORDER BY produto.nome ");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');</style>
    <style> @import url('https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap');</style>
    <title>Ecolote</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg fundoamarelo">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Ecolote</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Mercados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Receitas</a>
        </li>
      </ul> 
      <a class="btn" href="login.php">  Login </a>
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
    <div class="carousel-item active">
      <img src="./img/imagem3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/imagem1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/imagem2.png" class="d-block w-100" alt="...">
    </div>
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
<br>
<h2 class="text-center " style="color: #330672;">Bem-vindo ao Ecolote</h2>
<br>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1830 85.285"><g transform="translate(0 -2185)"><path d="M4661.665,1785.181c-259.119,3.056-375.993,61.328-576.223,58.3-214.726-3.241-313.76-58.487-572.881-55.435-143.507,1.692-260.3,20.072-313.545,34.408v47.86h1830v-39.258C4967.885,1808.12,4859.114,1782.856,4661.665,1785.181Z" transform="translate(-3199.016 399.968)" fill="#330672"></path></g></svg>
<section style="background-color: #330672; margin: -1px; border-bottom: 4px solid #f5c63a;">
    <p class="text-center text-white" style="font-size: 20px; padding: 70px;">O Ecolote é um site que tem como objetivo ajudar as pessoas a encontrarem produtos a preços acessíveis, 
        economize dinheiro e combata o desperdício.</p>
</section>
<br>
<div class="container">
<div class="row">
<?php while($mercado = mysqli_fetch_assoc($mercados)){ ?>
    <div class="col-12 col-sm-6 col-lg-3 mt-4 d-flex justify-content-center  ">
        <div class="card" style="width: 16rem;">
            <img src="<?=$mercado['foto'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$mercado['nome']?></h5>
                <p class="card-text"> <i class="fa-solid fa-map-pin"></i> <?=$mercado['endereco']?></p>
                <p class="card-text"><i class="fa-brands fa-whatsapp"></i> <?= $mercado['telefone']?></p>

                <a href="mercado_detalhe.php?id=<?= $mercado['id'] ?>" class="btn btn-primary">Acessar</a>

            </div>
        </div>
    </div>
   <?php } ?>

  </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>