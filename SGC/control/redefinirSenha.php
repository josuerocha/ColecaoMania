<?php	
  ini_set('default_charset', 'UTF-8');
  session_start();
  require_once '../class/UsuarioDAO.php';
  require_once '../class/Usuario.php';
  
  $usuarioDAO = new UsuarioDAO();	
  $usuario = new Usuario();	

  $_SESSION['codigo'] = $_POST['idUsuario'];
  $senha = $_POST['senha'];
                   
  if(isset($_SESSION['codigo'])){
      echo $_SESSION['codigo'];
      $usuario = $usuarioDAO->buscarPorId($_SESSION['codigo']);

      if($usuario->getRecuperarSenha() == 1){
        $usuario->setRecuperarSenha(0);
        $usuario->setSenha(MD5($senha));

        $alterado = $usuarioDAO->salvar($usuario);

        if($alterado){
          echo "<script>alert('Senha redfinida com sucesso!'); location.href='../pages/index.php';</script>";  
        }
        else{
          echo "<script>alert('Erro!'); location.href='../pages/recuperar_senha.php';</script>";  
        }
      }
      else{
           echo "<script>alert('Acesso negado!'); location.href='../pages/index.php';</script>";

      }
      
	   }

  else{
    echo "<script>alert('Erro!'); location.href='../pages/recuperar_senha.php';</script>";  
  }
?>
