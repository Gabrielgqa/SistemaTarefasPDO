<?php require_once('../../inc/head.php'); ?>
<body>
  <?php session_start(); ?>
  <?php require_once('../../inc/header.php'); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Clientes</h3>
          <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info" role="alert">
          <?= $_SESSION['message']; ?>
          <?php unset($_SESSION['message']); ?>
        </div>
        <?php endif; ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Tipo</th>
              <th>CPF/CNPJ</th>
              <th>Telefone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php require_once('../../includes/clientes_list.php'); ?>
          </tbody>
        </table>

        <a class="btn btn-success btn-sm pull-right" href="criar.php">Criar novo</a>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../../inc/scripts.php'); ?>
</body>
</html>
