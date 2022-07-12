<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);

        $codSQL =  "SELECT * FROM resumo_pedido";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $pedido = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
<html>
        <head>
  <meta charset="utf-8">
        <title>Relatório Produto</title>
</head>
<body>
<h1>Relatório de Pedidos</h1>
<div>
<table border="1">
        <tr>
                <th>Número Pedido</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Endereço</th>
                <th>RG</th>
                <th>Total</th>
        </tr>
<?php
        // se o nÃºmero de resultados for maior que zero, mostra os dados
        if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
?>
                        <tr>
                                <td><?=$pedido['NUM_PED']?></td>
                                <td><?=$pedido['DATA']?></td>
                                <td><?=$pedido['CLIENTE']?></td>
                                <td><?=$pedido['ENDERECO']?></td>
                                <td><?=$pedido['RG']?></td>
                                <td><?=$pedido['TOTAL_GERAL']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($pedido = mysqli_fetch_assoc($consulta));
        // fim do if
        }
?>
</table>
</div>
<div>
 <form action="" method="POST">
        <h2>Insira o Codigo do pedido que deseja ver.</h2>
        <input name="numped" class="input is-large" placeholder="Código do Pedido" autofocus="">
        <button type="submit" class="button is-block is-link is-large is-fullwidth">Selecionar</button>
</form>
<?php
if(!empty($_POST['numped'])){
$codvendas =  "SELECT * FROM vendas";
$consul = mysqli_query($conexao,$codvendas) or die(mysqli_error());
//$vendas = mysqli_fetch_assoc($consul);
$tot = mysqli_num_rows($consul);
$numped = $_POST['numped'];
?>
<br>
<table border = 1>
<?php
while($vendas = mysqli_fetch_assoc($consul)){
if ($numped == $vendas['NUM_PED']){
?>
        <tr>
                <td><?=$vendas['NUM_PED']?></td>
                <td><?=$vendas['COD_PROD']?></td>
                <td><?=$vendas['DESCRICAO']?></td>
                <td><?=$vendas['QUANT']?></td>
                <td><?=$vendas['PRECO']?></td>
                <td><?=$vendas['TOTAL']?></td>
                <td><?=$vendas['TOTAL_GERAL']?></td>
        </tr>
<?php
}
}
}
?>
</table>
</body>
</html>
