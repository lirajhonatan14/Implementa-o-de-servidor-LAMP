<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);
?>
<?php
        $codSQL =  "SELECT * FROM resumo_pedido";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $pedidos = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exclusão de Pedidos</title>
    </head>
    <body>
       <h1>Excluir Pedido</h1>
</form>
</div>
<div>
<table border="1">
        <tr>
                <th>Número do Pedido</th>
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
                                <td><?=$pedidos['NUM_PED']?></td>
                                <td><?=$pedidos['DATA']?></td>
                                <td><?=$pedidos['CLIENTE']?></td>
 				<td><?=$pedidos['ENDERECO']?></td>
                                <td><?=$pedidos['RG']?></td>
                                <td><?=$pedidos['TOTAL_GERAL']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($pedidos = mysqli_fetch_assoc($consulta));
        // fim do if
        }
?>
        </table>



    <form action="" method="POST">
       <input name="num_ped" class="input is-large" placeholder="Número do Pedido" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Excluir Pedido</button>
     </form>
   </body>
</html>

<?php
if(!empty($_POST['num_ped'])){
$pedido = $_POST['num_ped'];

$verifi = "delete from vendas where NUM_PED = '{$pedido}'";
$query = "select NUM_PED from resumo_pedido where NUM_PED = '{$pedido}'";
$sql = "delete from resumo_pedido where NUM_PED = '{$pedido}'";
$result = mysqli_query($conexao, $query);
$del = mysqli_query($conexao, $sql);
$delvend = mysqli_query($conexao, $verifi);
$row = mysqli_num_rows($result);
if($row == 1){
  	$delvend;
	$del;
?>
   	<p>Pedido excluido com sucesso</p>
<?php
}else{
?>
	<p>Não foi possível excluir seu pedido</p>
<?php
}
}
?>


