<?php
include ('menu.php');
ini_set('display_errors', 1); error_reporting(-1);
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inclusão de Produtos</title>
    </head>
    <style>
     .body{
   
    }
    </style>
   
   <body> 
       <h1>Incluir Produto</h1>
 
    <form action="" method="POST">
       <input name="codProd" class="input is-large" placeholder="Código do Produto" autofocus="">
       <input name="descricao" class="input is-large" placeholder="Descrição do Produto" autofocus="">
       <input name="qtdEstoque" class="input is-large" placeholder="Quantidade em Estoque" autofocus="">
       <input name="preco" class="input is-large" placeholder="Preço do Produto" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar Produto</button>
     </form>
   </body>
</html>
<?php
ini_set('display_errors', 1); error_reporting(-1);

if(!(empty($_POST['codProd']) || empty($_POST['descricao']) || empty($_POST['qtdEstoque']) || empty($_POST['preco']))) {
        $codProd = $_POST['codProd'];
        $descricao =  $_POST['descricao'];
        $qtdEstoque = $_POST['qtdEstoque'];
        $preco =  $_POST['preco'];
        $totalEstoque = $qtdEstoque;

        $query = "SELECT * FROM produtos";
       $dadosBanco= mysqli_query($conexao, $query);
        $adicionar = true;

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
       if($codProd == $dados['COD_PROD']){
         $adicionar = false;
     }

      if($descricao == $dados['DESCRICAO']){
            $totalEstoque += (int)$dados['ESTOQUE'];
     }
  }

    if($adicionar){

    $sql = "INSERT INTO produtos (COD_PROD, DESCRICAO, ESTOQUE, PRECO_UNIT, TOTAL_ESTOQUE) VALUES ('$codProd', '$descricao', '$qtdEstoque' ,'$preco', '$totalEstoque')";    $sqlEstoque = "UPDATE produtos SET TOTAL_ESTOQUE = '$totalEstoque' WHERE DESCRICAO = '$descricao'";
     if(mysqli_query($conexao,$sql) && mysqli_query($conexao,$sqlEstoque)){
?>       
       <br> 
       <p>Produto adcionado com sucesso</p>
<?php  
      }else{
?>
         <p>"Error: " . $sql . "<br>" . mysqli_error($conexao)</p>
<?php  
    }
  }

   if(!$adicionar){ 
   ?>
    <br>  
     <p>Não foi possivel cadastrar este produtos</p>
<?php
  }

}
?>

