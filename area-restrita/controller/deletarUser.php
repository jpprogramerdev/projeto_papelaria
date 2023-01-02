<?php

    require_once __DIR__.'../../classes/DAO/daoUser.php';


    if(isset($_POST["idDelete"])){
        extract($_POST);
        echo "$idDelete";
        $daoUser = new DaoUser();

        $daoUser->deleteById($idDelete);
        header("Location: /Projeto_papelaria/ ");
    }


?>