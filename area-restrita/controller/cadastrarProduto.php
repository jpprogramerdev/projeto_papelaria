<?php   
    require_once __DIR__.'../../classes/Pojo/pojoProduto.php';
    require_once __DIR__.'../../classes/DAO/daoProduto.php';


    if(isset($_POST["nome"]) && isset($_POST["desc"]) && isset($_POST["preco"])){


        $produto = new PojoProduto();
        $daoProduto = new DaoProduto();

        extract($_POST);

        $imagem = $_FILES["imagem"];
        $ext = strtolower(substr($_FILES['imagem']['name'],-4));
        $new_name = date("Y.m.d-H.i.s") . $nome . $ext;
        $dir = __DIR__.'../../view/imgs/';


        $produto->setProd_nome($nome);
        $produto->setProd_desc($desc);
        $produto->setProd_preco($preco);
        $produto->setProd_url($new_name);

        $daoProduto->InserirProduto($produto);

        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name);

            
            

        header("Location: /Projeto_papelaria/area-restrita/view/adm/gerenciarProdutosPage.php ");
        
    }else{
        header("Location: /Projeto_papelaria/area-restrita/view/adm/cadastrarProdutoPage.php ");
    }
?>