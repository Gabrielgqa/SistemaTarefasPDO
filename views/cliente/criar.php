<?php
    require_once('../../config/config.php');
    require_once('../../models/Cliente.php');
    require_once('../../models/Usuario.php');

    session_start();

    if (!isset($_SESSION['id']) || $_SESSION['tipo'] != Usuario::TIPO_ADMIN) {
        header('location: ../../views/login.php');
    }
 ?>
<?php require_once('../../inc/head.php'); ?>
<body>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Criar Cliente</h3>
          <form method="POST" action="../../controllers/UsuarioController.php">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Selecione o Tipo</option>
                    <option value="1">Pessoa Física</option>
                    <option value="2">Pessoa Jurídica</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nome">CPF/CNPJ</label>
                <input type="text" class="form-control" id="documento" name="documento" required>
              </div>
              <input type="hidden" class="form-control" id="action" name="action" value="create">
              <input type="submit"  class="btn btn-default" value="Criar" style="float: right;">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>