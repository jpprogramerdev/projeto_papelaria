<!DOCTYPE html>

<?php
    require_once __DIR__.'../../../classes/DAO/daoUser.php';

    session_start();


    if(!isset($_SESSION["pes_id"])){
        header("Location: /Projeto_papelaria/ ");
    }

    if(isset($_GET["loggoutAdm"])){
        header("Location: /Projeto_Papelaria/area-restrita/controller/logout.php");
    }
        
    $obj_user = new DaoUser();
    $arr = $obj_user->findSimpleAll();

?>


<html lang="en">
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

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Papelaria - Admin Page</title>
</head>
<body>
    <div class="menu">
        <div class="menuTitle">
            <div>E-Papelaria</div>       
        </div>
        <div class="menuList">
            <a class="listItem" href="#">Home</a>
            <a class="listItem" href="gerenciarProdutosPage.php">Loja</a>
            <a class="listItem" type="button" href="admHomePage.php?loggoutAdm=true">Sair</a>
        </div>
    </div>
    <div class="content">
        <div class="textBold">
            Bem vindo Administrador
        </div>


        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Gerenciar <b>Usuários</b></h2>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Tipo de conta</th>
                        </tr>
                    </thead>
                    <tbody>			
                        
                        <?php   
                            foreach($arr as $chave => $valor){
    
                                echo "<tr>\n";

                                echo "<td>$valor->pesNome</td>\n";
                                echo "<td>$valor->pesEmail</td>\n";
                                echo "<td> $valor->endereco</td>\n";
                                echo '<td>';
                                echo $valor->tipoUser == 1 ? 'Comum' : 'Administrador';
                                echo'</td>';

                                echo '<td>';
                                echo '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="'.  $valor->pesId .'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';

                                if($valor->pesId != $_SESSION["pes_id"]){
                                    echo '  
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="'.  $valor->pesId .'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>'; 

                                }
                                echo "</tr>\n";
                    
                            }
                        
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
 
        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./atualizaUserPage.php">

                        <div class="modal-header">						
                            <h4 class="modal-title">Deseja editar este usuário?</h4>
                            <input type="text" name="idEdit" id="idEdit" value="" style="display: none">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">									
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-info" value="Sim">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./../../controller/deletarUser.php">


                        <div class="modal-header">						
                            <h4 class="modal-title">Deletar Cliente?</h4>
                            <input type="text" name="idDelete" id="idDelete" value="" style="display: none">
                            <button type="subimit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <p>Tem certeza que deseja deletar esta conta?</p>
                            <p class="text-warning"><small>Esta ação não pode ser desfeita.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-danger" value="Deletar">
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>

    </div>
    <div class="footer">
        Copyright © 2022 MDJL - Todos os direitos reservados
    </div>

    <script>

            let id
            let className

            window.addEventListener("click", function(event) {
            
                className = event.target.parentElement;

                console.log(className.className)
                if(className.className == 'delete'){
                    id = event.target.parentElement.dataset.id;
                    if(!isNaN(id)){
                        document.getElementById('idDelete').value = id;
                    }

                }else{
                    id = event.target.parentElement.dataset.id;
                    if(!isNaN(id)){
                        document.getElementById('idEdit').value = id;
                    }
                }

            })
    </script>
</body>
</html>