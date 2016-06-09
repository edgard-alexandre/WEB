<?php

	include_once 'aluno.class.php';
	include_once 'conexao.class.php';

	//recebe os dados do formulário
	$dadosOK = true;
	$arquivo = $_FILES['txtFoto'];
	if($arquivo['error'] != 0){
		$dadosOK = false;
		echo "Erro no upload do arquivo! <br>";	
	}else if($arquivo['size'] > 100000){
		echo "Tamanho do arquivo incorreto! <br>";
		$dadosOK = false;
	}else{
		if(($arq['type']!="image/gif") && ($arq['type']!="image/jpeg") && ($arq['type']!="image/jpg") && ($arq['type']!="image/png") && ($arq['type']!="image/bmp")){
			echo "Tipo de arquivo não permitido <br>";
			$dadosOK = false;				
		}else{
			$file_src = '../tmp'.$_FILES['txtFoto']['name'];
			if(!move_uploaded_files($_FILES['txFoto']['tmp_name'], $file_src)){
				echo "Erro ao mover o arquivo <br>";
				$dadosOK = false;			
			}		
		}
		if($dadosOK){
			$mysqlimg = addslashes(fread(fopen($files_src, "rb"), $arquivo['size']));
			$aluno = new Aluno($_POST["txtNome"], $_POST["txtData"], $mysqlimg);
			$mySQL = new MySQL;

			try{
				$MySQL -> inserirAluno($aluno -> getNome(), $aluno -> getDataNasc(), $aluno -> getFoto());
				echo "Dados inseridos com sucesso <br>";
			}catch(Exception $e){
				echo "Erro ao inserir: ", $e -> getMessage() . "<br>";			
			}
		}
	}
?>

