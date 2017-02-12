<?php
	$conexao = mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
	}
	$banco  = mysql_select_db("masterpetphp");
	if (!$banco){
		echo "Erro ao se conectar ao banco masterpetphp...";
		exit;
	}
	//recuperar valores do formulário
	$id = trim($_POST['id']);
	$nome = trim($_POST['nome']);	
	$nascimento = trim($_POST['nascimento']); 
	$endereco = trim($_POST['endereco']); 
	$idCidade = trim($_POST['idCidade']);
	
	if (!empty($id) &!empty($nome) & !empty($nascimento) & !empty($endereco) & !empty($idCidade)){
		$query = "UPDATE clientes set nome='$nome', nascimento='$nascimento', endereco='$endereco', idCidade='$idCidade' where id='$id';";
		$edt = mysql_query($query);
		if ($edt==false)
			$msg = "erro na atualização de clientes " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi alterado" . mysql_affected_rows() . "registros no banco masterpetphp <br/>";
			unset ($id, $nome, $nascimento,$endereco, $idCidade);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarClientes.php")
?>