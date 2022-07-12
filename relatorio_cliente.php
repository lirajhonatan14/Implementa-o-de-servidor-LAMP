<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);

        $codSQL =  "SELECT * FROM cliente";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $cliente = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
<html>
        <head>
  <meta charset="utf-8">
        <title>Relatório Pedido</title>
</head>
<body>
<h1>Relatório de Clientes</h1>
<div>
<table border="1">
        <tr>
                <th>RG</th>
                <th>Nome</th>
                <th>Senha</th>
		<th>Endereço</th>
        </tr>
<?php
        // se o nÃºmero de resultados for maior que zero, mostra os dados
        if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
?>
                        <tr>
                                <td><?=$cliente['RG']?></td>
                                <td><?=$cliente['NOME']?></td>
                                <td><?=$cliente['SENHA']?></td>
				<td><?=$cliente['ENDERECO']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($cliente = mysqli_fetch_assoc($consulta));
        // fim do if
        }
?>
</table>
</div>
</body>
</html>


