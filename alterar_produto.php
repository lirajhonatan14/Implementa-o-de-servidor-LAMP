<?php
include ('menu.php');
ini_set('display_errors', 1); error_reporting(-1);
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alteração de Produtos</title>
    </head>
    <style>
     .body{

    }
    </style>

   <body>
       <h1>Alterar Produto</h1>

    <form action="" method="POST">
       <input name="codProd" class="input is-large" placeholder="Código do Produto" autofocus="">
       <input name="descricao" class="input is-large" placeholder="Alterar Descrição" autofocus="">
       <input name="qtdEstoque" class="input is-large" placeholder="Alterar Estoque" autofocus="">
       <input name="preco" class="input is-large" placeholder="Alterar Preço" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar Produto</button>
     </form>
   </body>
</html>

<?php
ini_set('display_errors', 1); error_reporting(-1);

if(!(empty($_POST['codProd']) || empty($_POST['descricao']) || empty($_POST['qtdEstoque']) || empty($_POST['preco']))) {        $codProd = $_POST['codProd'];
        $codProd = $_POST['codProd'];
        $descricao =  $_POST['descricao'];
        $qtdEstoque = $_POST['qtdEstoque'];
        $preco =  $_POST['preco'];
        $totalEstoque = $qtdEstoque;

        $query = "SELECT * FROM produtos";
       $dadosBanco= mysqli_query($conexao, $query);
        $alterar = false;

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
       if($codProd == $dados['COD_PROD']){
         $alterar = true;
     }

       if($descricao == $dados['DESCRICAO']){
         $totalEstoque += (int)$dados['ESTOQUE'];
     }
  }

    if($alterar){
  $sql = "UPDATE produtos SET DESCRICAO = '$descricao', ESTOQUE = '$qtdEstoque', PRECO_UNIT = '$preco', TOTAL_ESTOQUE = '$totalEstoque' WHERE COD_PROD = '$codProd'"; 
  $sqlEstoque = "UPDATE produtos SET TOTAL_ESTOQUE = '$totalEstoque' WHERE DESCRICAO = '$descricao'";
     if(mysqli_query($conexao,$sql) && mysqli_query($conexao, $sqlEstoque)){
?>
	<br>
       <p>Produto atualizado com sucesso</p>
<?php     
      }else{
         echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
    }
  }

   if(!$alterar){ 
?>
    <br>
    <p>Não foi possivel atualizar este produtos</p>
<?php
}

}
?>


