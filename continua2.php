<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
      </head>
    <body>
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>Consultar / Edição das tarefas </p>

<div class="container">
<div class="card">
  <div class="card-header">Tarefas</div>
  <div class="card-body"> 
    <a class="btn btn-default btn-outline-dark" href="/livro/continua.php" >
    <img src="https://img.icons8.com/android/24/000000/plus.png">
    Adicionar </a> 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Projeto</th>
      <th scope="col">Tarefa</th>
      <th scope="col">Data Inicio</th>
      <th scope="col">Data Fim</th>
      <th scope="col">Hora Inicio</th>
      <th scope="col">Hora Fim</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>

  <?php
    include("config.php");
    $sql = "select p.nome,t.descricao,t.data_inicio,t.data_fim,t.hora_inicio,t.hora_fim from timesheet.tarefas t
    inner join timesheet.projetos p
    ON t.projetos_id = p.id";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $count=1;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
  <tbody>
    <tr>
      <th scope="row">
      <?php echo $count; ?>
      </th>
      <td>
    <?php echo $row['nome']; ?>
    </td>
    <td>
    <?php echo $row['descricao']; ?>
    </td>
    <td>
    <?php echo $row['data_inicio']; ?>
    </td>
    <td>
    <?php echo $row['data_fim']; ?>
    </td>
    <td>
    <?php echo $row['hora_inicio']; ?>
    </td>
    <td>
    <?php echo $row['hora_fim']; ?>
    </td>
    <td>
    <a class="btn btn-default btn-outline-dark" href="#">
    <img src="https://img.icons8.com/android/24/000000/edit.png">
    </a>
    <a class="btn btn-default btn-outline-dark" href="#">
    <img src="https://img.icons8.com/android/24/000000/visible.png">
    </a>
    <a class="btn btn-default btn-outline-dark" href="#">
    <img src="https://img.icons8.com/android/24/000000/delete.png">
    </a>
    <a class="btn btn-default btn-outline-dark" href="#">
    <img src="https://img.icons8.com/android/24/000000/clone.png">
    </a>
    </td>
    </tr>
  </tbody>
 
  <?php
$count++;
        }
    } else {
        echo "0 results";
    }
mysqli_close($conn);
?>
</table>
</div> 
</div>
</div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>