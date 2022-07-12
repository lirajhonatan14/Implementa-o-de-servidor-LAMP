<?php
include('menu.php');
include('conexao.php');
ini_set('display_errors', 1); error_reporting(-1);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exclusão de Usuários</title>
    </head>
    <body>
       <h1>Excluir Usuários</h1>
    <form action="" method="POST">
       <input name="NOME" class="input is-large" placeholder="Nome de usuário" autofocus="">

       <button type="submit" class="button is-block is-link is-large is-fullwidth">Excluir Usuário</button>
     </form>
   </body>
</html>

<?php
if(!empty($_POST['NOME'])){
$usuario = $_POST['NOME'];

$query = "select NOME from cliente where NOME = '{$usuario}'";
$sql = "delete from cliente where NOME = '{$usuario}'";
$result = mysqli_query($conexao, $query);
$del = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result);
if($row == 1){
        $del;
?>
	<br>
        <p>Usuário excluido com sucesso</p>
<?php
}else{
?>
	<br>
        <p>Não foi possivel excluir o usuario</p>
<?php
}
}
?>

