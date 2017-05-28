<?php
class Doktor 
{
    private $doktorId, $ad, $soyad, $dogumTarihi, $email,$tel, $username;
    
    function __construct() 
    {
        ;
    }
    
    function setDoktorId($doktorId)
    {
        $this->doktorId = $doktorId;
    }
    
    function getDoktorId()
    {
        return  $this->doktorId;
    }
    
    function setUsername($username) {
        $this->username = $username;
    } 
    
    function getUsername() {
        return $this->username;
    }
            
    function setAd($ad)
    {
        $this->ad= $ad;
    }
    
    function getAd()
    {
        return  $this->ad;
    }
    
    function setSoyad($soyad)
    {
        $this->soyad = $soyad;
    }
    
    function getSoyad()
    {
        return  $this->soyad;
    }
    
    function setDogumTarihi($dogumTarihi)
    {
        $this->dogumTarihi = $dogumTarihi;
    }
    
    function getDogumTarihi()
    {
        return  $this->dogumTarihi;
    }
    
    function setTel($tel)
    {
        $this->tel = $tel;
    }
    
    function getTel()
    {
        return  $this->tel;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
}


?>
