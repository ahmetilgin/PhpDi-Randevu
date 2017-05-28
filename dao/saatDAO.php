<?php
class SaatDAO
{
    function saatGoster()
    {
        $saatList = array();
        try{
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from saat");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            foreach ($rows as $row) {
                $saat = new Saat();
                $saat->setSaatId($row->id);
                $saat->setSaatAdi($row->saatAdi);
                array_push($saatList, $saat);
            }
        } catch (Exception $ex) {
            die('<p style="color: red;">Hata Oluştu '.$ex->getMessage().'</p>');
        }
        
        return $saatList;
    }
    
    function saatIdGoster($id)
    {
        //$saat = null;
        try{
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from saat where id=$id");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $saat = $row->saatAdi;
        } catch (Exception $ex) {
            die('<p style="color: red;">Hata Oluştu '.$ex->getMessage().'</p>');
        }
        
        return $saat;
    }
    
    
}
?>