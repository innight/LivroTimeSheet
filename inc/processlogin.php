<?php
// começar ou retomar uma sessão
session_start();
 
// se vier um pedido para login
if (!empty($_POST)) {
 
	// estabelecer ligação com a base de dados
    include ("config.php");
 
	// receber o pedido de login com segurança
	$username = ($_POST['username']);
	$password = ($_POST['password']);
 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
    $login = "SELECT id, name FROM users WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$login) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
		// o utilizador está correctamente validado
		// guardamos as suas informações numa sessão
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$row=mysqli_fetch_array($result);
		$_SESSION['id'] = $row['id'];
 
		echo "<p>Sess&atilde;o iniciada com sucesso como {$_SESSION['username']}</p>";
		
	} else {
 
		// falhou o login
		echo "<p>Utilizador ou password invalidos. <a href=\"index.php\">Tente novamente</a></p>";
    }
}

?>