<?php
include_once 'inc/config.php';
include_once 'inc/header.php';

if(isset($_POST['atualizar']))
{
    //capturar dados do formulario
    $id= $_GET['id'];
    $tituloProjeto = $_POST['tituloProjeto'];
    $descricaoProjeto = $_POST['descricaoProjeto'];
    $dataProjeto = $_POST['dataProjeto'];
    $horaProjeto = $_POST['horaProjeto'];
    

    //proceeder á alteração e informar
   // $objeto_crud->atualizar($id,$tituloProjeto,$descricaoProjeto,$horaInicio,$dataInicio);
  $objeto_projeto->updateProjeto($id,$tituloProjeto,$descricaoProjeto,$horaProjeto,$dataProjeto);

    header("Location: editarProjetos.php?atualizado");
}

if (isset($_GET['atualizado'])) {
    $mensagem = '<div class="alert alert-success mt-3" role="alert" >
        <strong>Sucesso</strong> O registo foi atualizado!
    </div>';
}
//apresentar a mensagem de ocorrência
if (isset($mensagem)) {
    echo $mensagem; 
}

if (isset($_GET['id'])) {
    $id= $_GET['id'];
  extract($objeto_projeto->CheckID($id));
 // extract($objeto_crud->CheckID($id));
}

?>

<!-- Projeto form -->
<form class="text-center border border-light p-5" method="POST">
    <p class="h4 mb-4">Editar Projeto</p>
     <!-- Title -->
     <div class="form-group">
        <input type="text" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Titulo" name="tituloProjeto"
        value="<?php printf(" %s\n", $titulo); ?>">
    </div>
    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Descrição" 
        name="descricaoProjeto"><?php printf(" %s\n", $descricao)?></textarea>
    </div>

   <!-- Hour -->
   <div class="form-group">
        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="horaProjeto" />
            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                <div class="input-group-text"><span class="oi oi-clock"></span></div>
            </div>
        </div>
    </div>
    <!-- Date -->
    <div class="form-group">
        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="dataProjeto" />
            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                <div class="input-group-text"><span class="oi oi-calendar"></span></div>
            </div>
        </div>
    </div>

    <!-- Copy -->
    <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
        <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit" id="buttonRegistar" name="atualizar">Atualizar</button>
<!-- back button -->
<a href="mostrarProjetos.php" class="btn btn-secondary btn-block" role="button">Voltar</a>
</form>
<!-- Default form contact -->
<?php
include_once 'inc/footer.php';
?>
<script src="js/inserirProjeto.js"></script>