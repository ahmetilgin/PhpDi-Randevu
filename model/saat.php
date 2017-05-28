<?php
class Saat
{
    private $saatId, $saatAdi;
    
    function __construct() 
    {
        ;
    }
    
    function setSaatId($saatId)
    {
        $this->saatId = $saatId;
    }
    
    function getSaatId()
    {
        return $this->saatId;
    }
    
    function setSaatAdi($saatAdi)
    {
        $this->saatAdi = $saatAdi;
    }
    
    function getSaatAdi()
    {
        return $this->saatAdi;
    }
}
?>