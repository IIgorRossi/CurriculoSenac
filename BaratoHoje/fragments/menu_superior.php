<nav class="navbar navbar-expand-lg admin-navbar">
  <div class="container-fluid">
    <button onclick="abrirmenu()" class="navbar-toggler admin-menu-button" type="button" aria-label="Abrir menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand admin-brand" href="./produto.php">
      <img id="logo" src="./assets/imgs/logo.png" alt="Ecolote">
      <span>Ecolote</span>
    </a>

    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="admin-user d-none d-sm-inline">
        <i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['usuario'] ?? 'Usuario'; ?>
      </span>
      <a class="btn btn-outline-light btn-sm admin-logout" href="./backend/sair.php">
        <i class="fa-solid fa-right-from-bracket"></i> Sair
      </a>
    </div>
  </div>
</nav>
