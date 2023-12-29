<?php

$session = session();

$loginData = $session->get();

$userId = $loginData['id'];
$isLogged = $loginData['isLogged'];
?>

<div class="modal fade" id="modal-answer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Responder mensagem</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Resposta</label>
                <input type="hidden" id="idMensagem" class="idMensagem">
                <textarea id="teacher_answer" class="form-control" name="teacher_answer"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="/mensagens/responder" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Editar resposta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Editar resposta</label>
                <textarea id="edit" class="form-control" name="edit"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mensagens</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Remetente</th>
                  <th>Mensagem</th>
                  <th>Resposta</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mensagens as $mensagem) :
                  $idMensagem = $mensagem['id'];
                  $aluno = $alunos[$mensagem['sender']];
                  $nomeAluno = $aluno['name'];
                  $teacher = $mensagem['receiver'];

                  $editEnable = '';
                  $answerEnable = '';
                  ($mensagem['teacher_answer'] != NULL) ? $answerEnable = 'disabled' : $editEnable = 'disabled';
                ?>
                  <tr data-id="<?= $idMensagem; ?>">
                    <td><?= $nomeAluno ?></td>
                    <td><?= $mensagem['content'] ?></td>
                    <td><?= $mensagem['teacher_answer'] ?></td>
                    <td><?= ($mensagem['teacher_answer'] != NULL) ? "Respondida" : "Pendente" ?></td>
                    <td>
                      <button type="button" id="answer" class="btn btn-info answer" data-toggle="modal" data-target="#modal-answer" value="<?= $idMensagem; ?>" <?= $answerEnable; ?>>Responder</button>
                      <button type="button" id="edit" class="btn btn-warning edit" data-toggle="modal" data-target="#modal-answer" value="<?= $idMensagem; ?>" <?= $editEnable; ?>>Editar Resposta</button>
                      <button type="button" id="delete" class="btn btn-danger delete" data-toggle="modal" data-target="#modal-delete" value="<?= $idMensagem; ?>" onclick="delete_message('<?= $idMensagem; ?>')">Excluir</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(document).ready(function() {

    function delete_message(id) {
      if (!confirm("Deseja realmente excluir a mensagem?")) {
        return false;
      }
      window.location.href = "<?= base_url(); ?>/delete/" + id;
    }

    $(".answer").on("click", function() {
      var idMensagem = $(this).val();
      $("#idMensagem").val(idMensagem);
    });

    $(".edit").on("click", function() {
      var idMensagem = $(this).val();
      var tr = $("tr[data-id='" + idMensagem + "']");

      $("#idMensagem").val(idMensagem);
      $("#teacher_answer").val(tr.find("td:nth-child(3)").text());

    });

    $("#modal-answer form").submit(function(e) {
      e.preventDefault();

      var formData = $(this).serialize();

      var formData = $(this).serialize() + "&idMensagem=" + $("#idMensagem").val();

      console.log(formData)

      $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/responder",
        data: formData,
        success: function(response) {
          console.log(response);

          var idMensagem = $("#modal-answer input[type='hidden']").val();
          var tr = $("tr[data-id='" + idMensagem + "']");

          tr.find("td:nth-child(3)").text(response.teacher_answer);
          if (response.teacher_answer != '') {
            tr.find("td:nth-child(4)").text("Respondida");
          }
        },
        error: function(error) {
          console.log(error);
        }
      });

      $("#modal-answer").modal("hide");
    });

    // fim document ready
  });
</script>
