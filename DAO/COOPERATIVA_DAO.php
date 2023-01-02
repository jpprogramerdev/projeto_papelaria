<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/classes/COOPERATIVA.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/DAO/DB.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/DAO/TIPO_COOPERATIVA_DAO.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/DAO/AREA_ATUACAO_DAO.php");
	   
class COOPERATIVA_DAO extends DB {

	//Carrega um elemento pela chave primária
	public function findById($coo_id){
		$sql = 'SELECT * FROM COOPERATIVAS WHERE coo_id = :coo_id';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":coo_id",$coo_id);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		$objeto = new COOPERATIVA();
		$objeto_tipo_dao = new TIPO_COOPERATIVA_DAO();
		$objeto_area_dao = new AREA_ATUACAO_DAO();
		foreach($arr as $chave => $valor){
		    $objeto->setCoo_id($valor->coo_id);
            $objeto->setCoo_nome($valor->coo_nome);
            $objeto->setCoo_nome_cadastrante($valor->coo_nome_cadastrante);
            $objeto->setCoo_mail_contato($valor->coo_mail_contato);
            $objeto->setCoo_dt_cadastro($valor->coo_dt_cadastro);
            $objeto->setCoo_tpc_id($objeto_tipo_dao->findById($valor->coo_tpc_id));
            $objeto->setCoo_logradouro($valor->coo_logradouro);
            $objeto->setCoo_bairro($valor->coo_bairro);
            $objeto->setCoo_cidade($valor->coo_cidade);
            $objeto->setCoo_estado($valor->coo_estado);
            $objeto->setCoo_cep($valor->coo_cep);
            $objeto->setCoo_aat_id($objeto_area_dao->findById($valor->coo_aat_id));
		}
		return $objeto;
	}

	//Lista todos os elementos da tabela
	public function findAll(){
		$sql = 'SELECT * FROM COOPERATIVAS';
		$stmt = DB::prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		foreach($arr as $chave => $valor){
		    $objeto = new COOPERATIVA();
		    $objeto_tipo_dao = new TIPO_COOPERATIVA_DAO();
		    $objeto_area_dao = new AREA_ATUACAO_DAO();
		    $objeto->setCoo_id($valor->coo_id);
            $objeto->setCoo_nome($valor->coo_nome);
            $objeto->setCoo_nome_cadastrante($valor->coo_nome_cadastrante);
            $objeto->setCoo_mail_contato($valor->coo_mail_contato);
            $objeto->setCoo_dt_cadastro($valor->coo_dt_cadastro);
            $objeto->setCoo_tpc_id($objeto_tipo_dao->findById($valor->coo_tpc_id));
            $objeto->setCoo_logradouro($valor->coo_logradouro);
            $objeto->setCoo_bairro($valor->coo_bairro);
            $objeto->setCoo_cidade($valor->coo_cidade);
            $objeto->setCoo_estado($valor->coo_estado);
            $objeto->setCoo_cep($valor->coo_cep);
            $objeto->setCoo_aat_id($objeto_area_dao->findById($valor->coo_aat_id));
            $arrCooperativas[] = $objeto;
		}
		return $arrCooperativas;
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function findAllOrdered($coluna){
		$sql = 'SELECT * FROM COOPERATIVAS ORDER BY :coluna';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":coluna",$coluna);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		foreach($arr as $chave => $valor){
		    $objeto = new COOPERATIVA();
		    $objeto_tipo_dao = new TIPO_COOPERATIVA_DAO();
		    $objeto_area_dao = new AREA_ATUACAO_DAO();
		    $objeto->setCoo_id($valor->coo_id);
            $objeto->setCoo_nome($valor->coo_nome);
            $objeto->setCoo_nome_cadastrante($valor->coo_nome_cadastrante);
            $objeto->setCoo_mail_contato($valor->coo_mail_contato);
            $objeto->setCoo_dt_cadastro($valor->coo_dt_cadastro);
            $objeto->setCoo_tpc_id($objeto_tipo_dao->findById($valor->coo_tpc_id));
            $objeto->setCoo_logradouro($valor->coo_logradouro);
            $objeto->setCoo_bairro($valor->coo_bairro);
            $objeto->setCoo_cidade($valor->coo_cidade);
            $objeto->setCoo_estado($valor->coo_estado);
            $objeto->setCoo_cep($valor->coo_cep);
            $objeto->setCoo_aat_id($objeto_area_dao->findById($valor->coo_aat_id));
            $arrCooperativas[] = $objeto;
		}
		return $arrCooperativas;
	}
	
	//Apaga uma cooperativa do banco de dados
	public function deletar($coo_id){
		$sql = 'DELETE FROM COOPERATIVAS WHERE coo_id = :coo_id';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":coo_id",$coo_id);
		if($stmt->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($cooperativa){
		$sql = "INSERT INTO `COOPERATIVAS`(coo_nome, coo_nome_cadastrante, coo_mail_contato, coo_dt_cadastro, :coo_tpc_id, coo_logradouro, coo_bairro, coo_cidade, coo_estado, coo_cep, coo_aat_id) VALUES (':coo_nome',':coo_nome_cadastrante',':coo_mail_contato',CURRENT_DATE,:coo_tpc_id,':coo_logradouro',':coo_bairro',':coo_cidade',':coo_estado',':coo_cep',:coo_aat_id)";
		$stmt = DB::prepare($sql);
		$stmt->bindValue(':coo_nome',$cooperativa->getCoo_nome()); 
		$stmt->bindValue(':coo_nome_cadastrante',$cooperativa->getCoo_nome_cadastrante()); 
		$stmt->bindValue(':coo_mail_contato',$cooperativa->getCoo_mail_contato()); 
		$stmt->bindValue(':coo_tpc_id',$cooperativa->getIdTipo()); 
		$stmt->bindValue(':coo_logradouro',$cooperativa->getCoo_logradouro()); 
		$stmt->bindValue(':coo_bairro',$cooperativa->getCoo_bairro()); 
		$stmt->bindValue(':coo_cidade',$cooperativa->getCoo_cidade()); 
		$stmt->bindValue(':coo_estado',$cooperativa->getCoo_estado()); 
		$stmt->bindValue(':coo_cep',$cooperativa->getCoo_cep()); 
		$stmt->bindValue(':coo_aat_id',$cooperativa->getIdArea()); 
		/*if($stmt->execute())
			return true;
		else
			return false;*/
		try{
		    $stmt->execute();
		    echo "Sucesso ao inserir cooperativa";
		} catch (Exception $e){
		    echo "Erro ao inserir cooperativa: " . $e->getMessage();
		}
		
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($cooperativa){
		$sql = 'UPDATE COOPERATIVAS SET coo_id = :coo_id, coo_nome = :coo_nome, coo_nome_cadastrante = :coo_nome_cadastrante, coo_mail_contato = :coo_mail_contato, coo_dt_cadastro = :coo_dt_cadastro, coo_tpc_id = :coo_tpc_id, coo_logradouro = :coo_logradouro, coo_bairro = :coo_bairro, coo_cidade = :coo_cidade, coo_estado = :coo_estado, coo_cep = :coo_cep, coo_aat_id = :coo_aat_id WHERE coo_id = :coo_id';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(':coo_id',$cooperativa->getCoo_id()); 
		$stmt->bindValue(':coo_nome',$cooperativa->getCoo_nome()); 
		$stmt->bindValue(':coo_nome_cadastrante',$cooperativa->getCoo_nome_cadastrante()); 
		$stmt->bindValue(':coo_mail_contato',$cooperativa->getCoo_mail_contato()); 
		$stmt->bindValue(':coo_dt_cadastro',$cooperativa->getCoo_dt_cadastro()); 
		$stmt->bindValue(':coo_tpc_id',$cooperativa->getCoo_tpc_id()); 
		$stmt->bindValue(':coo_logradouro',$cooperativa->getCoo_logradouro()); 
		$stmt->bindValue(':coo_bairro',$cooperativa->getCoo_bairro()); 
		$stmt->bindValue(':coo_cidade',$cooperativa->getCoo_cidade()); 
		$stmt->bindValue(':coo_estado',$cooperativa->getCoo_estado()); 
		$stmt->bindValue(':coo_cep',$cooperativa->getCoo_cep()); 
		$stmt->bindValue(':coo_aat_id',$cooperativa->getCoo_aat_id()); 
		if($stmt->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		$sql = 'DELETE FROM COOPERATIVAS';
		$stmt = DB::prepare($sql);
		if($stmt->execute())
			return true;
		else
			return false;
	}
}
?>