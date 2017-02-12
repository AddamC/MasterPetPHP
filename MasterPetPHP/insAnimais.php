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
	$raca = trim($_POST['raca']); 
	$especie = trim($_POST['especie']);
	$cor = trim($_POST['cor']);
	$sexo = trim($_POST['sexo']); 
	$nascimento = trim($_POST['nascimento']); 
	$idClientes = trim($_POST['idClientes']); 


	if (!empty($id) &!empty($nome) & !empty($raca) & !empty($especie) & !empty($cor) & !empty($sexo) & !empty($nascimento) & !empty($idClientes) ){
		$query = "INSERT INTO animais VALUES ('$id','$nome','$raca', '$especie', '$cor', '$sexo', '$nascimento', '$idClientes');";
		$ins = mysql_query($query);
		if ($ins==false)
			$msg = "erro na consulta inserir Animais " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi inserido" . mysql_affected_rows() . "registros no banco masterpet <br/>";
			unset ($id, $nome, $raca, $especie, $cor, $sexo, $nascimento, $idClientes);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarAnimais.php")
?>