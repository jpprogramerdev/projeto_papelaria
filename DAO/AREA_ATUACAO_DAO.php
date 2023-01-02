<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/classes/AREA_ATUACAO.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/2022_02/projeto/DAO/CRUD.php");

class AREA_ATUACAO_DAO extends CRUD {
    
	//Carrega um elemento pela chave primária
	public function findById($aat_id){
		$sql = 'SELECT * FROM AREAS_ATUACAO WHERE aat_id = :aat_id';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":aat_id",$aat_id);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		$objeto = new AREA_ATUACAO();
		foreach($arr as $chave => $valor){
		    $objeto->setAat_id($valor->aat_id);
            $objeto->setAat_descricao($valor->aat_descricao);
		}
		return $objeto;
	}

	//Lista todos os elementos da tabela
	public function findAll(){
		$sql = 'SELECT * FROM AREAS_ATUACAO';
		$stmt = DB::prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		// Montando o array de objetos
        foreach($arr as $chave => $valor){
            $objeto = new area_atuacao();
            $objeto->setAat_id($valor->aat_id);
            $objeto->setAat_descricao($valor->aat_descricao);
            $arrAreas[] = $objeto;
        }
        return $arrAreas;
		
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function findAllOrdered($coluna){
		$sql = 'SELECT * FROM AREAS_ATUACAO ORDER BY :coluna';
		$stmt = DB::prepare($sql);
		$stmt->bindValue(":coluna",$coluna);
		$stmt->execute();
		$arr = $stmt->fetchAll();
		// Montando o array de objetos
        foreach($arr as $chave => $valor){
            $objeto = new area_atuacao();
            $objeto->setAat_id($valor->aat_id);
            $objeto->setAat_descricao($valor->aat_descricao);
            $arrAreas[] = $objeto;
        }
        return $arrAreas;
	}

}
?>