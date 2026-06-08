<div id="escurecer" class="escurecer" onclick="abrirmenu()"></div>
    
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark admin-sidebar-wrap">
                <aside id="sidebar" class="sidebar p-3 text-white bg-dark">
                    <h4>Seu painel</h4>
                    <h5>Bem-vindo(a) <?php echo $_SESSION['usuario']?></h5>
                    <ul class="nav flex-column">
                        <?php if(($_SESSION['tipo'] ?? 'admin') == 'admin'){ ?>
                        <li class="nav-item"> 
                            <a class="nav-link" href="./principal.php"><i class="fa-solid fa-users"></i> Usuarios</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="./mercado.php"><i class="fa-solid fa-shop"></i> Mercados</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="./receita.php"><i class="fa-solid fa-utensils"></i> Receitas</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item"> 
                            <a class="nav-link" href="./produto.php"><i class="fa-solid fa-basket-shopping"></i> Produtos</a>
                        </li>
                    </ul>
                </aside>
            </div>
