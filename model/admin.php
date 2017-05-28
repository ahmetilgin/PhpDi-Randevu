<?php
class Admin
{
    private $adminId, $username, $ad, $soyad, $email, $tel, $dogumTarihi; 
    
    function __construct() 
    {
        ;
    }
    
    function setAdminId($adminId)
    {
        $this->adminId = $adminId;
    }
    
    function getAdminId()
    {
        return $this->adminId;
    }
    
    function setUsername($username)
    {
        $this->username = $username;
    }
    
    function getUsername()
    {
        return $this->username;
    }
    
    function setAd($ad)
    {
        $this->ad = $ad;
    }
    
    function getAd()
    {
        return $this->ad;
    }
    function setSoyad($soyad)
    {
        $this->soyad = $soyad;
    }
    
    function getSoyad()
    {
        return $this->soyad;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function setTel($tel)
    {
        $this->tel = $tel;
    }
    
    function getTel()
    {
        return $this->tel;
    }
    
    function setDogumTarihi($dogumTarihi)
    {
        $this->dogumTarihi = $dogumTarihi;
    }
    
    function getDogumTarihi()
    {
        return $this->dogumTarihi;
    }
    
}
?>
