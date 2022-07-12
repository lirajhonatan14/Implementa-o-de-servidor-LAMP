<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="style.css" />
 <title>Loja EAJ</title>
 </head>
<style>

table, th, td {
  border: 1px solid;
  border: 1px solid #ddd;
  overflow-x:auto;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  text-align: center;
}
table {
  width: 50%;
}
th {
    height: 50px;
}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  #008b8b;
  color: white;
  text-align: center;
}
button{
    width: 200px;
    text-align: center;
    padding: 15px 20px;
    border: 1px solid #eee;
    border-radius: 6px;
    background-color: #008b8b;
    font-size: 18px;
}
.some-class { width:200px; padding:20px;}

input { padding:10px; margin:10px 0; // add top and bottom margin}

.border-customized-input { border: 2px solid #eee;}

.border-removed-input { border: 0;}

input { padding:10px; border:0; box-shadow:0 0 15px 4px rgba(0,0,0,0.06);}

.rounded-input { padding:10px; border-radius:10px;}

input, textarea { font-family:inherit; font-size: inherit;}

form{
	margin: auto; 
	width: 220px;
}
table{
        margin: auto;
}

H1{ text-align: center;}
H2{ text-align: center; }
p{ text-align: center;}
/* UTILIDADES */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   }
   body {
    font-family: cursive;
   }
   a {
    text-decoration: none;
   }
   li {
    list-style: none;
   }

/* NAVBAR ESTILO */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: teal;
    color: #fff;
   }
   .nav-links a {
    color: #fff;
   }
   /* LOGO */
   .logo {
    font-size: 32px;
   }
   /* NAVBAR MENU */
   .menu {
    display: flex;
    gap: 1em;
    font-size: 18px;
   }
   .menu li:hover {
    background-color:#4c9e9e;
    border-radius: 5px;
    transition: 0.3s ease;
   }
   .menu li {
    padding: 5px 14px;
   }
   /* MENU SUSPENSO */
   .services {
    position: relative; 
   }
   .dropdown {
    background-color: rgb(1, 139, 139);
    padding: 1em 0;
    position: absolute; /*COM RELAÇÃO AOS PAIS*/
    display: none;
    border-radius: 8px;
    top: 35px;
   }
   .dropdown li + li {
    margin-top: 10px;
   }
   .dropdown li {
    padding: 0.5em 1em;
    width: 8em;
    text-align: center;
   }
   .dropdown li:hover {
    background-color: #4c9e9e;
   }
   .lista:hover .dropdown {
    display: block;
   }

/* NAVBAR MENU RESPONSIVA*/
/* CHECKBOX HACK */
input[type=checkbox]{
    display: none;
   } 
   /*HAMBURGER MENU*/
   .hamburger {
    display: none;
    font-size: 24px;
    user-select: none;
   }
   /* APLICAÇÃO MEDIA QUERIES */
   @media (max-width: 768px) {
   .menu { 
    display:none;
    position: absolute;
    background-color:teal;
    right: 0;
    left: 0;
    text-align: center;
    padding: 16px 0;
   }
   .menu li:hover {
    display: inline-block;
    background-color:#4c9e9e;
    transition: 0.3s ease;
   }
   .menu li + li {
    margin-top: 12px;
   }
   input[type=checkbox]:checked ~ .menu{
    display: block;
   }
  .hamburger {
    display: block;
   }
   .dropdown {
    left: 50%;
    top: 30px;
    transform: translateX(35%);
   }
   .dropdown li:hover {
    background-color: #4c9e9e;
   }
   }

</style>
 <body>
 <nav class="navbar">
 <!-- LOGO -->
 <div class="logo">Escola Agrícola de Jundiaí UFRN</div>
 <!-- NAVEGAÇÃO MENU -->
 <ul class="nav-links">
 <!-- CHECKBOX HACK -->
 <input type="checkbox" id="checkbox_toggle" />
 <label for="checkbox_toggle" class="hamburger">&#9776;</label>
 <!-- NAVEGAÇÃO MENUS -->
 <div class="menu">

 <li class="lista">
 <a>Inclusão</a>
 <!-- MENU SUSPENSO OU DROPDOWN MENU -->
 <ul class="dropdown">
 <li><a href="incluir_usuario.php">Cliente</a></li>
 <li><a href="incluir_produto.php">Produto</a></li>
 <li><a href="incluir_pedido.php">Pedido</a></li>
 </ul>
 </li>

 <li class="lista">
 <a>Exclusão</a>
 <!-- MENU SUSPENSO OU DROPDOWN MENU -->
 <ul class="dropdown">
 <li><a href="excluir_usuario.php">Cliente</a></li>
 <li><a href="excluir_produto.php">Produto</a></li>
 <li><a href="excluir_pedido.php">Pedido</a></li>
 </ul>
 </li>

 <li class="lista">
 <a>Alteração</a>
 <!-- MENU SUSPENSO OU DROPDOWN MENU -->
 <ul class="dropdown">
 <li><a href="alterar_usuario.php">Cliente</a></li>
 <li><a href="alterar_produto.php">Produto</a></li>
 <li><a href="alterar_pedido.php">Pedido</a></li>
 </ul>
 </li>

 <li class="lista">
 <a>Relatório</a>
 <!-- MENU SUSPENSO OU DROPDOWN MENU -->
 <ul class="dropdown">
 <li><a href="relatorio_cliente.php">Cliente</a></li>
 <li><a href="relatorio_produto.php">Produto</a></li>
 <li><a href="relatorio_pedido.php">Pedido</a></li>
 </ul>
 </li>
 <li><a href="sair.php">Sair</a></li>
 </div>
 </ul>
 </nav>
 <h1> Olá, <?=$_SESSION['NOME']?></h1>
 </body>
</html>

