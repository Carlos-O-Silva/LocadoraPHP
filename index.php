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
      <a href="index.php" class="brand-logo center">Inicio</a>
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
<section class="container">
        <form action="carrosalvar.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="txtmarca" type="text" name="txtmarca" class="validate" required>
                    <label for="last_name">Marca</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="txtmodelo" type="text" name="txtmodelo" class="validate" required>
                    <label for="last_name">Modelo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="txtpreco" type="number" step="0.02" name="txtpreco" class="validate" required>
                    <label for="last_name">Preço</label>
                </div>
            </div>
            <div class="row right">
                <button class="btn waves-effect waves-light" type="submit" name="action">Inserir</button>
                <button class="btn waves-effect waves-light" type="reset" name="action">Cancelar</button>
            </div>
        </form>
 <table>
        <thead>
  <tr>
      <th>id</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Preço</th>
      <th>Data cadastro</th>
      <th>Ações</th>
      
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
            include "conexao.php";
            try {
                $stmt = $conexao->prepare("SELECT * FROM carro ORDER BY id DESC;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo"<tr>
                            <td>{$rs->id}</td>
                            <td>{$rs->marca}</td>
                            <td>{$rs->modelo}</td>
                            <td>{$rs->preco}</td>
                            <td>{$rs->dt_cadastro}</td>
                             <td><a class='btn waves-effect waves-light' href='carroalterar.php?cod={$rs->id}'>Editar</a></td>
                             <td><a class='btn waves-effect waves-light' href='carroexcluir.php?cod={$rs->id}'>Apagar</a> </td>
                            
                             
                            </tr>";
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?>
        </tbody>
      </table>

  </tbody>
  
  <table>
        <thead>
  <tr>
      <th>ID</th>
      <th>Login</th>
      <th>Senha</th>
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
            include "conexao.php";
            try {
                $stmt = $conexao->prepare("SELECT * FROM usuarios ORDER BY id DESC;");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo"<tr>
                            <td>{$rs->ID}</td>
                            <td>{$rs->login}</td>
                            <td>{$rs->senha}</td>
                            
                            <td><a class='btn waves-effect waves-light' href='usuarioexcluir.php?cod={$rs->ID}'>Apagar</a> </td>
                            </tr>";
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?>
        </tbody>
      </table>

        </tbody>
</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>