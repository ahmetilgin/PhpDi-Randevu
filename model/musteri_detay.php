<?php
class MusteriDetay extends Musteri
{
    private $detay_id, $yapilan_islem, $yapilacak_islem, $muayneDurumu, $eskiRandevuTarihi;
    
    function __construct() {
        parent::__construct();
    }
    
    function setEskiRandevuTarihi($eskiRandevuTarihi)
    {
        $this->eskiRandevuTarihi = $eskiRandevuTarihi;
    }
    
    function getEskiRandevuTarihi()
    {
        return $this->eskiRandevuTarihi;
    }
    
    function setDetayId($detay_id)
    {
        $this->detay_id = $detay_id;
    }
    
    function getDetayId()
    {
        return $this->detay_id;
    }
    
    function setYapilanIslem($yapilan_islem)
    {
        $this->yapilan_islem = $yapilan_islem;
    }
    
    function getYapilanIslem()
    {
        return $this->yapilan_islem;
    }
    
    function setYapilacakIslem($yapilacak_islem)
    {
        $this->yapilacak_islem = $yapilacak_islem;
    }
    
    function getYapilacakIslem()
    {
        return $this->yapilacak_islem;
    }
    
    function setMuayneDurumu($muayneDurumu)
    {
        $this->muayneDurumu = $muayneDurumu;
    }
    
    function getMuayneDurumu()
    {
        return $this->muayneDurumu;
    }
    
    
    
}

?>