<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "timesheet";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password,
    array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
  

include("tarefa.class.php");
include("projeto.class.php");
$objeto_tarefa = new tarefas ($conn);
$objeto_projeto = new projetos ($conn);
?>