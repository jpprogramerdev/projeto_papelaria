<?php  
require_once __DIR__.'../../classes/DAO/daoProduto.php';

if(isset($_POST["idDelete"])){
    extract($_POST);
    echo "$idDelete";
    $daoProduto = new DaoProduto();

    $produto = $daoProduto->findById($idDelete);

    foreach($produto as $chave => $valor){
        unlink(__DIR__.'/../view/imgs/'.$valor->prod_url);
        echo $valor->prod_url;
    }

    

    $daoProduto->deleteById($idDelete);
    header("Location: /Projeto_papelaria/area-restrita/view/adm/gerenciarProdutosPage.php ");
}



?>