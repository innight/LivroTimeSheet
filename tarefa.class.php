<?php
class tarefas
{
    //propriedades
    private $basededados;

    //funcoesbasededados
    public function __construct($conn)
    {
       $this->basededados  = $conn;
    }
    
    public function getAllTarefas($query)
    {
        $stmt = $this->basededados->prepare($query);
        $stmt->execute();
        if($stmt->rowcount()>0) 
        {   
            while($result=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                    <tr>
                        <td><?php printf(" %s\n", $result['id']); ?></td>
                        <td><?php printf(" %s\n", $result['descricao']); ?></td>
                        <td><?php printf(" %s\n", $result['titulo']); ?></td>
                        <td><?php printf(" %s\n", $result['time(t.hora_inicio)']); ?></td>
                        <td><?php printf(" %s\n", $result['date(t.data_inicio)']); ?></td>
                        <td><?php printf(" %s\n", $result['created_at']); ?></td>
                        <td><?php printf(" %s\n", $result['completo']); ?></td>
                        <td><a href="editarTarefas.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">
                            <span class="oi oi-pencil"></span></a></td>
                        <td><a href="eliminarTarefas.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm ">
                            <span class="oi oi-x"></span></a></td>
                    </tr>
                    <?php
            }
        }
        else {
            ?>
            <div class="alert alert-danger" role="alert">
                Não existem dados para mostrar
            </div>
            <?php
        }
    }
/*
    //OLD!!!
    public function getIdTarefa($idTarefa)
    {
        $stmt = $this->basededados->prepare("Select tarefas.id,tarefas.titulo,p.nome,tarefas.descricao 
        From timesheet.tarefas AS tarefas 
        INNER JOIN projetos AS p 
        ON tarefas.projetos_id = p.id WHERE tarefas.id=?");
        if($stmt) 
        {
            $stmt->bind_param("i",$idTarefa);
            $stmt->execute();
            $stmt->bind_result($id,$titulo,$nomeProjeto,$descricaoTarefa);
            $result = $stmt->fetch();
          
            printf(" %s\n", $id); 
            printf(" %s\n", $titulo ); 
            printf(" %s\n", $nomeProjeto); 
            printf(" %s\n", $descricaoTarefa); 
                
            $stmt->close();
        }
    }
*/
    //NOVO!!!
    public function getIdTarefa2($idTarefa)
    {
        $query="Select tarefas.id,tarefas.titulo,p.titulo,tarefas.descricao,DATE_FORMAT(tarefas.horainicio ,'%H:%i:%s') as hora,
            DATE_FORMAT(datainicio, '%Y-%m-%d') as Data
                From timesheet.tarefas AS tarefas 
                INNER JOIN timesheet.projetos AS p 
                ON tarefas.projetos_id = p.id WHERE tarefas.id=".$idTarefa;

        $mysqli = new mysqli("localhost", "root", "", "timesheet");
        $result = $mysqli->query($query);
       // $result = $this->basededados->query($query);

        if($result) 
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $result->free();
            return $row;
        }
      
    }

    public function getProjetosTarefa ($query)
    {
        if( $stmt = $this->basededados->query($query)) 
        {
            //$stmt->bind_result($id,$nome);
            //$stmt->execute();

            while($result = $stmt->fetchObject())
            {
                ?>
                <option value="<?= $result->id ?>"><?= $result->titulo ?></option>
                <?php
            }
        }
    }

    public function getTiposTarefa ($query)
    {
        if( $stmt = $this->basededados->query($query)) 
        {
            //$stmt->bind_result($id,$titulo);
            //$stmt->execute();

            while($result=$stmt->fetchObject())
            {
                ?>
                <option value="<?= $result->id ?>"><?= $result->titulo ?></option>
                <?php
            }
          //  $stmt->close();
        }
    }

    public function setTarefa ($tituloTarefa,$descricaoTarefa,$projeto,$horaTarefa,$diaTarefa,$tipoTarefa)
    {
    // prepare and bind
    try
    {
        $query='INSERT INTO Tarefas (titulo,descricao,projetos_id,hora_inicio,data_inicio,tarefas_tipo_id,created_at)
         VALUES (:titulo,:descricao,:projeto,:horaInicioComData,:dataInicio,:tipoTarefa,:timeStamp)';
        
        $stmt = $this->basededados->prepare($query);
        $stmt->bindparam(':titulo',$tituloTarefa, PDO::PARAM_STR);
        $stmt->bindparam(':descricao',$descricaoTarefa, PDO::PARAM_STR);
        $stmt->bindparam(':projeto',$projeto, PDO::PARAM_INT);
        $stmt->bindparam(':horaInicioComData',$horaInicioComData, PDO::PARAM_STR);
        $stmt->bindparam(':dataInicio',$diaTarefa, PDO::PARAM_STR);
        $stmt->bindparam(':tipoTarefa',$tipoTarefa, PDO::PARAM_STR);
        $stmt->bindparam(':timeStamp',$timestamp, PDO::PARAM_STR);
    
        $timestamp = date('Y-m-d G:i:s');
        $horaInicioComData = '1970-01-01'.' '.$horaTarefa;
       
        $stmt->execute();
        return true;
    }

     catch(PDOException $erro)   
     {
         echo $erro->getMessage();
         return false;
    }
}

    public function updateTarefa ($idTarefa)
    {

    }

    public function deleteTarefa ($query)
    {
    // Prepare a delete statement 
        if( $stmt = $this->basededados->prepare($query)) 
        {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);
            // Set parameters
            $param_id = trim($_POST["id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records deleted successfully. Redirect to landing page
                header("location: index.php");
                exit();
        } else{
            echo "Erro! tente novamente";
        }
    }
     
    // Close statement
    $stmt->close();
    }
}
?>



