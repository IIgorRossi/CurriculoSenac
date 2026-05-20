<?php
  include './backend/conexao.php';
  include './backend/validacao.php';

  $destino = './backend/usuario/inserir.php';

  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario Where id='$id'";
    $dados = mysqli_query($conexao, $sql);
    $usuarios = mysqli_fetch_assoc($dados);
    $destino = "./backend/usuario/alterar.php"
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ecolote </title>
    <link rel="icon" type="image/x-icon" href="./assets/imgs/icone.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/estilo.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
  </head>
  <body>

   <nav class="navbar navbar-expand-lg corbarra">
  <div class="container-fluid">
    

    <button onclick="abrirmenu()" class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#" > <img id="logo" src="./assets/imgs/logo.png" alt=""> </a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " id="lista"> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Público</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      
      </ul>
     
    </div>
  </div>
</nav>
<div id="escurecer" class="escurecer" onclick="abrirmenu()"></div>
    
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark">
                <aside id="sidebar" class="sidebar p-3 text-white bg-dark">
                    <h4> Seu painel </h4>
                    <h5>Bem-Vindo(a) <?php echo $_SESSION['usuario']?></h5>
                    <ul class="nav flex-column">

                        <li class="nav-item"> 
                            <a class="nav-link" href="#"><i class="fa-solid fa-users"></i> Usuários</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"><i class="fa-solid fa-shop"></i> Mercados</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"><i class="fa-solid fa-basket-shopping"></i> Produtos</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-5"> 
              <br>
              <h3> <i class="fa-solid fa-circle-plus"></i> Cadastro </h3>
                <form action="./backend/usuario/inserir.php" method="post" class="p-3">
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-address-card"></i> Nome</label>
                      <input type="text" name="nome" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-regular fa-envelope"></i> Email</label>
                      <input type="email" name="email" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-regular fa-id-card"></i> CPF </label>
                      <input type="text" name="cpf" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label  class="form-label"><i class="fa-solid fa-key"></i> Senha</label>
                      <input type="password" name="senha" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Cadastrar</button>
                  <button type="reset" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i> Limpar</button>
                </form>
            </div>
            <div class="col-md-5">
              <br>
              <h3> <i class="fa-solid fa-address-book"></i> Clientes </h3>
              <table class="table p-2" id="tabela">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opções </th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 
                    $sql = 'SELECT * FROM usuario';
                    $dados = mysqli_query($conexao, $sql);
                    while($coluna = mysqli_fetch_assoc($dados)){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $coluna['id']?></th>
                    <td><?php echo $coluna['nome']?></td>
                    <td><?php echo $coluna['email']?></td>
                    <td>
                      <a href=""> <i class="fa-regular fa-pen-to-square"></i></a> 
                      <a href="<?php echo './backend/usuario/excluir.php?id='.$coluna['id'] ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fa-regular fa-trash-can" style="color: rgb(220, 53, 69);"></i></a>
                  </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
        </div>
   </div>
   <script>
        function abrirmenu(){
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('escurecer').classList.toggle('show');
        }
   </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>