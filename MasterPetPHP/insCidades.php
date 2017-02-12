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
	$nome = trim($_POST['nome']);	
	$uf = trim($_POST['uf']); 
	
	if (!empty($id) &!empty($nome) & !empty($uf)){
		$query = "INSERT INTO cidades VALUES ('$id','$nome','$uf');";
		$ins = mysql_query($query);
		if ($ins==false)
			$msg = "erro na consulta inserir Cidade " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi inserido" . mysql_affected_rows() . "registros no banco masterpet <br/>";
			unset ($id, $nome, $uf);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarCidades.php")
?>