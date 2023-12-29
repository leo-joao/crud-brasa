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
  <form action="<?= base_url() ?>/register" method="post" class="text-left">
    <div class="form-group">
      <label for="nameInputLabel">Nome:</label>
      <input type="text" class="form-control" id="nameInputLabel" name="name">
    </div>
    <div class="form-group">
      <label for="birthInputLabel">Nascimento:</label>
      <input type="date" class="form-control" id="birthInputLabel" name="birth">
    </div>
    <div class="form-group">
      <label for="statelInputLabel">Estado:</label>
      <input type="text" class="form-control" id="statelInputLabel" name="state">
    </div>
    <div class="form-group">
      <label for="citylInputLabel">Cidade:</label>
      <input type="text" class="form-control" id="citylInputLabel" name="city">
    </div>
    <div class="form-group">
      <label for="emailInputLabel">E-mail:</label>
      <input type="text" class="form-control" id="emailInputLabel" name="email">
    </div>
    <div class="form-group">
      <label for="wpplInputLabel">WhatsApp:</label>
      <input type="text" class="form-control" id="wpplInputLabel" name="whatsapp">
    </div>

    <div class="form-group">
      <label for="subjectInputLabel">Especialização:</label>

      <?php
      $options = array_column($subjects, 'description', 'id');
      echo form_dropdown('subject', $options, '', 'class="form-select form-control" name="subject"');
      ?>

    </div>

    <button type="submit" class="btn btn-primary ml-3 mt-3" name="submit">Enviar</button>
  </form>
</div>
