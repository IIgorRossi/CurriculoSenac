<?php
  include './backend/conexao.php';
  include './backend/validacao.php';
  if(($_SESSION['tipo'] ?? 'admin') != 'admin'){
    header('Location:produto.php');
    exit;
  }

  $destino = './backend/receita/inserir.php';

  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $dados = mysqli_query($conexao, "SELECT * FROM receita WHERE id='$id'");
    $receita = mysqli_fetch_assoc($dados);
    $destino = './backend/receita/alterar.php';
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
  <?php include './fragments/menu_superior.php' ?>
  <?php include './fragments/menu_lateral.php' ?>

            <div class="col-md-5">
              <br>
              <h3><i class="fa-solid fa-utensils"></i> Receita</h3>
              <form action="<?=$destino ?>" method="post" enctype="multipart/form-data" class="p-3">
                <div class="mb-3">
                  <label class="form-label">ID</label>
                  <input value="<?= isset($receita) ? $receita['id'] : '' ?>" type="text" name="id" class="form-control" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nome da receita</label>
                  <input value="<?= isset($receita) ? $receita['nome'] : '' ?>" type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Foto</label>
                  <input type="file" name="foto" class="form-control" accept="image/*">
                  <input type="hidden" name="foto_atual" value="<?= isset($receita) ? $receita['foto'] : '' ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Descricao</label>
                  <textarea name="descricao" class="form-control" rows="5" required><?= isset($receita) ? $receita['descricao'] : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Cadastrar</button>
                <button type="reset" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i> Limpar</button>
              </form>
            </div>
            <div class="col-md-5">
              <br>
              <h3><i class="fa-solid fa-list"></i> Receitas</h3>
              <table class="table p-2" id="tabela">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Opcoes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $dados = mysqli_query($conexao, 'SELECT * FROM receita ORDER BY nome');
                    while($coluna = mysqli_fetch_assoc($dados)){
                  ?>
                  <tr>
                    <th scope="row"><?=$coluna['id']?></th>
                    <td><?=$coluna['nome']?></td>
                    <td>
                      <a href="./receita.php?id=<?=$coluna['id']?>"><i class="fa-regular fa-pen-to-square"></i></a>
                      <a href="./backend/receita/excluir.php?id=<?=$coluna['id']?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fa-regular fa-trash-can" style="color: rgb(220, 53, 69);"></i></a>
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
