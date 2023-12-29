<?php

$session = session();

$loginData = $session->get();

$userId = $loginData['id'];

foreach ($teachers as $teacher) {
  if (intval($teacher['id']) != $userId) {
    continue;
  }
  $name = $teacher['name'];
}

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('theme/') ?>dist/img/b.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Brasa Messenger</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('theme/') ?>dist/img/person.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?= $name; ?>
        </a>
      </div>
    </div>

    <a href="logout" class="d-block"><span class="right badge badge-danger">Sair</span></a>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
