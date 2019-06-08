<?php
require_once './config/Global.php';

    $method = filter_input(INPUT_POST, 'metodo');
    $origem = filter_input(INPUT_POST, 'origem');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');

    if($method === 'acessar'){
        if(UsuarioController::consultaUsuario($email, $senha)){
            $_SESSION["success"] = "Usuário logado com sucesso.";
            $destino = 'Location: ' . $origem;
            header($destino);
            echo 'TUDO CERTO';
            echo $origem;
        }else{
            echo 'DEU muiot RUIM!!';
            echo $email;
            echo $senha;
            $_SESSION["danger"] = "Usuário ou senha invalido.";
        }
    }


?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecomerce CES/JF</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

 
  </head>
  <body class="body-lg">
  	<div class="sidenav">
         <div class="login-main-text">
            <h2>E-COMMERCE<br> CES/JF</h2>
            <p>PÁGINA DE LOGIN</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form action="login.php" method="POST">
                    <input type="hidden" name="metodo" value="acessar">
                    <input type="hidden" name="origem" value="<?php echo $_SERVER['HTTP_REFERER'] ?>"
	                <div class="form-group">
	                    <label>Login</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
	                </div>
                  	<div class="form-group">
                     	<label>Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                  	</div>
                  	<a href="index.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
                  	<button type="submit" class="btn btn-black">Login</button>
               </form>
            </div>
         </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>