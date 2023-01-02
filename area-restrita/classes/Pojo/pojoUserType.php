<?php   


class PojoUserType{
    private $UserTypeId;
    private $userTypeDesc;

    


    /**
     * Get the value of UserTypeId
     */ 
    public function getUserTypeId()
    {
        return $this->UserTypeId;
    }

    /**
     * Set the value of UserTypeId
     *
     * @return  self
     */ 
    public function setUserTypeId($UserTypeId)
    {
        $this->UserTypeId = $UserTypeId;

        return $this;
    }


    /**
     * Get the value of userTypeDesc
     */ 
    public function getUserTypeDesc()
    {
        return $this->userTypeDesc;
    }

    /**
     * Set the value of userTypeDesc
     *
     * @return  self
     */ 
    public function setUserTypeDesc($userTypeDesc)
    {
        $this->userTypeDesc = $userTypeDesc;

        return $this;
    }
}




?>