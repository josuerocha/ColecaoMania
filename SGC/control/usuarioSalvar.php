<?php
session_start();
require_once '../class/UsuarioDAO.php';
require_once 'caminhos.php';
require_once 'mailService.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setIdUsuario($_POST["idUsuario"]);
$usuario->setNome($_POST["nome"]);
$usuario->setEmail($_POST["email"]);
$usuario->setIdIdioma($_POST["idioma"]);
$usuario->setDataNasc($_POST["dtNasc"]);
$senha = $_POST["senha"];
$usuario->setImagem("noimg.png");
$usuario->setIdPais(1);//BRASIL POR PADRAO
//$usuario->setFoto("componentes/assets/ckfinder/userfiles/images/noimg.png");
$usuario->setConfirmado(0);
$usuario->setRecuperarSenha(0);
$usuario->setTipo(2);

if(strlen($senha) < 8 || $usuarioDAO->validaEmail($usuario->getEmail()))
{
    $_SESSION['mensagemModal'] = 'Senha inválida ou email já existe!';
    echo "<script> location.href='../pages/index.php';</script>"; 
}else 
{
    $senha = MD5($_POST["senha"]);
    $usuario->setSenha($senha);
   
    if ($usuarioDAO->salvar($usuario)) 
    {   

        $message = "<html>
                  Olá prezado(a) <b>{$usuario->getNome()}</b>,<br>
                  segue o link para confirmação de seu e-mail.<br><br>
                  
                  <a href='https://localhost/IHCTP/SGC/control/confirmarEmail.php?code={$usuario->getIdUsuario()}'>Confirmar e-mail</a><br><br>
                  A equipe do Coleções mania agradece.
                  </html>";

        sendMail($usuario->getEmail(),"Confirmação de e-mail",$message);



        $cod = $usuarioDAO->buscaIdPorEmail($_POST["email"]);
        $_SESSION['mensagemModal'] = 'Faça seu login!';
        echo "<script> location.href='../pages/index.php';</script>";
    } else 
    {
        $_SESSION['mensagemModal'] = 'Erro ao salvar.';
        echo "<script> location.href='../pages/index.php';</script>";
    }
}
?>