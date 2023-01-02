<?php    
require_once  __DIR__.'/../database/conexao.php';
require_once  __DIR__.'/../Pojo/pojoUser.php';
require_once  __DIR__.'/../Pojo/endereco.php';
require_once __DIR__.'/../DAO/interfaceCrud.php';

class DaoUser extends CRUD{
    public static $instance;

    public function __construct()
    {
        //
    }

    // public static function getInstance(){
    //     if(!isset(self::$instance)){
    //         self::$instance = new DaoUser();
    //     }

    //     return self::$instance;
    // }

    public function InserirUsuario(PojoUser $user){
        try{
            $sql = "INSERT INTO pessoas (
                pes_nome,
                pes_cpf,
                pes_email,
                pes_senha,
                pes_cepEnder,
                pes_estadoEnder,
                pes_cidadeEnder,
                pes_bairroEnder,
                pes_logradouroEnder,
                pes_numeroEnder,
                pes_tip_id
                ) VALUES (
                    :nome,
                    :cpf,
                    :email,
                    :senha,
                    :cepEnder,
                    :estadoEnder,
                    :cidadeEnder,
                    :bairroEnder,
                    :logradouroEnder,
                    :numeroEnder,
                    :userType
                );
            ";

            $p_sql = Conexao::prepare($sql);

            $p_sql->bindValue(":nome",$user->getUser_nome());
            $p_sql->bindValue(":cpf",$user->getUser_cpf());
            $p_sql->bindValue(":email",$user->getUser_email());
            $p_sql->bindValue(":senha",$user->getUser_senha());
            $p_sql->bindValue(":cepEnder",$user->getUser_endereco()->getUser_cep());
            $p_sql->bindValue(":estadoEnder",$user->getUser_endereco()->getUser_estado());
            $p_sql->bindValue(":cidadeEnder",$user->getUser_endereco()->getUser_cidade());
            $p_sql->bindValue(":bairroEnder",$user->getUser_endereco()->getUser_bairro());
            $p_sql->bindValue(":logradouroEnder",$user->getUser_endereco()->getUser_logradouro());
            $p_sql->bindValue(":numeroEnder",$user->getUser_endereco()->getUser_numero());
            $p_sql->bindValue(":userType",$user->getUser_tipo());
            
            $p_sql->execute();

            return true;

        }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
                
        }
    }


    public function AtualizarUsuario(PojoUser $user){
        try{
            $sql = "UPDATE pessoas SET
                pes_nome = :nome,
                pes_cpf = :cpf,
                pes_email = :email,
                pes_cepEnder = :cepEnder,
                pes_estadoEnder = :estadoEnder,
                pes_cidadeEnder = :cidadeEnder,
                pes_bairroEnder = :bairroEnder,
                pes_logradouroEnder = :logradouroEnder,
                pes_numeroEnder = :numeroEnder,
                pes_tip_id = :userType
                WHERE pes_id = :id


            ";

            $p_sql = Conexao::prepare($sql);

            $p_sql->bindValue(":id",$user->getUser_Id());
            $p_sql->bindValue(":nome",$user->getUser_nome());
            $p_sql->bindValue(":cpf",$user->getUser_cpf());
            $p_sql->bindValue(":email",$user->getUser_email());
            $p_sql->bindValue(":cepEnder",$user->getUser_endereco()->getUser_cep());
            $p_sql->bindValue(":estadoEnder",$user->getUser_endereco()->getUser_estado());
            $p_sql->bindValue(":cidadeEnder",$user->getUser_endereco()->getUser_cidade());
            $p_sql->bindValue(":bairroEnder",$user->getUser_endereco()->getUser_bairro());
            $p_sql->bindValue(":logradouroEnder",$user->getUser_endereco()->getUser_logradouro());
            $p_sql->bindValue(":numeroEnder",$user->getUser_endereco()->getUser_numero());
            $p_sql->bindValue(":userType",$user->getUser_tipo());
            
            $p_sql->execute();

            return true;

        }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
                
        }
    }

    public function findById($id){
        try{

            $sql = "SELECT * FROM pessoas WHERE pes_id = :id";
            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $p_sql->fetchAll();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function findAll(){
        try{

            $sql = "SELECT * FROM pessoas";
            $p_sql = Conexao::prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function findSimpleAll(){
        try{

            $sql = "SELECT
                    pes_id as pesId,
                    pes_nome as pesNome,
                    pes_email as pesEmail,
                    CONCAT(pes_estadoEnder, ', ' , pes_cidadeEnder, ', ' ,
                    pes_bairroEnder, ', ' , pes_logradouroEnder, ', '  , pes_numeroEnder) as endereco,
                    pes_tip_id as tipoUser FROM pessoas";
                    
            $p_sql = Conexao::prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function findAllOrdered($coluna){
        try{
            $sql = "SELECT * FROM pessoas ORDER BY :coluna ASC";
            $p_sql = Conexao::prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }


    public function findByEmail($email){
        try{
            $sql = "SELECT * FROM pessoas WHERE pes_email = :email";
            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":email", $email);

            $p_sql->execute();

            return $p_sql->fetch();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function emailNotUsed($id, $email){
        try{
            $sql = "SELECT pes_email FROM pessoas WHERE pes_id != :id";
            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":id", $id);

            $p_sql->execute();

            $obj = $p_sql->fetchAll();

            foreach($obj as $chave => $valor){
                if($valor->pes_email == $email){
                    return false;
                }
            }

            return true;

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }



    public function deleteById($id){
        try{
            $sql = "DELETE FROM pessoas WHERE pes_id = :id";
            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $p_sql->fetch();

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function emailAlreadyExists($email){
        try{
            $sql = "SELECT * FROM pessoas WHERE pes_email = :email";
            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":email", $email);

            $p_sql->execute();

            $lines = $p_sql->rowCount();

            return !!$lines;

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }

    public function autenticarUsuario($email, $senha){
        try{
            $sql = "SELECT * FROM pessoas WHERE pes_email = :email AND pes_senha = :senha";

            $p_sql = Conexao::prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->bindValue(":senha", $senha);

            $p_sql->execute();

            $lines = $p_sql->rowCount();

            return !!$lines;

        }catch(Exception $e){
            print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
        }
    }





}





?>