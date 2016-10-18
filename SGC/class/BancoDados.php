<?php
	class BancoDados
	{
		private $conexao;

		function __construct(){
			try{
				$this->conexao = new mysqli("localhost", "root", "", "colecao_mania");
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}				
		}	
		
		function getConexao(){
			return $this->conexao;
		}		
	}
?>  