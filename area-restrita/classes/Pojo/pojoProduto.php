<?php  


class PojoProduto{
    private $prod_id;
    private $prod_nome;
    private $prod_desc;
    private $prod_preco;
    private $prod_url;  

    public function __construct(
            $prod_id = null,
            $prod_nome = null,
            $prod_desc = null,
            $prod_preco = null,
            $prod_url = null
        )
    {
        
    }

    /**
     * Get the value of prod_id
     */ 
    public function getProd_id()
    {
        return $this->prod_id;
    }

    /**
     * Set the value of prod_id
     *
     * @return  self
     */ 
    public function setProd_id($prod_id)
    {
        $this->prod_id = $prod_id;

        return $this;
    }

    /**
     * Get the value of prod_nome
     */ 
    public function getProd_nome()
    {
        return $this->prod_nome;
    }

    /**
     * Set the value of prod_nome
     *
     * @return  self
     */ 
    public function setProd_nome($prod_nome)
    {
        $this->prod_nome = $prod_nome;

        return $this;
    }

    /**
     * Get the value of prod_desc
     */ 
    public function getProd_desc()
    {
        return $this->prod_desc;
    }

    /**
     * Set the value of prod_desc
     *
     * @return  self
     */ 
    public function setProd_desc($prod_desc)
    {
        $this->prod_desc = $prod_desc;

        return $this;
    }

    /**
     * Get the value of prod_valor
     */ 
    public function getProd_preco()
    {
        return $this->prod_preco;
    }

    /**
     * Set the value of prod_valor
     *
     * @return  self
     */ 
    public function setProd_preco($prod_preco)
    {
        $this->prod_preco = $prod_preco;

        return $this;
    }


    /**
     * Get the value of prod_valor
     */ 
    public function getProd_url()
    {
        return $this->prod_url;
    }

    /**
     * Set the value of prod_valor
     *
     * @return  self
     */ 
    public function setProd_url($prod_url)
    {
        $this->prod_url = $prod_url;

        return $this;
    }
    
}



?>
