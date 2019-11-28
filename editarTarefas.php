<?php
include_once 'inc/config.php';
include_once 'inc/header.php';


if(isset($_POST['atualizar']))
{
    //capturar dados do formulario
    $id= $_GET['id'];
    $descricaoTarefa = $_POST['descricaoTarefa'];
    $tipoTarefa = $_POST['tipoTarefa'];
    $projeto = $_POST['projeto'];
    $horaInicio = $_POST['horaInicio'];
    $dataInicio = $_POST['dataInicio'];

    //proceeder á alteração e informar

    header("Location: editarTarefas.php?atualizado");
}

if (isset($_GET['atualizado'])) {
    $mensagem = '<div class="alert alert-success mt-3" role="alert" >
        <strong>Sucesso</strong> O registo foi atualizado!
    </div>';
}
//apresentar a mensagem de ocorrência
if (isset($_GET['mensagem'])) {
    echo $mensagem; 
}

if (isset($_GET['id'])) {
    $id= $_GET['id'];
  $temporarioObjeto= $objeto_tarefa->getIdTarefa2($id);
}

?>

<!-- Tarefa form -->
<form class="text-center border border-light p-5" method="POST">
    <p class="h4 mb-4">Editar Tarefa</p>
     <!-- Title -->
     <div class="form-group">
        <input type="text" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Titulo" name="tituloTarefa"
        value="<?php printf(" %s\n", $temporarioObjeto['titulo']); ?>">
    </div>
    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Descrição" 
        name="descricaoTarefa"><?php printf(" %s\n", $temporarioObjeto['descricao'])?></textarea>
    </div>
    <!-- Tipo Tarefa -->
    <label>Tipo Tarefa</label>
    <select class="browser-default custom-select mb-4" name="tipoTarefa">
        <option value="" disabled >Escolher Tipo Tarefa</option>
        <?php
            $query= "SELECT id, titulo FROM tarefas_tipo"; 
           var_dump($objeto_tarefa->getTiposTarefa($query)) ;
        ?>
    </select>
    <!-- Projeto -->
    <label>Projeto</label>
    <select class="browser-default custom-select mb-4" name="projeto">
        <option value="" disabled >Escolher Projeto</option>
        <?php
            $query= "SELECT id, nome FROM projetos"; 
            $objeto_tarefa->getProjetostarefa($query);
        ?>
    </select>

    <!-- Hour -->
    <div class="form-group">
        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="horaTarefa" />
            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                <div class="input-group-text"><span class="oi oi-clock"></span></div>
            </div>
        </div>
    </div>
    <!-- Date -->
    <div class="form-group">
        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="diaTarefa" />
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
    <button class="btn btn-info btn-block" type="submit" id="buttonRegistar" name="inserir">Registar</button>

</form>
<!-- Default form contact -->
<?php
include_once 'inc/footer.php';
?>