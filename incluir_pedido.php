<?php
include('menu.php');
ini_set('display_errors', 1); error_reporting(-1);
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inclusão de Pedidos</title>
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
     <h1>Incluir Pedido</h1>
    <form action="" method="POST">
       <input name="cliente" class="input is-large" placeholder="Nome do Cliente" autofocus="">
       <input name="rg" class="input is-large" placeholder="RG do Cliente" autofocus="">
       <input name="codProd" class="input is-large" placeholder="Código do Produto" autofocus="">
       <input name="qtd" class="input is-large" placeholder="Quantidade" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar pedido</button>
     </form>
   
  </body>

<?php
ini_set('display_errors', 1); error_reporting(-1);

if( !( empty($_POST['cliente']) || empty($_POST['rg']) || empty($_POST['codProd']) || empty($_POST['qtd'])) ){
        $data = date('Y-d-m');
        $endereco = "";
        $codProd = $_POST['codProd'];
        $total_geral = 0;
        $total = 0;
        $cliente = $_POST['cliente'];
        $qtdPedido = (int)$_POST['qtd'];
        $rg =  $_POST['rg'];
        $preco = 0;
        $numPed = 0;
        $totalGeral = 0;
        $descricao = "";

        $query = "SELECT * FROM produtos";
        $query2 = "SELECT * FROM cliente";

        $dadosCliente = mysqli_query($conexao, $query2);
        $dadosBanco= mysqli_query($conexao, $query);
        $adicionarResumo = false;
        $adicionarVendas = false;

   while($dados =  mysqli_fetch_assoc($dadosCliente)){
       if($rg == $dados['RG'] && $cliente == $dados['NOME']){
         $adicionarResumo = true;
         $endereco = $dados['ENDERECO'];
      }
   }

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
        if($codProd == $dados['COD_PROD'] && $qtdPedido <= (int)$dados['ESTOQUE']){
          $adicionarVendas = true;
          $preco = (int) $dados['PRECO_UNIT'];
          $total +=  $preco * $qtdPedido;
          $descricao = $dados['DESCRICAO'];
      }
    }
  
  $queryVendas = "SELECT * FROM vendas";
  $dadosVendas = mysqli_query($conexao, $queryVendas);

   while($dados =  mysqli_fetch_assoc($dadosVendas)){
     if($descricao == $dados['DESCRICAO'] && $codProd == $dados['COD_PROD']){
        $total += (int) $dados['PRECO'] * (int) $dados['QUANT'];
      }
   }
   
    if($adicionarResumo && $adicionarVendas){
        // $totalGeral = $total;
         $incluirResumo = true;
         $queryResumo = "SELECT * FROM resumo_pedido";
         $dadosResumo = mysqli_query($conexao, $queryResumo);

         while($dados =  mysqli_fetch_assoc($dadosResumo)){
                if($rg == $dados['RG'])
                $incluirResumo = false;
        }

        if($incluirResumo){
        $sqlResumo = "INSERT INTO resumo_pedido (DATA, CLIENTE, ENDERECO ,RG, TOTAL_GERAL) VALUES ('$data', '$cliente', '$endereco', '$rg', '$totalGeral')";
          if(!mysqli_query($conexao,$sqlResumo)){
         echo "Error: " . $sqlResumo . "<br>" . mysqli_error($conexao);
      }
    }

        $sqlProdutos = "UPDATE produtos SET ESTOQUE = ESTOQUE - '$qtdPedido', TOTAL_ESTOQUE = TOTAL_ESTOQUE - '$qtdPedido' WHERE COD_PROD = '$codProd'";

   if(!mysqli_query($conexao, $sqlProdutos)){
     echo "Error: " . $sqlProdutos . "<br>" . mysqli_error($conexao);
  }

    $queryVendas = "SELECT * FROM vendas";
    $dadosVendas = mysqli_query($conexao, $queryVendas);
    $query3 = "SELECT * FROM resumo_pedido";
    
    $dadosResumo = mysqli_query($conexao, $query3);
    while($dados =  mysqli_fetch_assoc($dadosResumo)){
       if($rg == $dados['RG']){
          $numPed = $dados['NUM_PED'];
      }
    }


   $acheiPedido = false; 
   while($dados =  mysqli_fetch_assoc($dadosVendas)){
        if($codProd == $dados['COD_PROD'] && $numPed == $dados['NUM_PED'])
            $acheiPedido = true;
    }
   
   if(!$acheiPedido){
    $totalGeral = $total;
    $dadosVendas = mysqli_query($conexao, $queryVendas);
    while($dados =  mysqli_fetch_assoc($dadosVendas)){
       if($numPed == $dados['NUM_PED'])
                $totalGeral += (int) $dados['TOTAL'];
    }

    $sqlVendas = "INSERT INTO vendas (NUM_PED, COD_PROD, DESCRICAO, QUANT, PRECO, TOTAL, TOTAL_GERAL) VALUES ('$numPed','$codProd', '$descricao', '$qtdPedido', '$preco', '$total', '$totalGeral')";  
    $sqlAtualizaTot = "UPDATE vendas SET TOTAL_GERAL = '$totalGeral' WHERE NUM_PED = '$numPed'";
     if(!mysqli_query($conexao,$sqlAtualizaTot)){
                echo "Error: " . $sqlVendasDesc . "<br>" . mysqli_error($conexao);
          }

   }else{
      $sqlVendasDesc = "UPDATE vendas SET QUANT = QUANT + '$qtdPedido', TOTAL = '$total' WHERE DESCRICAO = '$descricao' AND NUM_PED = '$numPed' AND COD_PROD = '$codProd'";
      if(!mysqli_query($conexao,$sqlVendasDesc)){
		echo "Error: " . $sqlVendasDesc . "<br>" . mysqli_error($conexao);
          }
   }
   
  $dadosVendas = mysqli_query($conexao, $queryVendas);
   while($dados =  mysqli_fetch_assoc($dadosVendas)){
       if($numPed == $dados['NUM_PED'])
                $totalGeral += (int) $dados['TOTAL'];
    }
     $sqlAtualizaResumo = "UPDATE resumo_pedido SET TOTAL_GERAL = '$totalGeral' WHERE RG = '$rg'";
     
     if($acheiPedido) $sqlVendas = "UPDATE vendas SET TOTAL_GERAL = '$totalGeral' WHERE NUM_PED = '$numPed'";

     if(!(mysqli_query($conexao,$sqlVendas) && mysqli_query($conexao, $sqlAtualizaResumo))){
        echo "Error: " . $sqlVendas . "<br>" . mysqli_error($conexao);
       echo "Error: " . $sqlAtualizaResumo . "<br>" . mysqli_error($conexao);
  }

}
if(!$adicionarResumo || !$adicionarVendas){
?>
 <br>
   <p>Não foi possível finalizar este pedido</p>
<?php
}else{
?>
   <br>
   <p>Pedido finalizado com sucesso</p>
<?php
}
}

?>

