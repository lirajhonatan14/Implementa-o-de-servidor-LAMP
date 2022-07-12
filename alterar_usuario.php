<?php
ini_set('display_errors', 1); error_reporting(-1);
include('menu.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alteração de Usuários</title>
    </head>
    <body>
       <h1>Alterar usuário</h1>
    <form action="" method="POST">
       <input name="RG" class="input is-large" placeholder="RG de usuário" autofocus="">
      <input name="USUARIO" class="input is-large" placeholder="Novo nome de usuário" >
      <input name="PASSWD" class="input is-large" placeholder="Nova senha de usuário" autofoc>
      <input name="ENDERECO" class="input is-large" placeholder="Novo endereço de usuário">
       <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar Usuário</button>
 </form>

   </body>
</html>

<?php
if(!(empty($_POST['USUARIO']) || empty($_POST['PASSWD']) || empty($_POST['RG']) || empty($_POST['ENDERECO']))) {

        $usuario = $_POST['USUARIO'];
        $senha =  $_POST['PASSWD'];
        $rg = $_POST['RG'];
        $endereco =  $_POST['ENDERECO'];

        $query = "SELECT * FROM cliente";

        $dadosBanco= mysqli_query($conexao, $query);
        $alterar = false;

   while($dados =  mysqli_fetch_assoc($dadosBanco)){
      if($rg == $dados['RG']){
         $alterar = true;
      }
  }

  if($alterar){
   $sql = "UPDATE cliente SET NOME = '$usuario', SENHA = '$senha', ENDERECO = '$endereco' WHERE  RG = '$rg'";
       if(mysqli_query($conexao,$sql) == TRUE){
?>
	  <br>
          <p>Usuário atualizado com sucesso</p>
<?php
      }else{  
      echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
 }
}

  if(!$alterar){ 
?>
 <br>
 <p>Não é possível atualizar este usuário</p>
<?php
}

}
?>

