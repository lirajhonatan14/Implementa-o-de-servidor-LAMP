
<?php
ini_set('display_errors', 1); error_reporting(-1);
include('menu.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inclusão de Usuários</title>
    </head>
<style>

</style>	
    <body>
       <h1>Incluir usuário</h1>
    <form action="" method="POST">
       <input name="USUARIO" class="input is-large" placeholder="Nome de usuário" autofocus="">
       <input name="RG" class="input is-large" placeholder="RG de usuário" autofocus="">
       <input name="PASSWD" class="input is-large" placeholder="Senha de usuário" autofocus="">
       <input name="ENDERECO" class="input is-large" placeholder="Endereço de usuário" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar usuário</button>       
     </form>
   </body>
</html>
<?php
ini_set('display_errors', 1); error_reporting(-1);

if(!(empty($_POST['USUARIO']) || empty($_POST['PASSWD']) || empty($_POST['RG']) || empty($_POST['ENDERECO']))) {

        $usuario = $_POST['USUARIO'];
        $senha =  $_POST['PASSWD'];
        $rg = $_POST['RG'];
        $endereco =  $_POST['ENDERECO'];

        $query = "SELECT * FROM cliente";

        $dadosBanco= mysqli_query($conexao, $query);
        $adicionar = true;

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
       if($usuario == $dados['NOME']){
         $adicionar = false;
      }

      if($rg == $dados['RG']){
         $adicionar = false;
      }
  }

  if($adicionar){
       $sql = "INSERT INTO cliente(NOME, SENHA, RG, ENDERECO) VALUES ('$usuario', '$senha', '$rg', '$endereco')";
       if(mysqli_query($conexao,$sql) == TRUE){
?>
            <br>
           <p>Usuário Adicionado com sucesso</p>
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
  <p>Não é possível adcionar este usuário</p>
<?php
}
}
?>

