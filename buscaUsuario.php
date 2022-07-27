<!DOCTYPE html>
<html>

<head>
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

<title>Inicio</title>
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
      <a href="buscar.php" class="brand-logo center">Resultado da Busca</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="buscar.php">Buscar</a></li>
        <li><?php echo"Bem-Vindo, $logado" ?></li>
        <li ><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <!-- Inicio do Formulario-->
<br>
<br>
<br>
<br>
<br>
<div class="bc">  

</div>
 
</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>



<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$dbname = "crudsimples";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM carro WHERE marca LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	
    // if ($pesquisar == null) {
    if($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "Marca: ".$rows_cursos['marca']."<br>";
        echo "Modelo: ".$rows_cursos['modelo']."<br>";
        echo "Preço: ".$rows_cursos['preco']."<br>";
        echo "Data do cadastramento: ".$rows_cursos['dt_cadastro']."<br><br><br><br>";
        echo"<td><a class='btn waves-effect waves-light' href='buscar.php'>Nova pesquisa</a> </td>";
	} 

else {  
       echo "Nenhuma marca foi encontrada no Banco de dados.<br><br><br><br>";
    echo"<td><a class='btn waves-effect waves-light' href='buscar.php'>Nova pesquisa</a> </td>";
}
?>