<?php

require_once  __DIR__.'/../database/conexao.php';
require_once __DIR__.'/../DAO/interfaceCrud.php';
require_once __DIR__.'/../Pojo/pojoProduto.php';

class DaoProduto extends CRUD{

    public function __construct()
    {
        //
    }

    public function InserirProduto(PojoProduto $prod){
        try{
            $sql = "INSERT INTO produtos (
                prod_nome,
                prod_desc,
                prod_preco,
                prod_url
                ) VALUES (
                    :Pnome,
                    :Pdesc,
                    :Ppreco,
                    :Purl
                );";
            
            $stmt = Conexao::prepare($sql);

            $stmt->bindValue(":Pnome",$prod->getProd_nome());
            $stmt->bindValue(":Pdesc",$prod->getProd_desc());
            $stmt->bindValue(":Ppreco",$prod->getProd_preco());
            $stmt->bindValue(":Purl",$prod->getProd_url());

            $stmt->execute();

            }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
            }
        }

        public function findById($id){
            try{
    
                $sql = "SELECT * FROM produtos WHERE prod_id = :id";
                $stmt = Conexao::prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                return $stmt->fetchAll();
                
            }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
            }
        }

        public function findAll(){
            try{
        
                $sql = "SELECT * FROM produtos";
                $stmt = Conexao::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
        
            }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
            }
        }
        
        public function findAllOrdered($coluna){
            try{
                $sql = "SELECT * FROM produtos ORDER BY :coluna ASC";
                $stmt = Conexao::prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
        
            }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
            }
        }

        public function atualizarProduto(PojoProduto $prod){
            try{
                $sql = "UPDATE produtos SET 
                    prod_nome = :Pnome,
                    prod_desc = :Pdesc,
                    prod_preco = :Ppreco,
                    prod_url = :Purl
                    WHERE prod_id = :Pid ";
                
                $stmt = Conexao::prepare($sql);
    
                $stmt->bindValue(":Pnome",$prod->getProd_nome());
                $stmt->bindValue(":Pdesc",$prod->getProd_desc());
                $stmt->bindValue(":Ppreco",$prod->getProd_preco());
                $stmt->bindValue(":Purl",$prod->getProd_url());
                $stmt->bindValue(":Pid",$prod->getProd_id());
    
                $stmt->execute();
    
                }catch(Exception $e){
                    print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
                }
            }

        public function deleteById($id){
            try{
                $sql = "DELETE FROM produtos WHERE prod_id = :id";
                $p_sql = Conexao::prepare($sql);
                $p_sql->bindValue(":id", $id);
                $p_sql->execute();
                return $p_sql->fetch();
    
            }catch(Exception $e){
                print "Ocorreu um erro ao tentar executar esta ação: Erro: Código:" . $e->getCode() .  "Mensagem: " . $e->getMessage();
            }
        }


        
} 

?>