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
	$descricao = trim($_POST['descricao']);	
	$preco = trim($_POST['preco']); 
	
	if (!empty($id) &!empty($descricao) & !empty($preco)){
		$query = "UPDATE Tratamento set descricao='$descricao', preco='$preco' where id='$id';";
		$edt = mysql_query($query);
		if ($edt==false)
			$msg = "erro na atualização de tratamento " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi alterado" . mysql_affected_rows() . "registros no banco masterpetphp <br/>";
			unset ($id, $descricao, $preco);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarTratamento.php")
?>