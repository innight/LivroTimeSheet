<?php
include_once 'inc/config.php';
include_once 'inc/header.php';
?>

<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <h2>Visualizar</h2>
        <a href="inserirProjetos.php" class="btn btn-ms btn-success mb-2">
            <span class="oi oi-plus"></span>Adicionar</a>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descricão</th>
                <th>Hora Inicio</th>
                <th>Data Inicio</th>
                <th>Criado em</th>
                <th>Completo?</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $query= "SELECT id,titulo,descricao,time(hora_inicio),date(data_inicio),created_at,completo FROM projetos"; 
        $objeto_projeto->getAllProjetos($query);
        ?>
        </tbody>
    </table>
    <?php
include_once 'inc/footer.php';
?>