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
	$raca = trim($_POST['raca']); 
	$especie = trim($_POST['especie']);
	$cor = trim($_POST['cor']);
	$sexo = trim($_POST['sexo']); 
	$nascimento = trim($_POST['nascimento']); 
	$idClientes = trim($_POST['idClientes']); 
	
	if (!empty($id) &!empty($nome) & !empty($raca) & !empty($especie) & !empty($cor) & !empty($sexo) & !empty($nascimento) & !empty($idClientes)){
		$query = "UPDATE Animais set nome='$nome', raca='$raca', especie='$especie', cor='$cor', sexo='$sexo', nascimento='$nascimento', idClientes='$idClientes' where id='$id';";
		$edt = mysql_query($query);
		if ($edt==false)
			$msg = "erro na atualização de tratamento " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi alterado" . mysql_affected_rows() . "registros no banco masterpetphp <br/>";
			unset ($id, $nome, $raca, $especie, $cor, $sexo, $nascimento, $idClientes);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarAnimais.php")
?>