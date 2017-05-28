<?php
class KullaniciGiris
{
    private $email, $sifre, $yetkiId ,$resim;
    
    function __construct() 
    {
        ;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function getEmail()
    {
        return $this->email;
    }
            
    function setSifre($sifre)
    {
        $this->sifre = $sifre;
    }
    
    function getSifre()
    {
        return $this->sifre;
    }
    
    function setYetkiId($yetkiId)
    {
        $this->yetkiId = $yetkiId;
    }
    
    function getYetkiId()
    {
        return $this->yetkiId;
    }
    
    function setResim($resim)
    {
        $this->resim = $resim;
    }
    
    function getResim()
    {
        return $this->resim;
    }
}

?>