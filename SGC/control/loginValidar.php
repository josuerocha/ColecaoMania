<?php	
        session_start();
	require_once '../class/UsuarioDAO.php';
        require_once '../class/Usuario.php';
        
	$usuarioDAO = new UsuarioDAO();	
        $usuario = new Usuario();	
	
	$email = $_POST["emailLogin"];   
	$senha = $_POST["senhaLogin"];

	$senha = MD5($senha);	

        $_SESSION['codigo']=$usuarioDAO->buscaIdPorEmail($email);
                   
	if($usuarioDAO->validar($email,$senha)){
           
              $usuario = $usuarioDAO->buscarPorId($_SESSION["codigo"]);  
             // echo $_SESSION["codigo"]."  ".$usuario->getStatus();
              
            if($usuario->getStatus()==1){
                if($usuario->getConfirmado()==0){
                    echo "<script>alert('Confirme seu e-mail utilizando a mensagem enviada em sua caixa de entrada.');</script>";
                    echo "<script> location.href='../pages/index.php';</script>";
                }

                else if($usuario->getConfirmado()==1){
                    header("location:../pages/menu.php");
                }
            }else
            {
                $usuarioDAO->mudaStatus($_SESSION["codigo"], 1);
                $_SESSION['mensagemModal'] = 'Você ativou sua conta. Seja bem vindo, novamente!';
                echo "<script> location.href='../pages/menu.php';</script>";            
            }
	}else{
                $_SESSION['mensagemModal'] = 'Dados inválidos!!!';
		echo "<script> location.href='../pages/index.php';</script>"; 
	}
	
?>
