<?php
session_start();
ini_set('display_errors', 1); error_reporting(-1);
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja EAJ - Login</title>
</head>
<style>
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
H1{ text-align: center;}
H2{ text-align: center; }
</style>
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">Sistema de Login</h1>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="NOME" class="input is-large" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="SENHA" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>




