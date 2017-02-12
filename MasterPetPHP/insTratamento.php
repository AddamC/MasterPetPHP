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
	//recuperar valores do formulário
	$id = trim($_POST['id']);
	$descricao = trim($_POST['descricao']);	
	$preco = trim($_POST['preco']); 
	
	if (!empty($id) &!empty($descricao) & !empty($preco)){
		$query = "INSERT INTO tratamento VALUES ('$id','$descricao','$preco');";
		$ins = mysql_query($query);
		if ($ins==false)
			$msg = "erro na consulta inserir Tratamento " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi inserido" . mysql_affected_rows() . "registros no banco masterpet <br/>";
			unset ($id, $descricao, $preco);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarTratamento.php")
?>