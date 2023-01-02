<?php   

class Endereco{
    private $user_cep;
    private $user_estado;
    private $user_cidade;
    private $user_bairro;
    private $user_logradouro;
    private $user_numero;


    //Gets

    public function __construct($user_cep = null,$user_estado=null,$user_cidade=null,$user_bairro=null, $user_logradouro=null, $user_numero=null){
        $this->user_cep = $user_cep;
        $this->user_estado = $user_estado;
        $this->user_cidade = $user_cidade;
        $this->user_bairro = $user_bairro;
        $this->user_logradouro = $user_logradouro;
        $this->user_numero = $user_numero;
    }

    public function getUser_cep(){
        return $this->user_cep;
    }

    public function getUser_estado(){
        return $this->user_estado;
    }

    public function getUser_cidade(){
        return $this->user_cidade;
    }

    public function getUser_bairro(){
        return $this->user_bairro;
    }
    public function getUser_logradouro(){
        return $this->user_logradouro;
    }

    public function getUser_numero(){
        return $this->user_numero;
    }

    //Sets

    public function setUser_cep($valor){
        $this->user_cep = $valor;
    }

    public function setUser_estado($valor){
        $this->user_estado = $valor;
    }

    public function setUser_cidade($valor){
        $this->user_cidade = $valor;
    }

    public function setUser_bairro($valor){
        $this->user_bairro = $valor;
    }
    public function setUser_logradouro($valor){
        $this->user_logradouro = $valor;
    }

    public function setUser_numero($valor){
        $this->user_numero = $valor;
    }


}




?>