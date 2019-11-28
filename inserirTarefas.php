<?php
include_once 'inc/config.php';
include_once 'inc/header.php';
?>
<!-- Validações -->
    <?php
    if(isset($_POST['inserir']))
    {
        $tituloTarefa = $_POST['tituloTarefa'];
        $descricaoTarefa = $_POST['descricaoTarefa'];
        $projeto =$_POST['projeto'];
        $horaTarefa =$_POST['horaTarefa'];
        $diaTarefa =$_POST['diaTarefa'];
        $tipoTarefa = $_POST['tipoTarefa']; 

        if(empty($tituloTarefa) OR empty($descricaoTarefa) OR empty($projeto) OR empty($horaTarefa) OR empty($diaTarefa) OR empty($tipoTarefa))
        {
            echo 'Campos vazios';
            header("Location: inserirTarefas.php?vazio");
            die();
        }

        if($objeto_tarefa->setTarefa($tituloTarefa,$descricaoTarefa,$projeto,$horaTarefa,$diaTarefa,$tipoTarefa))
        {
           header("Location: inserirtarefas.php?inserido"); 
        }
        else
        {
            header("Location: inserirtarefas.php?errado");    
        }

    }

    if(isset($_GET['inserido']))
    {
?>
    <div class="alert alert-success mt-3" role="alert" >
        <strong>Sucesso</strong> O registo foi efetuado!
    </div>
<?php
    }
    else if (isset($_GET['errado'])) 
    {
?>
    <div class="alert alert-danger mt-3" role="alert">
        <strong>Erro</strong> Tente novamente!
    </div>
<?php
    }
    else if(isset($_GET['vazio']))
    {
?>
    <div class="alert alert-danger mt-3" role="alert" mt-1>
        <strong>Falta preencher campos</strong> Campos vazios
    </div>
<?php
    }
?>
<!-- Tarefa form -->
    
    <form class="text-center border border-light p-5" method="POST">
    <p class="h4 mb-4">Registo Tarefa</p>
     <!-- Title -->
     <div class="form-group">
        <input type="text" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Titulo" name="tituloTarefa">
    </div>
    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Descrição" name="descricaoTarefa"></textarea>
    </div>
    <!-- Tipo Tarefa -->
    <label>Tipo Tarefa</label>
    <select class="browser-default custom-select mb-4" name="tipoTarefa">
        <option value="" disabled >Escolher Tipo Tarefa</option>
        <?php
            $query= "SELECT id, titulo FROM tarefas_tipo"; 
            $objeto_tarefa->getTiposTarefa($query);
        ?>
    </select>
    <!-- Projeto -->
    <label>Projeto</label>
    <select class="browser-default custom-select mb-4" name="projeto">
        <option value="" disabled >Escolher Projeto</option>
        <?php
            $query= "SELECT id, titulo FROM projetos"; 
            $objeto_tarefa->getProjetostarefa($query);
        ?>
    </select>

    <!-- Hour -->
    <div class="form-group">
        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="horaTarefa" />
            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
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
<script src="js/inserirtarefa.js"></script>