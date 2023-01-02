<?php

require_once  __DIR__.'/../database/conexao.php';

abstract class CRUD extends conexao{
    abstract public function findById($id);

    abstract public function findAll();

    abstract public function findAllOrdered($coluna);

}




?>