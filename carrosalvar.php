<?php

if($_POST){
    $marca = $_POST['txtmarca'];
    $modelo = $_POST['txtmodelo'];
    $preco = $_POST['txtpreco'];
}

include "conexao.php";


    try {

        $stmt = $conexao->prepare("INSERT INTO carro (marca, modelo, preco) values(?, ?, ?)");
        
        $stmt->bindParam(1, $marca);
        
        $stmt->bindParam(2, $modelo);
        
        $stmt->bindParam(3, $preco);
        
        if ($stmt->execute()) {
        
        if ($stmt->rowCount() > 0 ){
        
        header('location: index.php');
        
        } else {
        
        echo "Erro: Não foi possivel executar a declaração sql";
        
        }
        
        } else {
        
        echo "Erro na execução do cadastro! ";
        
        }
        
        } catch (PDOException $erro) {
        
        echo "Erro na conexão :" . $erro->getMessage();
        
        }

?>