<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link type="text/css">
</head>




<body>
    <!-- Barra de tarefas -->
<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center">Cadastro</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="login.php">Login</a></li>
        <li><a href="cadastro.php">Cadastrar</a></li>
      </ul>
    </div>
  </nav>

  <!-- Inicio do Formulario-->
<br>
<br>
<br>
<br>
<br>


<div class="container">
<form class="col s12" method="POST" action="cadastrousuario.php">
      <div class="row">
        <div class="input-field col s12">
          <input id="login" type="text" name="login">
          <label for="nome">Nome</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="senha" type="password" name="senha">
          <label for="password">Senha</label>
        </div>
      </div>
            <div class="row right">
                <a href="login.php"><button class="btn waves-effect waves-light"  type="button" name="action">Login</button></a>
                <input class="btn waves-effect waves-light" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
            </div>
</form>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>