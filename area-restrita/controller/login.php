<?php
    session_start();
    require_once __DIR__.'../../classes/DAO/daoUser.php';
    require_once __DIR__.'../../classes/Pojo/pojoUser.php';
    
    if(isset($_SESSION["user_id"])){
        header("Location: http://localhost/Projeto_papelaria/area-restrita/view/usuario/userHomePage.php ");
    }

    if(isset($_POST["email"]) && isset($_POST["password"])){
        extract($_POST);
        $user = new PojoUser();
        $userDao = new DaoUser();

        $user->setUser_email($email);
        $user->setUser_senha($password);


        $userExists = $userDao->autenticarUsuario($user->getUser_email(), $user->getUser_senha());

        if($userExists){
            $usuarioEncontrado = $userDao->findByEmail($user->getUser_email());

            $user->setUser_Id($usuarioEncontrado->pes_id);
            $user->setUser_tipo($usuarioEncontrado->pes_tip_id);

            $_SESSION["pes_id"] = $user->getUser_Id();
            $_SESSION["pes_tip_id"] = $user->getUser_tipo();
            
                     //Verificar se é administrador
            if($_SESSION["pes_tip_id"] == 2){
                header("Location: /Projeto_papelaria/area-restrita/view/adm/admHomePage.php ");
            }else{ 
                header("Location: /Projeto_papelaria/area-restrita/view/usuario/userHomePage.php ");
            }
        }else{

            header("Location: /Projeto_papelaria/ ");
        }

    }else{
        header("Location: /Projeto_papelaria/ ");
    }


?> 