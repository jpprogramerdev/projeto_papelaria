<!DOCTYPE html>

<?php
    session_start();

    require_once __DIR__.'../../../classes/DAO/daoProduto.php';
    require_once __DIR__.'../../../classes/Pojo/pojoProduto.php';

    if(!isset($_SESSION["pes_id"])){

        //Verificar se é administrador
        if($_SESSION["pes_tip_id"] == 2){
            header("Location: /Projeto_Papelaria/ ");
            
        }

    }

    if(!isset($_POST["idEdit"])){

        header("Location: /Projeto_papelaria/area-restrita/view/adm/admHomePage.php ");
    }

    extract($_POST);

    $obj_produtoDao = new DaoProduto();

    $obj_produto = new PojoProduto();

    $selected_produto = $obj_produtoDao->findById($idEdit);


    foreach($selected_produto as $chave => $valor){
        $obj_produto->setProd_id($valor->prod_id);
        $obj_produto->setProd_nome($valor->prod_nome);
        $obj_produto->setProd_desc($valor->prod_desc);
        $obj_produto->setProd_preco($valor->prod_preco);
        $obj_produto->setProd_url($valor->prod_url);


    }

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>E-Papelaria - Atualizar Produto</title>
</head>
<body>
    <div class="content">   
        </div>
        <div class="formContent">
            <img src="imgs/logomarca.png">
            <div class="container">
                <form method="POST" action="./../../controller/atualizarProduto.php" enctype="multipart/form-data">


                    <div class="mb-3" style="display: none;">
                        
                        <?php  
                            echo "<input type='text' value=".$obj_produto->getProd_id()." placeholder='Nome' class='form-control' id='produtoId' name='produtoId' required> "
                        ?>
                                              
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <?php  
                            echo "<input type='text' value='".$obj_produto->getProd_nome()."' placeholder='Nome' class='form-control' id='nome' name='nome' required> "
                        ?>
                                              
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Preço em R$:</label>

                        <?php
                            echo " <input type='number' value='".$obj_produto->getProd_preco()."' placeholder='Preço' class='form-control' id='preco' name='preco' required> "
                        ?>
          
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"><?php  
                                echo htmlspecialchars($obj_produto->getProd_desc())
                            ?>

                        </textarea>
                    </div>  

                    <div class="form-group mb-3">
                        <label for="exampleFormControlFile1">Cadastrar Imagem do Produto</label>
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
                <div class="register">
                    <a href="./gerenciarProdutosPage.php">Volar para a página de produtos</a>
                </div>
                
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>