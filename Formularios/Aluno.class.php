<?php
	class Aluno{
		private $nome;
		private $dataNasc;
		private $foto;

		public function _construct($nome, $dataNasc, $foto){
			$this->setNome($nome);
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getDataNasc(){
			return $this->DataNasc;
		}

		public function setDataNasc($DataNasc){
			$data = explode('/', $DataNasc);	
			$this->DataNasc = "$data[2]-$data[1]-$data[0]";
		}

		public function getFoto(){
			return $this->foto;
		}

		public function setFoto($foto){
			$this->foto = $foto;
		}
	}
?>
