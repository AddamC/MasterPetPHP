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
  $rs = mysql_query("SELECT * from animais where id='$id';"); 
  $row = mysql_fetch_array($rs); 
  $nome = $row['nome'];
  $raca = $row['raca'];
  $especie = $row['especie'];
  $cor = $row['cor'];
  $sexo = $row['sexo'];
  $nascimento = $row['nascimento'];
  $idClientes = $row['idClientes'];
?>

<html>
  <head>
    <title>Remover Animais </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body style="background-color:#E6E6FA">
    <form name="frmRmvAnimais" id="frmRmvAnimais" method="post" action="confRmvAnimais.php">
      <table class="table table-striped">
        <tr>
          <th colspan="2">Remover Animais</th>
        </tr>
        <tr>
          <td width="90" align="right">ID: </td>
          <td width="150">
            <label id="id"> <?php echo $id?> </label>
            <input type="hidden" id="id" name="id" value="<?php echo $id?>"/>
          </td>
        </tr>
        <tr>
          <td align="center">Nome: </td>
          <td>
            <label id="nome"> <?php echo $nome?> </label>
          </td>
        </tr>
        <tr>
          <td align="center">Raça: </td>
          <td>
            <label id="raca"> <?php echo $raca?> </label>
          </td>
        </tr>
        <tr>
          <td align="center">Especie: </td>
          <td>
            <label id="especie"> <?php echo $especie?> </label>
          </td>
        </tr>
        <tr>
          <td align="center">Cor: </td>
          <td>
            <label id="cor"> <?php echo $cor?> </label>
          </td>
        </tr>
        <tr>
          <td align="center">Sexo: </td>
          <td >
            <label id="sexo"> <?php echo $sexo?> </label>
          </td>
        </tr>
        <td align="center">Nascimento: </td>
          <td>
            <label id="nascimento"> <?php echo $nascimento?> </label>
          </td>
        </tr>
        <td align="center">idClientes: </td>
          <td>
            <label id="idClientes"> <?php echo $idClientes?> </label>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btRmvAnimais" id="btRmv" value="Remover">
            <input type="button" value="Cancelar"
              onclick="javascript:location.href='listarAnimais.php'"/>
          </td>
        </tr>

      </table>
  </body>
</html>