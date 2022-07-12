<?php
include('menu.php');
ini_set('display_errors', 1); error_reporting(-1);
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alteração de Pedidos</title>
    </head>
<style>
  .body{
    margin: center;
  }
</style>

<?php
       $codSQL =  "SELECT * FROM produtos";
        $consulta = mysqli_query($conexao,$codSQL) or die(mysqli_error());
        $produtos = mysqli_fetch_assoc($consulta);
        $total = mysqli_num_rows($consulta);
?>
   <body>
<table border="1">
        <tr>
                <th>Codigo do Produto</th>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário do Produto</th>
        </tr>
<?php
        // se o número de resultados for maior que zero, mostra os dados
        if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
?>
                        <tr>
                                <td><?=$produtos['COD_PROD']?></td>
                                <td><?=$produtos['DESCRICAO']?></td>
                                <td><?=$produtos['ESTOQUE']?></td>
                                <td><?=$produtos['PRECO_UNIT']?></td>
                        </tr>
<?php
                // finaliza o loop que vai mostrar os dados
                }while($produtos = mysqli_fetch_assoc($consulta));
        // fim do if
      }
?>
</table>
     <h1>Alterar Pedido</h1>
    <form action="" method="POST">
       <input name="cliente" class="input is-large" placeholder="Nome do Cliente" autofocus="">
       <input name="rg" class="input is-large" placeholder="RG do Cliente" autofocus="">
       <input name="codProd" class="input is-large" placeholder="Código do Produto" autofocus="">
       <input name="numPed" class="input is-large" placeholder="Número do Pedido" autofocus="">
       <input name="qtd" class="input is-large" placeholder="Alterar Quantidade" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar pedido</button>
     </form>

  </body>
</html>
<?php

ini_set('display_errors', 1); error_reporting(-1);

if( !( empty($_POST['cliente']) || empty($_POST['rg']) || empty($_POST['codProd']) || empty($_POST['qtd'])) ){
        $codProd = $_POST['codProd'];
        $total_geral = 0;
        $total = 0;
        $cliente = $_POST['cliente'];
        $qtdPedido = $_POST['qtd'];
        $rg =  $_POST['rg'];
        $preco = 0;
        $numPed = 0;
        $totalGeral = 0;  
	$numPed = $_POST['numPed'];
        $query = "SELECT * FROM  vendas";
        $dadosBanco= mysqli_query($conexao, $query);
        $alterar = false;

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
      if($codProd == $dados['COD_PROD'] && $numPed == $dados['NUM_PED']){
          $alterar = true;
          $preco = (int) $dados['PRECO'];
          $total =  $preco * $qtdPedido;
      }
  }
 
   $acheiPedido = false;
  $queryVendas = "SELECT * FROM vendas";
  $dadosVendas = mysqli_query($conexao, $queryVendas);
   
   while($dados =  mysqli_fetch_assoc($dadosVendas)){
        if($numPed == $dados['NUM_PED']){
            $acheiPedido = true;
        }
    }

  if($alterar && $acheiPedido){
   $sql = "UPDATE vendas SET QUANT = '$qtdPedido', TOTAL = '$total' WHERE  COD_PROD = '$codProd' AND NUM_PED = '$numPed'";
    if(!mysqli_query($conexao,$sql))
      echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
  
   $dadosVendas = mysqli_query($conexao, $queryVendas);

   while($dados =  mysqli_fetch_assoc($dadosVendas)){
        if($numPed == $dados['NUM_PED']){
            $totalGeral += (int)$dados['TOTAL'];
        }
    }
   $sqlPedido = "UPDATE resumo_pedido SET TOTAL_GERAL = '$totalGeral' WHERE NUM_PED = '$numPed'";
   $sqlAttVendas = "UPDATE vendas SET TOTAL_GERAL = '$totalGeral' WHERE NUM_PED = '$numPed'";    
   if(mysqli_query($conexao, $sqlPedido) && mysqli_query($conexao, $sqlAttVendas) ){
?>         
      <br>  
      <p>Pedido atualizado com sucesso</p>
<?php     
 }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
 }
}

  if(!$alterar || !$acheiPedido){
?>
   <br>
   <p>Não é possível atualizar este pedido</p>
<?php

  }
}

?>

