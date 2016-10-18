<?php

require_once 'Usuario.php';
require_once 'ListaDesejos.php';
require_once 'ListaDesejosDAO.php';
require_once 'ACrudDAO.php';

class UsuarioDAO extends ACrudDAO {

    function salvar($usuario) {
        $situacao = TRUE;
        try {
            $this->conectar();
            if ($usuario->getIdUsuario() == 0) {
                $usuario->setStatus(1);
                $query = "insert into tbusuario"
                        . " (idUsuario, nome, email, telefone, senha, dataNasc, numero, complemento, cep,"
                        . " imagem, tipo, cidade, bairro, rua, idIdioma,estado,idPais,status) values ('{$usuario->getIdUsuario()}',"
                        . "'{$usuario->getNome()}','{$usuario->getEmail()}','{$usuario->getTelefone()}',"
                        . "'{$usuario->getSenha()}','{$usuario->getDataNasc()}','{$usuario->getNumero()}',"
                        . "'{$usuario->getComplemento()}','{$usuario->getCEP()}','{$usuario->getImagem()}',"
                        . "'{$usuario->getTipo()}','{$usuario->getCidade()}','{$usuario->getBairro()}',"
                        . "'{$usuario->getRua()}','{$usuario->getIdIdioma()}','{$usuario->getEstado()}','{$usuario->getIdPais()}','{$usuario->getStatus()}')";
                $this->conexao->query($query);
                $codigo = $this->conexao->insert_id;
                $usuario->setIdUsuario($codigo);

                //CRIA LISTA DE DESEJOS DO USUARIO//
                $listaDesejos = new ListaDesejos();
                $listaDesejosDAO = new ListaDesejosDAO();

                $listaDesejos->setIdUsuDono($codigo);
                $listaDesejosDAO->salvar($listaDesejos);
            } else {
                $query = "update tbusuario set nome = '{$usuario->getNome()}', email = '{$usuario->getEmail()}', telefone = '{$usuario->getTelefone()}',senha = '{$usuario->getSenha()}',dataNasc = '{$usuario->getDataNasc()}', numero = '{$usuario->getNumero()}', complemento = '{$usuario->getComplemento()}', cep = '{$usuario->getCEP()}', imagem = '{$usuario->getImagem()}',tipo = '{$usuario->getTipo()}',cidade = '{$usuario->getCidade()}', bairro = '{$usuario->getBairro()}', rua = '{$usuario->getRua()}',idIdioma = '{$usuario->getIdIdioma()}',estado ='{$usuario->getEstado()}',idPais= '{$usuario->getIdPais()}'  where idUsuario = {$usuario->getIdUsuario()}";
               
                $this->conexao->query($query);
            }
            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function excluir($usuario) {
        $situacao = TRUE;
        try {
            $this->conectar();
            //$query = "delete from tbusuario where idUsuario = {$usuario->getIdUsuario()}";
            $query = "update tbusuario set status = 0  where idUsuario = {$usuario->getIdUsuario()}";
            $this->conexao->query($query);
            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function listar() {
        $usuarios = array();
        try {
            $this->conectar();
            $query = "select * from tbusuario where status=1 limit 20";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($registro['idUsuario']);
                $usuario->setNome($registro['nome']);
                $usuario->setEmail($registro['email']);
                $usuario->setTelefone($registro['telefone']);
                $usuario->setSenha($registro['senha']);
                $usuario->setDataNasc($registro['dataNasc']);
                $usuario->setNumero($registro['numero']);
                $usuario->setComplemento($registro['complemento']);
                $usuario->setCEP($registro['cep']);
                $usuario->setImagem($registro['imagem']);
                $usuario->setTipo($registro['tipo']);
                $usuario->setCidade($registro['cidade']);
                $usuario->setBairro($registro['bairro']);
                $usuario->setRua($registro['rua']);
                $usuario->setIdIdioma($registro['idIdioma']);
                $usuario->setEstado($registro['estado']);
                $usuario->setIdPais($registro['idPais']);
                $usuario->setStatus($registro['status']);
                array_push($usuarios, $usuario);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuarios;
    }

    function buscarPorId($codigo) {
        $usuario = new Usuario();
        try {
            $this->conectar();
            $query = "select * from tbusuario where idUsuario = {$codigo}";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $usuario = new Usuario();
            $usuario->setIdUsuario($registro['idUsuario']);
            $usuario->setNome($registro['nome']);
            $usuario->setEmail($registro['email']);
            $usuario->setTelefone($registro['telefone']);
            $usuario->setSenha($registro['senha']);
            $usuario->setDataNasc($registro['dataNasc']);
            $usuario->setNumero($registro['numero']);
            $usuario->setComplemento($registro['complemento']);
            $usuario->setCEP($registro['cep']);
            $usuario->setImagem($registro['imagem']);
            $usuario->setTipo($registro['tipo']);
            $usuario->setCidade($registro['cidade']);
            $usuario->setBairro($registro['bairro']);
            $usuario->setRua($registro['rua']);
            $usuario->setIdIdioma($registro['idIdioma']);
            $usuario->setEstado($registro['estado']);
            $usuario->setIdPais($registro['idPais']);
            $usuario->setStatus($registro['status']);
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $usuario;
    }

    function buscaIdPorEmail($email) {

        try {
            $this->conectar();
            $query = "select idUsuario from tbusuario where email = '{$email}'";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $cod = $registro['idUsuario'];
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $cod;
    }

    function validaEmail($email) {
        try {
            $this->conectar();
            $query = "select * from tbusuario where email = '{$email}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }

    function validar($email, $senha) {
        try {
            $this->conectar();
            $query = "select * from tbusuario where email = '{$email}' and senha = '{$senha}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }

    function buscaTipo($cod) {

        try {
            $this->conectar();
            $query = "select tipo from tbusuario where idUsuario = '{$cod}'";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $cod = $registro['tipo'];
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $cod;
    }

    function validaEmailId($email, $cod) {
        try {
            $this->conectar();
            $query = "select * from tbusuario where email = '{$email}' and idUsuario = '{$cod}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }

    function buscaFoto($cod) {

        try {
            $this->conectar();
            $query = "select imagem from tbusuario where idUsuario = '{$cod}'";
            $resultado = $this->conexao->query($query);
            $this->desconectar();

            $registro = mysqli_fetch_assoc($resultado);
            $foto = $registro['imagem'];
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }

        return $foto;
    }

    function validaSenha($cod, $senha) {
        try {
            $this->conectar();
            $query = "select * from tbusuario where idUsuario = '{$cod}' and senha = '{$senha}'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }

    function alterarSenha($usuario) {
        try {
            $this->conectar();
            $query = "update tbusuario set senha  = '{$usuario->getSenha()}' where idUsuario = {$usuario->getIdUsuario()}";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 0 ? TRUE : FALSE);
        return $situacao;
    }

    function mudaTipo($idUsuario, $tipo) {
        $situacao = TRUE;
        try {
            $this->conectar();

            $query = "update tbusuario set tipo = '{$tipo}' where idUsuario = '{$idUsuario}'";
            $this->conexao->query($query);

            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }
    
    function mudaStatus($idUsuario, $status) {
        $situacao = TRUE;
        try {
            $this->conectar();

            $query = "update tbusuario set status = '{$status}' where idUsuario = '{$idUsuario}'";
            $this->conexao->query($query);

            $this->desconectar();
        } catch (Exception $ex) {
            $situacao = FALSE;
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $situacao;
    }

    function adminCount() {
        try {
            $this->conectar();
            $query = "select * from tbusuario where tipo = '1'";
            $resultado = $this->conexao->query($query);
            $quantidade = $this->conexao->affected_rows;
            $this->desconectar();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        $situacao = ($quantidade > 1 ? TRUE : FALSE);
        return $situacao;
    }

    function listarNomeUsu($nome) {
        $usuarios = array();
        try {
            $this->conectar();
            $query = "select * from tbusuario where idUsuario not like '{$_SESSION["codigo"]}' and nome like '{$nome}%' and status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($registro['idUsuario']);
                $usuario->setNome($registro['nome']);
                $usuario->setEmail($registro['email']);
                $usuario->setTelefone($registro['telefone']);
                $usuario->setSenha($registro['senha']);
                $usuario->setDataNasc($registro['dataNasc']);
                $usuario->setNumero($registro['numero']);
                $usuario->setComplemento($registro['complemento']);
                $usuario->setCEP($registro['cep']);
                $usuario->setImagem($registro['imagem']);
                $usuario->setTipo($registro['tipo']);
                $usuario->setCidade($registro['cidade']);
                $usuario->setBairro($registro['bairro']);
                $usuario->setRua($registro['rua']);
                $usuario->setIdIdioma($registro['idIdioma']);
                $usuario->setEstado($registro['estado']);
                $usuario->setIdPais($registro['idPais']);
                $usuario->setStatus($registro['status']);
                array_push($usuarios, $usuario);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuarios;
    }

    function listarCidadeUsu($cidade) {
        $usuarios = array();
        try {
            $this->conectar();
            $query = "select * from tbusuario where idUsuario not like '{$_SESSION["codigo"]}' and cidade like '{$cidade}%' and status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($registro['idUsuario']);
                $usuario->setNome($registro['nome']);
                $usuario->setEmail($registro['email']);
                $usuario->setTelefone($registro['telefone']);
                $usuario->setSenha($registro['senha']);
                $usuario->setDataNasc($registro['dataNasc']);
                $usuario->setNumero($registro['numero']);
                $usuario->setComplemento($registro['complemento']);
                $usuario->setCEP($registro['cep']);
                $usuario->setImagem($registro['imagem']);
                $usuario->setTipo($registro['tipo']);
                $usuario->setCidade($registro['cidade']);
                $usuario->setBairro($registro['bairro']);
                $usuario->setRua($registro['rua']);
                $usuario->setIdIdioma($registro['idIdioma']);
                $usuario->setEstado($registro['estado']);
                $usuario->setIdPais($registro['idPais']);
                 $usuario->setStatus($registro['status']);
                array_push($usuarios, $usuario);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuarios;
    }

    function listarColecaoUsu($idTipo) {
        $usuarios = array();
        try {
            $this->conectar();
            $query = "select idUsuario,U.nome,email,telefone,senha,dataNasc,numero,complemento,cep,imagem,tipo,cidade,bairro,rua,idIdioma,estado,idPais,status"
                    . " from (tbusuario as U) inner join (tbcolecao as C) on U.idUsuario = C.idUsuDono"
                    . " where U.idUsuario not like {$_SESSION["codigo"]} and C.idTipoColecao = {$idTipo} and status=1";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($registro['idUsuario']);
                $usuario->setNome($registro['nome']);
                $usuario->setEmail($registro['email']);
                $usuario->setTelefone($registro['telefone']);
                $usuario->setSenha($registro['senha']);
                $usuario->setDataNasc($registro['dataNasc']);
                $usuario->setNumero($registro['numero']);
                $usuario->setComplemento($registro['complemento']);
                $usuario->setCEP($registro['cep']);
                $usuario->setImagem($registro['imagem']);
                $usuario->setTipo($registro['tipo']);
                $usuario->setCidade($registro['cidade']);
                $usuario->setBairro($registro['bairro']);
                $usuario->setRua($registro['rua']);
                $usuario->setIdIdioma($registro['idIdioma']);
                $usuario->setEstado($registro['estado']);
                $usuario->setIdPais($registro['idPais']);
                $usuario->setStatus($registro['status']);
                array_push($usuarios, $usuario);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuarios;
    }

    //SELECT * FROM tbusuario as U inner join tbcolecao as C on U.idUsuario = C.idUsuDono where cidade = 'Timóteo' or idTipoColecao in (SELECT idTipoColecao FROM tbcolecao WHERE idUsuDono = 20)

    function listarSugestoes() {
        $usuarios = array();
        try {
            $this->conectar();
            $query = "select distinct(U.idUsuario),U.nome,email,telefone,senha,dataNasc,numero,complemento,cep,imagem,tipo,cidade,bairro,rua,idIdioma,estado,idPais,U.status"
                    . " from (tbusuario as U) inner join (tbcolecao as C) on U.idUsuario = C.idUsuDono"
                    . " where U.idUsuario not like {$_SESSION["codigo"]} and U.status=1 and"
                    . " (C.idTipoColecao in (SELECT idTipoColecao FROM tbcolecao WHERE idUsuDono = {$_SESSION["codigo"]}) or cidade = (SELECT cidade FROM tbusuario WHERE idUsuDono = {$_SESSION["codigo"]}))";
            $resultado = $this->conexao->query($query);
            $this->desconectar();
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($registro['idUsuario']);
                $usuario->setNome($registro['nome']);
                $usuario->setEmail($registro['email']);
                $usuario->setTelefone($registro['telefone']);
                $usuario->setSenha($registro['senha']);
                $usuario->setDataNasc($registro['dataNasc']);
                $usuario->setNumero($registro['numero']);
                $usuario->setComplemento($registro['complemento']);
                $usuario->setCEP($registro['cep']);
                $usuario->setImagem($registro['imagem']);
                $usuario->setTipo($registro['tipo']);
                $usuario->setCidade($registro['cidade']);
                $usuario->setBairro($registro['bairro']);
                $usuario->setRua($registro['rua']);
                $usuario->setIdIdioma($registro['idIdioma']);
                $usuario->setEstado($registro['estado']);
                $usuario->setIdPais($registro['idPais']);
                $usuario->setStatus($registro['status']);
                array_push($usuarios, $usuario);
            }
            $resultado->close();
        } catch (Exception $ex) {
            echo $ex->getFile() . ' : ' . $ex->getLine() . ' : ' . $ex->getMessage();
        }
        return $usuarios;
    }

}

?> 