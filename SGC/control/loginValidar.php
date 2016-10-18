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
                header("location:../pages/menu.php");
                
            }else
            {
                $usuarioDAO->mudaStatus($_SESSION["codigo"], 1);
               echo "<script>alert('Você ativou sua conta. Seja bem vindo, novamente!'); location.href='../pages/menu.php';</script>";            
            }
	}else{
		echo "<script>alert('Dados inválidos !!!'); location.href='../pages/index.php';</script>"; 
	}
	
?>
