<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:index.php');
  }

$logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<title>Buscar</title>
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link type="text/css">
 
</head>
<style type="text/css">
* {
  color:white;
  text-align: center; 
  color: black;
}
.bc {
    margin-left: 35px;
    margin-right: 45px;
}
</style>

<body>
    <!-- Barra de tarefas -->
<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center">Buscar</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="buscar.php">Buscar</a></li>
        <li><?php echo"Bem-Vindo, $logado" ?></li>
        <li ><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>
  
  <nav>
    <div class="nav-wrapper">
      <form name="busca" method="post" action="buscaUsuario.php">
        <div class="input-field">
          <input name="pesquisar" id="pesquisar" type="search" required>
          <label class="label-icon" for="search" name="buscar">Buscar</label>
          <i class="material-icons">x</i>
        </div>
      </form>
    </div>
  </nav>

  <!-- Inicio do Formulario-->
<br>
<br>
<br>
<br>
<br>

</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>