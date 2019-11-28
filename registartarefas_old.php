<?php
session_start();
// Create connection
include("inc/config.php");

$timestamp = date('Y-m-d G:i:s');
$horainicio = $_POST['hourpickerinicio'];
$horafim = $_POST['hourpickerfim'];
$horainiciocomdata = '1970-01-01'.' '.$horainicio;
$horafimcomdata = '1970-01-01'.' '.$horafim;
$clean_text_nome_projeto = $_POST['nome'];
$id_projeto = $_POST['projeto'];
$datainicio = $_POST['datepickerinicio-valorbd'];
$datafim = $_POST['datepickerfim-valorbd'];
$sql = "INSERT INTO Tarefas (projetos_id, descricao,user_id,created_at,updated_at,data_inicio,data_fim,hora_inicio,hora_fim)
VALUES ($id_projeto, '$clean_text_nome_projeto',$_SESSION[id],'$timestamp','$timestamp','$datainicio','$datafim','$horainiciocomdata','$horafimcomdata')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>