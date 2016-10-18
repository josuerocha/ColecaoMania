<?php
session_start();
$idUsuRecebe = $_POST['idUsuRecebe'];
$texto = $_POST['chat-text'];
$hora = date("H:i:s");
$data = date("Y-m-d");

$conexao = new mysqli("localhost", "root", "", "colecao_mania");
$situacao = TRUE;
try{
   $query = "insert into tbmensagem (idMensagem, idUsuEnvia, idUsuRecebe, texto, hora, data) values ('0','{$_SESSION["codigo"]}','{$idUsuRecebe}','{$texto}','{$hora}','{$data}')";
   $conexao->query($query);
   $codigo = $conexao->insert_id;
   $idMensagem = $codigo;

    
    $conexao->close();
    array_push($situacao,$codigo);
}catch (Exception $ex) 
        {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

    echo $situacao;

?>
