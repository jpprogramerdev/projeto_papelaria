<?php 
    session_start();
    require_once __DIR__.'../../classes/DAO/daoUser.php';
    require_once __DIR__.'../../classes/Pojo/pojoUser.php';
    require_once __DIR__.'../../classes/Pojo/endereco.php';

    if(isset($_POST["email"]) && isset($_POST["cpf"])){
        extract($_POST);
        $user = new PojoUser();
        $daoUser = new DaoUser();


        $endereco = new Endereco($cep, $uf, $localidade, $bairro, $logradouro, $numEnde);

        $user->setUser_Id($userId);

        $user->setUser_nome($nome);
        $user->setUser_cpf($cpf);
        $user->setUser_endereco($endereco);
        $user->setUser_email($email);
        $user->setUser_tipo($tipoUsuario);

        $emailNotUsed = $daoUser->emailNotUsed($user->getUser_Id(), $email);
            
        if($emailNotUsed){

            $daoUser->AtualizarUsuario($user);
            header("Location: /Projeto_papelaria/area-restrita/view/adm/admHomePage.php ");
        }else{
            echo "Email inválido";
            header("Location: /Projeto_papelaria/area-restrita/view/adm/atualizaUserPage.php ");
        }

    }


?>