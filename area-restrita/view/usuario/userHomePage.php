<!DOCTYPE html>

<?php 
    session_start();


    if(!isset($_SESSION["pes_id"])){
        header("Location: /Projeto_papelaria/ ");
    }

    if(isset($_GET["loggout"])){
        header("Location: /Projeto_Papelaria/area-restrita/controller/logout.php");
    }
        
    

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Papelaria - Landing Page</title>
</head>
<body>
    <div class="menu">
        <div class="menuTitle">
            <div>E-Papelaria</div>       
        </div>
        <div class="menuList">
            <a class="listItem">Home</a>
            <a class="listItem" href="viewProduto.php">Loja</a>
            <a type="button" href="userHomePage.php?loggout=true" class="listItem">Sair</a>
        </div>
    </div>
    <div class="content">
        <div class="textBold">
            Bem vindo Usuário
        </div>
        <div>
            <img class="homeImg" src="imgs/homeImage.jpg">
        </div>
        <div class="descripText">
            A nossa papelaria oferece os melhores materias de escritório e escolares do Brasil, itens de ponta que ajudam a aumentar a
            eficiência e produtividade de suas tarefas

        </div>

        <div class="textBold">
            Os nossos valores são:
        </div>

        <div class="cards">
            <div class="card1">
                <div><img class="cardIcon" src="imgs/shaking-hands-svgrepo-com 1.svg"></div>
                <div class="cardTitle">Confiança</div>
            </div>
            <div class="card2">
                <div><img class="cardIcon" src="imgs/idea-svgrepo-com 1.svg"></div>
                <div class="cardTitle">Inovação</div>
            </div>
            <div class="card3">
                <div><img class="cardIcon" src="imgs/Group.svg"></div>
                <div class="cardTitle">Qualidade</div>
            </div>
        </div>
    </div>
    <div class="footer">
        Copyright © 2022 MDJL - Todos os direitos reservados
    </div>
</body>
</html>