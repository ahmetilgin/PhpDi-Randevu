<?php
class Iletisim
{
    private $id, $ad, $email, $mesaj;
    
    function setIletisimId($id) 
    {
        $this->id = $id;
    }
    
    function getIletisimId() 
    {
        return $this->id;
    }
    
    function setAd($ad) 
    {
        $this->ad = $ad;    
    }
    
    function getAd()
    {
        return $this->ad;
    }
    
    function setEmail($email)
    {
        $this->email = $email; 
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function setMesaj($mesaj)
    {
        $this->mesaj = $mesaj;
    }
    
    function getMesaj()
    {
        return $this->mesaj;
    }
}

?>

