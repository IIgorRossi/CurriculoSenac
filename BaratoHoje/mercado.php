<?php
  include './backend/conexao.php';
  include './backend/validacao.php';

  $destino = './backend/mercado/inserir.php';

  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM mercado Where id='$id'";
    $dados = mysqli_query($conexao, $sql);
    $mercados = mysqli_fetch_assoc($dados);
    $destino = "./backend/mercado/alterar.php";}
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

     <?php
  include './fragments/menu_superior.php'
  ?>

  <?php
  include './fragments/menu_lateral.php'
  ?>
            <div class="col-md-5"> 
              <br>
              <h3> <i class="fa-solid fa-circle-plus"></i> Cadastro </h3>
                <form action="<?=$destino ?>" method="post" class="p-3">
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-address-card"></i> ID</label>
                      <input value="<?php echo isset($mercados) ? $mercados['id'] : "" ?>" type="text" name="id" class="form-control" readonly>    
                  </div>
                   <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-image"></i> Foto</label>
                      <input value="<?php echo isset($mercados) ? $mercados['foto'] : "" ?>" type="file" name="foto" class="form-control" >    
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-address-card"></i> Nome</label>
                      <input value="<?php echo isset($mercados) ? $mercados['nome'] : "" ?>" type="text" name="nome" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-regular fa-envelope"></i> Email</label>
                      <input value="<?php echo isset($mercados) ? $mercados['email'] : "" ?>" type="email" name="email" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-map-pin"></i> Endereço</label>
                      <input value="<?php echo isset($mercados) ? $mercados['endereco'] : "" ?>" type="text" name="endereco" class="form-control">
                  </div>
                   <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-phone"></i> Telefone </label>
                      <input value="<?php echo isset($mercados) ? $mercados['telefone'] : "" ?>" type="text" name="telefone" class="form-control">    
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-address-card"></i> CNPJ </label>
                      <input value="<?php echo isset($mercados) ? $mercados['cnpj'] : "" ?>" type="text" name="cnpj" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-map"></i> Mapa</label>
                      <input value="<?php echo isset($mercados) ? $mercados['mapa'] : "" ?>" type="text" name="mapa" class="form-control" >    
                  </div>
                  <div class="mb-3">
                      <label  class="form-label"><i class="fa-solid fa-key"></i> Senha</label>
                      <input value="<?php echo isset($mercados) ? $mercados['senha'] : "" ?>" type="password" name="senha" class="form-control">  
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
                    $sql = 'SELECT * FROM mercado';
                    $dados = mysqli_query($conexao, $sql);
                    while($coluna = mysqli_fetch_assoc($dados)){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $coluna['id']?></th>
                    <td><?php echo $coluna['nome']?></td>
                    <td><?php echo $coluna['email']?></td>
                    <td>
                      <a href="./mercado.php?id=<?=$coluna['id']?>"> <i class="fa-regular fa-pen-to-square"></i></a> 
                      <a href="<?php echo './backend/mercado/excluir.php?id='.$coluna['id'] ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fa-regular fa-trash-can" style="color: rgb(220, 53, 69);"></i></a>
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