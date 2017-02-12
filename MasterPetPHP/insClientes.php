<?php
	$conexao = mysql_connect("localhost", "root", "");
	if (!$conexao){
		echo "Erro de conexao ao MySql <br/>";
		exit;
	}
	$banco = mysql_select_db("masterpetphp");
	if(!$banco){
		echo "Erro na conexao do banco MasterPet <br/>";
		exit;
	}
	//recuperar valores do formul�rio
	$id = trim($_POST['id']);
	$nome = trim($_POST['nome']);	
	$endereco = trim($_POST['endereco']); 
	$nascimento = trim($_POST['nascimento']);
	$idCidade = trim($_POST['idCidade']); 
	
	if (!empty($id) &!empty($nome) & !empty($nascimento) & !empty($endereco) & !empty($idCidade) ){
		$query = "INSERT INTO clientes VALUES ('$id','$nome', '$nascimento', '$endereco', '$idCidade');";
		$ins = mysql_query($query);
		if ($ins==false)
			$msg = "erro na consulta inserir Clientes " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi inserido" . mysql_affected_rows() . "registros no banco masterpet <br/>";
			unset ($id, $nome, $nascimento, $endereco, $idCidade);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarClientes.php")
?>