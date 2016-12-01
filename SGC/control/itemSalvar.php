<?php

session_start();
require_once '../class/ItemColecaoDAO.php';
require_once '../control/caminhos.php';
require_once '../class/UsuarioSeguidoDAO.php';
require_once '../control/funcoes.php';

$itemColecao = new ItemColecao();
$itemColecaoDAO = new ItemColecaoDAO();

$seguidor = new UsuarioSeguido();
$seguidorDAO = new UsuarioSeguidoDAO();

$itemColecao->setNome($_POST["nome"]);
$itemColecao->setDescricao($_POST["desc"]);
$itemColecao->setQuantidade($_POST["qtd"]);
$itemColecao->setNroSerie($_POST["nro"]);
$itemColecao->setInteresse($_POST["interesse"]);
$itemColecao->setIdColecao($_POST["cd"]);

if (isset($_POST["cdI"])) {
    $itemColecao->setIdItemColecao($_POST["cdI"]);
    $itemColecao->setImagem($itemColecaoDAO->buscaFoto($_POST["cdI"]));
} else {
    $itemColecao->setIdItemColecao(0);
}

if (!empty($_FILES["arquivo"]["name"])) {

    if ((($_FILES["arquivo"]["type"] == "image/png") ||
            ($_FILES["arquivo"]["type"] == "image/jpg") ||
            ($_FILES["arquivo"]["type"] == "image/jpeg") ||
            ($_FILES["arquivo"]["type"] == "image/gif")) &&
            ($_FILES["arquivo"]["size"] <= 1073741824)) {

        if ($_FILES["arquivo"]["error"] > 0) {
            echo "Error: " . $_FILES["arquivo"]["error"] . "<br>";
        } else {
            if ($itemColecao->getImagem() != "noimg.png" && $itemColecao->getImagem() != "") {
                unlink($caminhoServer . "" . $caminhoImagens . "" . $itemColecao->getImagem());
            }

            $itemColecao->setImagem("{$_FILES["arquivo"]["name"]}");
            $geraNome = utf8_decode($_POST["qtd"]) . $_POST["interesse"] . time() . "." . substr($_FILES["arquivo"]["name"], -3);

            if (file_exists(".." . $caminhoImagens . $_FILES["arquivo"]["name"])) {
                move_uploaded_file($_FILES["arquivo"]["tmp_name"], ".." . $caminhoImagens . $geraNome); //renomeia
                $itemColecao->setImagem($geraNome);
            } else {
                move_uploaded_file($_FILES["arquivo"]["tmp_name"], ".." . $caminhoImagens . $geraNome); //renomeia
                $itemColecao->setImagem($geraNome);
            }

            $Image = new Image();

            list($width, $height, $type, $attr) = getimagesize(".." . $caminhoImagens . $geraNome);

            $Image->resize(".." . $caminhoImagens . $geraNome, ($width/2), ($height/2));

            unlink($caminhoServer . $caminhoImagens . $geraNome);

            if($_FILES["arquivo"]["type"] == "image/png")
            {
                $tipo = 1;
            }
            if(($_FILES["arquivo"]["type"] == "image/jpg") || ($_FILES["arquivo"]["type"] == "image/jpeg"))
            {
                $tipo = 2;
            }
            if($_FILES["arquivo"]["type"] == "image/gif")
            {
                $tipo = 3;
            }

            $Image->saveImage($caminhoServer . $caminhoImagens . $geraNome, $tipo);
        }
    } else {
        $_SESSION['mensagemModal'] = 'Imagem Inválida!';
        echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
    }
} else {
    if($itemColecao->getIdItemColecao()==0){
        $itemColecao->setImagem("noimg.png");
    }else
     {
         $itemColecao->setImagem($itemColecaoDAO->buscaFoto($itemColecao->getIdItemColecao()));
     }
}

//http://localhost/ForumCOLECAOmania%20-%20Copia/ fazer index.php redirecionar p principal
//incluir ../pages/ + caminho inicial e verificar se é noimg.jpg se for n apagar função/pages/caminho
//define-constante fazer um arquivo config como os caminhos do servidor e aplicação para usar salvar imagem como nome
// unlink($itemColecao->getImagem());
//echo $_FILES["arquivo"]["name"];
$verif =1;
if( $itemColecao->getIdItemColecao() == 0)
{
    $verif = 0;
}
if ($itemColecaoDAO->salvar($itemColecao)) {
    if ($seguidorDAO->countSeguidor() > 0 && $verif == 0) {
        
        require_once '../class/NotificacaoDAO.php';
        $notificacao = new Notificacao();
        $notificacaoDAO = new NotificacaoDAO();
        
        $notificacao->setIdUsuario($_SESSION["codigo"]); //usuario que adicionou novo item 
        
        $seguidores = array();
        $seguidores = $seguidorDAO->listarQuemMeSegue();
        
        $notificacao->setObs("adicionou um novo item");
        $notificacao->setIdItemNotf($itemColecao->getIdColecao());
        
        //lista quem me segue e add a notificação para cada um
        foreach ($seguidores as $seguidor) {
            $notificacao->setIdNotf(0);
            $notificacao->setIdUsuNotf($seguidor->getIdUsuario());
            $notificacaoDAO->salvar($notificacao);
        }
    }
    $_SESSION['mensagemModal'] = 'Salvo com sucesso!';
    echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
} else {
    $_SESSION['mensagemModal'] = 'Erro ao salvar.';
    echo "<script> location.href='../pages/menu.php?pagina=itens&cd={$_POST["cd"]}';</script>";
}
?>