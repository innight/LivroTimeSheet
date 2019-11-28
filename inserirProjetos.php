<?php
include_once 'inc/config.php';
include_once 'inc/header.php';
?>
<!-- Validações -->
    <?php
    if(isset($_POST['inserir']))
    {
        $tituloProjeto = $_POST['tituloProjeto'];
        $descricaoProjeto = $_POST['descricaoProjeto'];
        $horaProjeto =$_POST['horaProjeto'];
        $diaProjeto =$_POST['diaProjeto'];

        if(empty($tituloProjeto) OR empty($descricaoProjeto) OR empty($horaProjeto) OR empty($diaProjeto))
        {
            echo 'Campos vazios';
            header("Location: inserirProjetos.php?vazio");
            die();
        }

        if($objeto_projeto->setProjeto($tituloProjeto,$descricaoProjeto,$horaProjeto,$diaProjeto))
        {
           header("Location: inserirProjetos.php?inserido"); 
        }
        else
        {
            header("Location: inserirProjetos.php?errado");    
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
<!-- Projeto form -->
    
    <form class="text-center border border-light p-5" method="POST">
    <p class="h4 mb-4">Registo Projeto</p>
     <!-- Title -->
     <div class="form-group">
        <input type="text" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Titulo" name="tituloProjeto">
    </div>
    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Descrição" name="descricaoProjeto"></textarea>
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
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="diaProjeto" />
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
<script src="js/inserirProjeto.js"></script>