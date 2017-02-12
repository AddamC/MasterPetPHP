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
  $rs = mysql_query("SELECT * from tratamento where id='$id';"); 
  $row = mysql_fetch_array($rs); 
  $descricao = $row['descricao'];
  $preco = $row['preco'];
?>
<html>
  <head>
      <title>Editar Tratamento</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head> 
  <body style="background-color:#E6E6FA">
	   <form id="frmEdit" name="frmEdit" method="post" 
											action="grvEditarTrat.php">
		  <table class="table table-striped">
			 <tr>
			     <th align ="center" colspan="2">Alterar Tratamentos</th>
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
			     <td align="right">Descricao: </td>
				 <td>
				     <input type="text" name="descricao" id="descricao" 
											value="<?php echo $descricao?>"/>
				 </td>
			 </tr>
			 <tr>
			     <td align="right">Preço: </td>
				 <td>
				     <input type="text" name="preco" id="preco" 
											value="<?php echo $preco?>"/>
				 </td>
			 </tr>

			     <td colspan="2" align="center">
				     <input type="submit" name="bt_grv" id="bt_grv" value="Gravar"/>
					 <input type="button" value="Cancelar"
							onclick="javascript:location.href='listarTratamento.php'"/>
				 </td>
			 </tr>
			 
		  </table>
	   </form>
  </body>
</html> 