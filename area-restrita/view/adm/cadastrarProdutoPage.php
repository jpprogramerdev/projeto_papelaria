<!DOCTYPE html>

<?php
    session_start();

    if(!isset($_SESSION["pes_id"])){

        //Verificar se é administrador
        if($_SESSION["pes_tip_id"] == 2){
            header("Location: /Projeto_Papelaria/ ");
            
        }

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
    <title>E-Papelaria - Cadastro produto</title>
</head>
<body>
    <div class="content">   
        </div>
        <div class="formContent">
            <img src="imgs/logomarca.png">
            <div class="container">
                <form method="POST" action="./../../controller/cadastrarProduto.php" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" placeholder="Nome" class="form-control" id="nome" name="nome" required>                       
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Preço em R$:</label>
                        <input type="number" placeholder="Preço" class="form-control" id="preco" name="preco" required>                       
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
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