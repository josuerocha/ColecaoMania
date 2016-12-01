<?php	
  ini_set('default_charset', 'UTF-8');
  session_start();
  require_once '../class/UsuarioDAO.php';
  require_once '../class/Usuario.php';
  
  $usuarioDAO = new UsuarioDAO();	
  $usuario = new Usuario();	

  $_SESSION['codigo'] = $_GET['code'];
                   
  if(isset($_SESSION['codigo'])){
      $usuario = $usuarioDAO->buscarPorId($_SESSION['codigo']);

      if($usuario->getConfirmado() == 0){
        $usuario->setConfirmado(1);

        $alterado = $usuarioDAO->salvar($usuario);

        if($alterado){
          echo "<script>alert('Email confirmado com sucesso!'); location.href='../pages/index.php';</script>";  
        }
        else{
          echo "<script>alert('Erro!'); location.href='../pages/index.php';</script>";  
        }
      }
      else{
           echo "<script>alert('Acesso negado!'); location.href='../pages/index.php';</script>";

      }
      
	   }

  else{
    echo "<script>alert('Erro!'); location.href='../pages/index.php';</script>";  
  }
?>
