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
  $rs = mysql_query("SELECT * from cidades where id='$id';"); 
  $row = mysql_fetch_array($rs); 
  $nome = $row['nome'];
  $uf = $row['uf'];
?>

<html>
  <head>
    <title>Remover Cidades </title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background-color:#E6E6FA">
    <form name="frmRmvCidades" id="frmRmvCidades" method="post" action="confRmvCidades.php">
      <table class="table table-striped">
        <tr>
          <th colspan="2">Remover Cidades</th>
        </tr>
        <tr>
          <td width="90" align="right">ID: </td>
          <td width="20">
            <label id="id"> <?php echo $id?> </label>
            <input type="hidden" id="id" name="id" value="<?php echo $id?>"/>
          </td>
        </tr>
        <tr>
          <td align="right">Nome: </td>
          <td>
            <label id="nome"> <?php echo $nome?> </label>
          </td>
        </tr>
        <tr>
          <td align="right">UF: </td>
          <td>
            <label id="uf"> <?php echo $uf?> </label>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btRmvCidades" id="btRmv" value="Remover">
            <input type="button" value="Cancelar"
              onclick="javascript:location.href='listarCidades.php'"/>
          </td>
        </tr>

      </table>
  </body>
</html>