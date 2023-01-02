<!DOCTYPE html>

<?php
    session_start();

    if(isset($_SESSION["pes_id"])){

        //Verificar se é administrador
        if($_SESSION["pes_tip_id"] == 2){
            header("Location: /Projeto_Papelaria/area-restrita/view/adm/admHomePage.php ");
            
        }else{
             header("Location: /Projeto_papelaria/area-restrita/view/usuario/userHomePage.php ");
            
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
    <title>E-Papelaria - Login</title>
</head>
<body>
    <div class="content">   
        <div class="wallpaper">
            
        </div>
        <div class="formContent">
            <img src="imgs/logomarca.png">
            <div class="container">
                <form method="POST" action="./area-restrita/controller/login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="Insira o email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" placeholder="Insira a Senha" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Logar</button>
                </form>
                <div class="register">
                    <a href="cadastro.php">Cadastre-se</a>
                </div>
                
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>