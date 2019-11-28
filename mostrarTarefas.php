<?php
include_once 'inc/config.php';
include_once 'inc/header.php';
?>

<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <h2>Visualizar</h2>
        <a href="inserirTarefas.php" class="btn btn-ms btn-success mb-2">
            <span class="oi oi-plus"></span>Adicionar</a>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descricão</th>
                <th>Projeto</th>
                <th>Hora Inicio</th>
                <th>Data Inicial</th>
                <th>Criado em</th>
                <th>Completo</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $query= "Select t.id,p.titulo,t.descricao,time(t.hora_inicio),date(t.data_inicio),
        t.created_at,t.completo 
        from timesheet.tarefas t
        inner join timesheet.projetos p
        ON t.projetos_id = p.id"; 
        $objeto_tarefa->getAllTarefas($query);
        ?>
        </tbody>
    </table>
    <?php
include_once 'inc/footer.php';
?>