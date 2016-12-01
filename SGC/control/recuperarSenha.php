<?php	
  ini_set('default_charset', 'UTF-8');
  session_start();
  require_once '../class/UsuarioDAO.php';
  require_once '../class/Usuario.php';
  require_once 'mailService.php';
  
  $usuarioDAO = new UsuarioDAO();	
  $usuario = new Usuario();	
	
	$email = $_POST["emailLogin"];

  $_SESSION['codigo'] = $usuarioDAO->buscaIdPorEmail($email);
                   
  if(isset($_SESSION['codigo'])){
      $usuario = $usuarioDAO->buscarPorId($_SESSION['codigo']);
      $usuario->setRecuperarSenha(1);
      $salvo = $usuarioDAO->salvar($usuario);

      $message = "<html>
                  Olá prezado <b>{$usuario->getNome()}</b>,<br>
                  segue o link para redefinição de sua senha, como solicitado.<br><br>
                  
                  <a href='https://localhost/IHCTP/SGC/pages/redefinir_senha.php?code={$usuario->getIdUsuario()}'>Redefinir senha</a><br><br>
                  A equipe do Coleções mania agradece.
                  </html>";

      sendMail($email,"Redefinição de senha",$message);

      if($salvo){
      echo "<script>alert('E-mail para redefinição enviado!'); location.href='../pages/index.php';</script>";  
      }
  }
  else{
      echo "<script>alert('E-mail não cadastrado!'); location.href='../pages/index.php';</script>";  
  }
	
?>
