<?php
class Musteri
{
    private $musteriId, $ad, $soyad, $email, $tel, $doktorId, $randevuTarihi, $saatId, $randevuOnay, $mesaj;
    
    function __construct() 
    {
        ;
    }
    
    function setMusteriId($musteriId)
    {
        $this->musteriId = $musteriId;
    }
    
    function getMusteriId() 
    {
        return $this->musteriId;
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
        return  $this->tel;
    }
    
     function setDoktorId($doktorId)
    {
        $this->doktorId = $doktorId;
    }
    
    function getDoktorId()
    {
        return  $this->doktorId;
    }
    
    function setRandevuTarihi($radevuTarihi)
    {
        $this->randevuTarihi = $radevuTarihi;
    }
    
    function getRandevuTarihi()
    {
        return $this->randevuTarihi;
    }
    
    function setSaatId($saatId)
    {
        $this->saatId = $saatId;
    }
    
    function getSaatId()
    {
        return $this->saatId;
    }
    
    
    
    function setRandevuOnay($randevuOnay)
    {
        $this->randevuOnay = $randevuOnay;
    }
    
    function getRandevuOnay()
    {
        return $this->randevuOnay;
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

