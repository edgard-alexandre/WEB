<?php
	class MySQL{
		var $host="localhost";
		var $user="root";
		var $password="root";
		var $database="wasd";
		var $link;
		var $query;
		var $result;
		
		function connect(){
			$this->link = mysql_connect($this->host,$this->user,$this->password);
			if(!$this->link){
				echo"<b>Falha na conexão!!!<br></b>";
				echo"Erro: ".mysql_error();
				die();
			}else if(!mysql_select_db($this->database,$this->link)){
				 echo"<b>O BD não pode ser aberto!!!<br></b>";
				 echo"Erro: ".mysql_error();
				 die();
			 }
		}
		
		function disconnect(){
			return mysql_close($this->link);
		}
		
		function executeQuery($query){
			$this->connect();
			$this->query = $query;
			if($this->result=mysql_query($this->query)){
				$this->disconnect();
				return $this->result;
			}else{
				echo "<b>Ocorreu um erro</b><br>";
				echo "Erro: ".mysql_error();
				die();
				disconnect();
			 }
		}
		
		function inserirAluno($nome,$email,$dataNasc){
			$sqlAluno = "insert into aluno (nome,email,dataNasc) VALUES('$nome',$email,'$dataNasc')";
			$this->executeQuery($sqlAluno);
		}
	}
?>
