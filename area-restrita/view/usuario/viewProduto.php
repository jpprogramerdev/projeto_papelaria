<!DOCTYPE html>

<?php
    require_once __DIR__.'../../../classes/DAO/daoProduto.php';

    session_start();


    if(!isset($_SESSION["pes_id"])){
        header("Location: /Projeto_papelaria/ ");
    }

    if(isset($_GET["loggoutAdm"])){
        header("Location: /Projeto_Papelaria/area-restrita/controller/logout.php");
    }
        
    $obj_produto = new DaoProduto();
    $arr = $obj_produto->findAll();

?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- Importações pra fazer o crud -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/userProdStyle.css">
    <title>E-Papelaria - Produtos</title>
</head>
<body>
    <div class="menu">
        <div class="menuTitle">
            <div>E-Papelaria</div>       
        </div>
        <div class="menuList">
            <a class="listItem" href="userHomePage.php">Home</a>
            <a class="listItem" href="#">Loja</a>
            <a class="listItem" type="button" href="userHomePage.php?loggout=true" >Sair</a>
        </div>
    </div>
    <div class="content">
        <div class="container_productsList" >            
            <?php  
            
                    foreach($arr as $chave => $valor){
                            echo "<div class='card'>";

                                echo "<img class='card-img-top' src='./../imgs/$valor->prod_url' alt='Card image cap' cap>";
                                echo "   <div class='card-body'>
                                            <h5 class='card-title'>$valor->prod_nome</h5>
                                            <p class='card-text'>$valor->prod_desc</p>
                                            
                                        </div>";
                                    
                                echo " <p class = 'item-price'>R$ $valor->prod_preco</p>";
                            echo "</div>";
                    }
                        
            ?>
        </div>
    </div>
    <div class="footer">
        Copyright © 2022 MDJL - Todos os direitos reservados
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </script>
</body>
</html>