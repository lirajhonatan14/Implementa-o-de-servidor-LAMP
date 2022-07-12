<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);
?>
<?php
        $codSQL =  "SELECT * FROM produtos";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $produtos = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exclusão de Produtos</title>
    </head>
    <body>
</form>
</div>
<div>
<table border="1">
        <tr>
                <th>Codigo do Produto</th>
                <th>Nome do Produto</th>
                <th>Preço Unitário do Produto</th>
        </tr>
<?php
        // se o nÃºmero de resultados for maior que zero, mostra os dados
        if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
?>
                        <tr>
                                <td><?=$produtos['COD_PROD']?></td>
                                <td><?=$produtos['DESCRICAO']?></td>
                                <td><?=$produtos['PRECO_UNIT']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($produtos = mysqli_fetch_assoc($consulta));
        // fim do if
        }
?>
	</table>
       <h1>Excluir Produto</h1>
    <form action="" method="POST">
       <input name="cod_prod" class="input is-large" placeholder="Codigo do Produto" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Excluir Produto</button>
     </form>
   </body>
</html>

<?php
if(!empty($_POST['cod_prod'])){
$produto = $_POST['cod_prod'];

$query = "select COD_PROD from produtos where COD_PROD = '{$produto}'";
$sql = "delete from produtos where COD_PROD = '{$produto}'";
$result = mysqli_query($conexao, $query);
$del = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result);
if($row == 1){
        $del;
?>
	<br>
        <p>Produto excluído com sucesso</p>
<?php
}else{
?>
	<br>
        <p> Não foi possivel excluir o produto</p>
<?php
}
}
?>






