<?php
class projetos
{
    //propriedades
    private $basededados;

    //funcoesbasededados
    public function __construct($conn)
    {
       $this->basededados  = $conn;
    }
    
    public function getAllProjetos($query)
    {
        $stmt = $this->basededados->prepare($query);
        $stmt->execute();
        if($stmt->rowcount()>0) 
        {   
            while($result=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                    <tr>
                        <td><?php printf(" %s\n", $result['titulo']); ?></td>
                        <td><?php printf(" %s\n", $result['descricao']); ?></td>
                        <td><?php printf(" %s\n", $result['time(hora_inicio)']); ?></td>
                        <td><?php printf(" %s\n", $result['date(data_inicio)']); ?></td>
                        <td><?php printf(" %s\n", $result['created_at']); ?></td>
                        <td><?php printf(" %s\n", $result['completo']); ?></td>
                        <td><a href="editarProjetos.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">
                            <span class="oi oi-pencil"></span></a></td>
                        <td><a href="eliminarProjetos.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm ">
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
    public function setProjeto ($tituloProjeto,$descricaoProjeto,$horaProjeto,$diaProjeto)
    {
        // prepare and bind
        try
        {
            $query='INSERT INTO Projetos (titulo,descricao,hora_inicio,data_inicio,created_at)
            VALUES (:titulo,:descricao,:horaInicioComData,:dataInicio,:timeStamp)';
            
            $stmt = $this->basededados->prepare($query);
            $stmt->bindparam(':titulo',$tituloProjeto, PDO::PARAM_STR);
            $stmt->bindparam(':descricao',$descricaoProjeto, PDO::PARAM_STR);
            $stmt->bindparam(':horaInicioComData',$horaInicioComData, PDO::PARAM_STR);
            $stmt->bindparam(':dataInicio',$diaProjeto, PDO::PARAM_STR);
            $stmt->bindparam(':timeStamp',$timestamp, PDO::PARAM_STR);
        
            $timestamp = date('Y-m-d G:i:s');
            $horaInicioComData = '1970-01-01'.' '.$horaProjeto;
        
            $stmt->execute();
            return true;
        }
        catch(PDOException $erro)   
        {
            echo $erro->getMessage();
            return false;
        }
    }

    public function CheckID($idProjeto)
    {
        $stmt = $this->basededados->prepare("SELECT * FROM projetos WHERE id =:idProjeto");
        $stmt->execute(array("idProjeto"=>$idProjeto));
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateProjeto($idProjeto,$tituloProjeto,$descricaoProjeto,$horaProjeto,$dataProjeto)
    {
        try
        {
            $stmt=$this->basededados->prepare("UPDATE projetos SET
            titulo=:tituloProjeto,descricao=:descricaoProjeto,
            hora_inicio=:horaProjeto,data_inicio=:dataProjeto
            WHERE id=:idProjeto");

            $timestamp = date('Y-m-d G:i:s');
            $horaInicioComData = '1970-01-01'.' '.$horaProjeto;

            $stmt->execute(array(
            ":idProjeto"=>$idProjeto,":tituloProjeto"=>$tituloProjeto,
            ":descricaoProjeto"=>$descricaoProjeto,":horaProjeto"=>$horaInicioComData,
            ":dataProjeto"=>$horaInicioComData));
            return true;
        }
        catch(PDOException $erro)
        {
            echo $erro->getMessage();
            return false;
        }
    }
}
?>