<?php if (\Config\Services::validation()->getErrors()) {
?>
  <div class="alert alert-danger" role="alert">
    <?= \Config\Services::validation()->listErrors(); ?>
  </div>
<?php
}
helper('form');

if (session()->has('success')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session('success') ?>
  </div>
<?php endif; ?>

<?php if (\Config\Services::validation()->getErrors()) : ?>
  <div class="alert alert-danger" role="alert">
    <?= \Config\Services::validation()->listErrors(); ?>
  </div>
<?php endif;

?>

<div class="container mt-5">
  <form action="<?= base_url() ?>/sendMessage" method="post" class="text-left">

    <div class="form-group">
      <label for="name">Seu nome</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="form-group">
      <label for="teacherSelect">Professor:</label>
      <?php
      $options = array_column($teachers, 'name', 'id');
      echo form_dropdown('teacher', $options, '', 'class="form-select form-control" name="teacher"');
      ?>
    </div>


    <div class="form-group">
      <label for="content">Escreva sua mensagem:</label>
      <textarea id="content" class="form-control" name="content"></textarea>
    </div>

    <button type="submit" class="btn btn-primary ml-3 mt-3" name="submit">Enviar</button>
  </form>
</div>
