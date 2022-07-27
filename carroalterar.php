<?php
    // Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
    // Verifica se foi enviando dados via GET
    if ($_GET) {
        $id = (isset($_GET["cod"]) && $_GET["cod"] != null) ? $_GET["cod"] : "";
        //echo "<script>alert('".$id."');</script>";
        include 'conexao.php';
        try {
            $stmt = $conexao->prepare("SELECT * FROM carro WHERE id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->id;
                $marca = $rs->marca;
                $modelo = $rs->modelo;
                $preco = $rs->preco;   
                //echo "<script>alert('".$marca."');</script>";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }
?>
<?php
    if($_POST){
        $id = $_POST['txtid'];
        $marca = $_POST['txtmarca'];
        $modelo = $_POST['txtmodelo'];
        $preco = $_POST['txtpreco'];
        
        include "conexao.php";

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            $stmt = $conexao->prepare("UPDATE carro SET marca=?, modelo=?, preco=? WHERE id=?");
            $stmt->bindParam(1, $marca); 
            $stmt->bindParam(2, $modelo);
            $stmt->bindParam(3, $preco);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: index.php');
                }else{
                    //throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>
<?php
    session_start();
    $login_cookie = $_COOKIE['login'];
    if(isset($login_cookie)){
      
      
    }else{
      echo"Bem vindo, convidado <br>";
      echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
      echo"<br><a href='login.php'>Faça Login</a> Para ler o conteúdo";
    }
    
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <!--Materialize-->
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link type="text/css">
 
    <!--Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
</head>
<body>
       <!-- Barra de tarefas -->
<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center">Inicio</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><?php echo"Bem-Vindo, $logado" ?></li>
        <li ><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

<br>
<br>
<br>
<br>
<br>
<div class="bc">  
  <div class="row">
  <form action="carroalterar.php" method="post" class="col s12">
  <input type="hidden" name="txtid" value = '<?php echo "{$id}";?>'/>
      <div class="row">
        <div class="input-field col s12 center">
        <input id="txtmodelo" type="text" name="txtmodelo" class="validate" required value = '<?php echo "{$modelo}";?>'>
          <label for="modelo">Modelo</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtmarca" type="text" name="txtmarca" class="validate" required value = '<?php echo "{$marca}";?>'>
          <label for="marca">Marca</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtpreco" type="number" step="0.02" name="txtpreco" class="validate" required value = '<?php echo "{$preco}";?>'>
          <label for="">Preço</label>
        </div>
    
      <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
                <a href="index.php"><button class="btn waves-effect waves-light" type="button" name="action">Cancelar</button></a>
            </div>
            </form>
  </div>
    <!--JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script>
        M.AutoInit();
    </script>
</body>
</html>

<?php
    if($_POST){
        $id = $_POST['txtid'];
        $marca = $_POST['txtmarca'];
        $modelo = $_POST['txtmodelo'];
        $preco = $_POST['txtpreco'];
        
        include "conexao.php";

        try {
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('{$marca}', '{$modelo}', '{$preco}')");
            //$stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values('".$marca."', '".$modelo."', '".$preco."')");
            $stmt = $conexao->prepare("UPDATE carro SET marca=?, modelo=?, preco=? WHERE id=?");
            $stmt->bindParam(1, $marca); 
            $stmt->bindParam(2, $modelo);
            $stmt->bindParam(3, $preco);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: index.php');
                }else{
                    //throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>
