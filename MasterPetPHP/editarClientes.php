<?php 
  $id = trim($_REQUEST['id']); 
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
  $rs = mysql_query("SELECT * from clientes where id='$id';"); 
  $row = mysql_fetch_array($rs); 
  $nome = $row['nome'];
  $nascimento = $row['nascimento'];
  $endereco = $row['endereco'];
  $idCidade = $row['idCidade'];
?>
<html>
  <head>
      <title>Editar Clientes</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head> 
  <body style="background-color:#E6E6FA">
	   <form id="frmEdit" name="frmEdit" method="post" 
											action="grvEditarCli.php">
		  <table class="table table-striped">
			 <tr>
			     <th colspan="2">Alterar Clientes</th>
			 </tr>
			 <tr>
			     <td width="90" align="right">ID: </td>
				 <td width="100">
				     <label id="id"> <?php echo $id?> </label>
					 <input type="hidden" name="id" id="id" 
										value="<?php echo $id?>"/>
				 </td>
			 </tr> 
			 <tr>
			     <td align="right">Nome: </td>
				 <td>
				     <input type="text" name="nome" id="nome" 
											value="<?php echo $nome?>"/>
				 </td>
			 </tr>
			 <tr>
			     <td align="right">Nascimento: </td>
				 <td>
				     <input type="text" name="nascimento" id="nascimento" 
											value="<?php echo $nascimento?>"/>
				 </td>
			 </tr>

			 <tr>
			     <td align="right">Endereco: </td>
				 <td>
				     <input type="text" name="endereco" id="endereco" 
											value="<?php echo $endereco?>"/>
				 </td>
			 </tr>

			 <tr>
			     <td align="right">idCidade: </td>
				 <td>
				     <input type="text" name="idCidade" id="idCidade" 
											value="<?php echo $idCidade?>"/>
				 </td>
			 </tr>

			     <td colspan="2" align="center">
				     <input type="submit" name="bt_grv" id="bt_grv" value="Gravar"/>
					 <input type="button" value="Cancelar"
							onclick="javascript:location.href='listarClientes.php'"/>
				 </td>
			 </tr>
			 
		  </table>
	   </form>
  </body>
</html> 