<?php
    require_once __DIR__.'../../../classes/DAO/daoUser.php';
    require_once __DIR__.'../../../classes/Pojo/pojoUser.php';
    require_once __DIR__.'../../../classes/Pojo/endereco.php';

    session_start();

    if(!isset($_SESSION["pes_id"])){
        header("Location: /Projeto_papelaria/ ");
    }

    if(!isset($_POST["idEdit"])){

        header("Location: /Projeto_papelaria/area-restrita/view/adm/admHomePage.php ");
    }

    extract($_POST);

    // echo $idEdit;

    $obj_userDao = new DaoUser();
    $obj_user = new PojoUser();
    $endereco = new Endereco();

    $selectedUser = $obj_userDao->findById($idEdit);


    foreach($selectedUser as $chave => $valor){
        $obj_user->setUser_Id($valor->pes_id);
        $obj_user->setUser_nome($valor->pes_nome);
        $obj_user->setUser_cpf($valor->pes_cpf);

        $endereco->setUser_cep($valor->pes_cepEnder);
        $endereco->setUser_estado($valor->pes_estadoEnder);
        $endereco->setUser_cidade($valor->pes_cidadeEnder);
        $endereco->setUser_bairro($valor->pes_bairroEnder);
        $endereco->setUser_logradouro($valor->pes_logradouroEnder);
        $endereco->setUser_numero($valor->pes_numeroEnder);
        // $obj_user->setUser_endereco($valor->endereco);
        $obj_user->setUser_endereco($endereco);
        $obj_user->setUser_email($valor->pes_email);
        $obj_user->setUser_senha($valor->pes_senha);
        $obj_user->setUser_tipo($valor->pes_tip_id);
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
    <title>E-Papelaria - Atualizar Usuário</title>
</head>
<body>
    <div class="content">   
        </div>
        <div class="formContent">
            <img src="imgs/logomarca.png">
            <div class="container">
                <form method="POST" action="../../controller/atualizarUser.php">



                    <div class='mb-3' style="display: none;">
                        <label for="userId" class="form-label">Id</label>
                        <?php  
                        
                        echo '<input type="text" placeholder="Nome Completo" value="'.$obj_user->getUser_Id() .'" class="form-control" id="userId" name="userId" required> ';
                        
                        ?>
                                          
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <?php  
                        
                        echo '<input type="text" placeholder="Nome Completo" value="'.$obj_user->getUser_nome() .'" class="form-control" id="nome" name="nome" required> ';
                        
                        ?>
                                          
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>

                        <?php  
                        
                        echo ' <input type="text" placeholder="CPF" value="'.$obj_user->getUser_cpf().'" class="form-control" id="cpf" name="cpf" required>';
                        
                        ?>
                        
                                      
                    </div>
                
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <?php
                          echo  '<input type="text" placeholder="CEP" value="'.$obj_user->getUser_endereco()->getUser_cep().'" class="form-control" id="cep" name="cep" required maxlength="9">';
                        ?>
                                               
                    </div>
                    
                    <div class="mb-3">
                        <label for="uf" class="form-label">Estado</label>
                        <?php 
                            echo '<input type="text" placeholder="Estado" value="'.$obj_user->getUser_endereco()->getUser_estado().'" class="form-control" id="uf" name="uf" required>';
                        ?>
                                               
                    </div>

                    <div class="mb-3">
                        <label for="localidade" class="form-label">Cidade</label>
                        <?php
                            echo '<input type="text" placeholder="Cidade" value="'.$obj_user->getUser_endereco()->getUser_cidade().'" class="form-control" id="localidade" name="localidade" required>';
                        ?>
                                               
                    </div>

                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <?php
                            echo '<input type="text" placeholder="Bairro" value="'.$obj_user->getUser_endereco()->getUser_bairro().'" class="form-control" id="bairro" name="bairro" required> ';
                        ?>
                                              
                    </div>

                    
                    <div class="mb-3">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <?php
                            echo '<input type="text" placeholder="Logradouro" value="'.$obj_user->getUser_endereco()->getUser_logradouro().'" class="form-control" id="logradouro" name="logradouro" required> ';
                        ?>
                                              
                    </div>
                    
                    <div class="mb-3">
                        <label for="numEnde" class="form-label">Numero</label>
                        <?php
                            echo '<input type="text" placeholder="Numero" value="'.$obj_user->getUser_endereco()->getUser_numero().'" class="form-control" id="numEnde" name="numEnde" required>';
                        ?>
                                               
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email para contato</label>
                        <?php
                            echo '<input type="email" placeholder="Insira o email" value="'.$obj_user->getUser_email().'" class="form-control" id="email" name="email" aria-describedby="emailHelp">';
                        ?>
                                               
                    </div>

                    <?php 
                    
                        if(!($obj_user->getUser_Id() == $_SESSION["pes_id"])){
                            echo '<div class="mb-3">';
                                echo '<label for="email" class="form-label">Tipo de conta</label> <br>';
                                echo'<select class="form-select" name="tipoUsuario" id="tipoUsuario">';
                                    if($obj_user->getUser_tipo() == 1){
                                        echo "<option value='1' selected>Comum</option>";
                                        echo "<option value='2'>Administrador</option>";
                                    }else{
                                        echo "<option value='1'>Comum</option>";
                                        echo "<option value='2' selected>Administrador</option>";
                                    }
                                
                                echo '</select>'; 
                            echo '</div>';
                        }else{
                            echo '<div class="mb-3" style="display: none;">';
                                echo '<label for="email" class="form-label">Tipo de conta</label> <br>';
                                echo'<select class="form-select" name="tipoUsuario" id="tipoUsuario">';
                                    if($obj_user->getUser_tipo() == 1){
                                        echo "<option value='1' selected>Comum</option>";
                                        echo "<option value='2'>Administrador</option>";
                                    }else{
                                        echo "<option value='1'>Comum</option>";
                                        echo "<option value='2' selected>Administrador</option>";
                                    }
                                
                                echo '</select>'; 
                            echo '</div>';
                        }
                    
                    ?>

                    
                                               
                    
                    

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>

                <div class="register">
                    <a href="./admHomePage.php">Voltar para a página inicial</a>
                </div>
                
            </div>
        </div>  
    </div>
    <script src="js/consultar_cep.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>