

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
	$rs = mysql_query("Select * from Clientes;"); // **LINHA IMPORTANTE
?>

<!DOCTYPE html>
<html lang="br">
<head>
  <title>Listar Clientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#E6E6FA">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MasterPet</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.html">Home</a></li>
      <li><a href="listarClientes.php">Clientes</a></li>
      <li><a href="listarAnimais.php">Animais</a></li>
      <li><a href="listarTratamento.php">Tratamento</a></li>
      <li><a href="listarCidades.php">Cidades</a></li>
    </ul>
  </div>
</nav>

<h1 align="center"><img src="clientes.png" class="img-rounded" alt="Cinque Terre" width="450" height="200" align="center"></h1>
	<br/>

<div class="container">          
  <table class="table table-striped">
    <thead>
      <tr>
			<th align="center">ID</th>
			<th width="150" align="center">Nome</th>
			<th width="150" align="center">Nascimento</th>
			<th width="150" align="center">Endereco</th>
			<th width="150" align="center">idCidade</th>
      </tr>
    </thead>
    <tbody>
        <tr>
			<?php 
				while($row=mysql_fetch_array($rs)){ ?> <!-- row - variavel, pode ter outro nome como $linha-->
					<tbody>
					<tr>
						
						<td><?php echo $row['id']?> </td>    <!--nome aqui tem que ser igual ao do banco de dados-->
						<td><?php echo $row['nome']?> </td>
						<td><?php echo $row['endereco']?> </td>	
						<td><?php echo $row['nascimento']?> </td>
						<td><?php echo $row['idCidade']?> </td>
						<td>
							<input type="button" class="btn btn-info" value="Editar" 
							onclick="javascript: location.href='editarClientes.php?id=' + <?php echo $row['id'] ?>"/>
						</td>
						<td>
							<input type="button" id="btRem" name="btRem" class="btn btn-danger" value="remover"
							onclick="javascript: location.href='frmRmvClientes.php?id=' + <?php echo $row['id'] ?>"/>
						</td>
					</tr>
					
				<?php } ?>
		</tr>
    </tbody>
  </table>
</div>
<h1 align="center"><button type="button" class="btn btn-primary" align="center" id="bt_novo" 
	onclick="javascript: location.href='insClientes.html' ">Cadastrar Novo</button></h1>
	<br/>


<h1 align="center"><button type="button" class="btn btn-primary" align="center" id="bt_novo" 
	onclick="javascript: location.href='home.html' ">Home</button></h1>
	<br/>
</body>
</html>
