<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);

        $codSQL =  "SELECT * FROM produtos";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $produto = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
<html>
        <head>
  <meta charset="utf-8">
        <title>Relatório Produto</title>
</head>
<body>
<h1>Relatório de Produtos</h1>
<div>
<table border="1">
        <tr>
                <th>Código Produto</th>
                <th>Descrição</th>
                <th>Estoque</th>
                <th>Preço Unitário</th>
		<th>Total Estoque</th>
        </tr>
<?php
        // se o nÃºmero de resultados for maior que zero, mostra os dados
        if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
?>
                        <tr>
                                <td><?=$produto['COD_PROD']?></td>
                                <td><?=$produto['DESCRICAO']?></td>
                                <td><?=$produto['ESTOQUE']?></td>
                                <td><?=$produto['PRECO_UNIT']?></td>
				<td><?=$produto['TOTAL_ESTOQUE']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($produto = mysqli_fetch_assoc($consulta));
        // fim do if
        }
?>
</table>
</div>
</body>
</html>

