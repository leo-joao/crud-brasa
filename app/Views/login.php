<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!------ Include the above in your HEAD tag ---------->

<body>

  <?php if (\Config\Services::validation()->getErrors()) { ?>
    <div class="alert alert-danger" role="alert">
      <?= \Config\Services::validation()->listErrors(); ?>
    </div>
  <?php
  }
  ?>
  <?php
  if (session()->get('error')) {
  ?>
    <div class="alert alert-danger" role="alert">

      <?php echo "<strong>" . session()->getFlashdata('error') . "</strong>"; ?>
    </div>
  <?php
  }
  ?>

  <div id="login">
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="<?php echo base_url() ?>auth" method="post">
              <h3 class="text-center text-info">Login Brasa School</h3>
              <div class="form-group">
                <label for="username" class="text-info">Usuário</label><br>
                <input type="text" name="login" id="login" class="form-control">
              </div>
              <div class="form-group">
                <label for="password" class="text-info">Senha:</label><br>
                <input type="password" name="pass" id="pass" class="form-control">
              </div>
              <br>
              <div class="form-group d-flex justify-content-between">
                <input type="submit" name="submit" class="btn btn-primary btn-md" value="Login">

                <button type="button" class="btn btn-warning btn-md float-right" onclick="newMessage()">Enviar Mensagem</button>

                <div id="register-link" class="text-right">
                  <a href="<?php echo base_url() ?>registration" class="text-info">Solicitar Registro</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  function newMessage(id) {
    window.location.href = "<?= base_url(); ?>newmsg";
  }
</script>
