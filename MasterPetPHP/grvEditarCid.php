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
	$uf = trim($_POST['uf']); 
	
	if (!empty($id) &!empty($nome) & !empty($uf)){
		$query = "UPDATE Cidades set nome='$nome', uf='$uf' where id='$id';";
		$edt = mysql_query($query);
		if ($edt==false)
			$msg = "erro na atulização de cidade " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi alterado" . mysql_affected_rows() . "registros no banco masterpetphp <br/>";
			unset ($id, $nome, $uf);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarCidades.php")
?>