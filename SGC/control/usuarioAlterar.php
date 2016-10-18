<?php

session_start();
require_once '../class/UsuarioDAO.php';
require_once '../control/caminhos.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->buscarPorId($_SESSION["codigo"]);
$usuario->setNome($_POST["nome"]);
$usuario->setEmail($_POST["email"]);
$usuario->setTelefone($_POST["telefone"]);
$usuario->setDataNasc($_POST["dtNasc"]);
$usuario->setIdIdioma($_POST["idioma"]);
//$usuario->setFoto($_POST["foto"]);
//$usuario->setFoto("componentes/assets/ckfinder/userfiles/images/noimg.png");
//if(usuarioDAO->buscaCodPorFoto($_SESSION["codigo"])==){}

if (!empty($_FILES["arquivo"]["name"])) 
{
    if ((($_FILES["arquivo"]["type"] == "image/png") ||
            ($_FILES["arquivo"]["type"] == "image/jpg") ||
            ($_FILES["arquivo"]["type"] == "image/jpeg") ||
            ($_FILES["arquivo"]["type"] == "image/gif")) &&
            ($_FILES["arquivo"]["size"] <= 1073741824)) 
    {
        if ($_FILES["arquivo"]["error"] > 0) 
        {
            echo "Error: " . $_FILES["arquivo"]["error"] . "<br>";
        } else 
        {
            //http://localhost/ForumCOLECAOmania%20-%20Copia/ fazer index.php redirecionar p principal
            //incluir ../pages/ + caminho inicial e verificar se é noimg.jpg se for n apagar função/pages/caminho
            //define-constante fazer um arquivo config como os caminhos do servidor e aplicação para usar salvar imagem como nome
            // unlink($usuario->getImagem());
//echo $_FILES["arquivo"]["name"];
            if ($usuario->getImagem() != "noimg.png") 
            {
                unlink($caminhoServer . "" . $caminhoImagens . "" . $usuario->getImagem());
            }

            $usuario->setImagem("{$_FILES["arquivo"]["name"]}");

            $geraNome = utf8_decode($_POST["email"]) . time() . "." . substr($_FILES["arquivo"]["name"], -3);

            if (file_exists(".." . $caminhoImagens . $_FILES["arquivo"]["name"])) 
            {

                move_uploaded_file($_FILES["arquivo"]["tmp_name"], ".." . $caminhoImagens . $geraNome); //renomeia
                $usuario->setImagem($geraNome);
            } else 
            {
                move_uploaded_file($_FILES["arquivo"]["tmp_name"], ".." . $caminhoImagens . $geraNome); //renomeia
                $usuario->setImagem($geraNome);
            }
        }
    } else 
    {
        echo "<script>alert('Imagem Inválida!');";
    }
} else 
{
    $usuario->setImagem($usuarioDAO->buscaFoto($_SESSION["codigo"]));
}
//echo $usuario->getImagem();
if (!$usuarioDAO->validaEmailId($usuario->getEmail(), $_SESSION["codigo"]) && $usuarioDAO->validaEmail($usuario->getEmail())) 
{
    echo "<script>alert('Email já existe!'); location.href='../pages/menu.php?pagina=dados';</script>";
} else 
{
    if ($usuarioDAO->salvar($usuario)) 
    {
        echo "<script>alert('Salvo com sucesso!'); location.href='../pages/menu.php?pagina=dados';</script>";
    } else 
    {
        echo "<script>alert('Erro ao salvar o Sucesso.'); location.href='../pages/menu.php?pagina=dados';</script>";
    }
}
?>