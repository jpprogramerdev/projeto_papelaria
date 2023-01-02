<?php  
include_once "endereco.php";
include_once "pojoUserType.php";

class PojoUser{
    private $user_id;
    private $user_nome;
    private $user_cpf;
    private $user_endereco;
    private $user_email;
    private $user_senha;
    private $user_tipo;


    public function __construct(
        $user_id = null,
        $user_nome = null,
        $user_cpf = null,
        $user_email = null,
        $user_senha = null,
        $user_tipo = null,
        Endereco $user_endereco = null
        ){
        
        $this->user_id = $user_id;
        $this->user_nome = $user_nome;
        $this->user_cpf = $user_cpf;
        
        $this->user_email = $user_email;

        $this->user_endereco= $user_endereco;


        $this->user_senha = $user_senha;

        $this->user_tipo = $user_tipo;

    }

    // Gets

    public function getUser_Id(){
        return $this->user_id;
    }

    public function getUser_nome(){
        return $this->user_nome;
    }

    public function getUser_cpf(){
        return $this->user_cpf;
    }

    public function getUser_email(){
        return $this->user_email;
    }

    public function getUser_senha(){
        return $this->user_senha;
    }

    // Sets

    public function setUser_Id($valor){
        $this->user_id = $valor;
    }

    public function setUser_nome($valor){
        $this->user_nome = $valor;
    }

    public function setUser_cpf($valor){
        $this->user_cpf = $valor;
    }

    public function setUser_email($valor){
        $this->user_email = $valor;
    }


    public function setUser_senha($valor){
        $this->user_senha = $valor;
    }


        /**
     * Get the value of user_endereco
     */ 
    public function getUser_endereco()
    {
        return $this->user_endereco;
    }

    /**
     * Set the value of user_endereco
     *
     * @return  self
     */ 
    public function setUser_endereco(Endereco $user_endereco)
    {
        $this->user_endereco = $user_endereco;

        return $this;
    }

    /**
     * Get the value of user_tipo
     */ 
    public function getUser_tipo()
    {
        return $this->user_tipo;
    }

    /**
     * Set the value of user_tipo
     *
     * @return  self
     */ 
    public function setUser_tipo($user_tipo)
    {
        $this->user_tipo = $user_tipo;

        return $this;
    }
}


?>