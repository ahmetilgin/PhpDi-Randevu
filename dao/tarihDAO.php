<?php
class TarihDAO
{
    function Gunler($tarih)
    {
        $gunler = array('Sun'=>'Pazar','Mon'=>"Pazartesi",'Tue'=>"Salı",'Wed'=>"Çarşamba",'Thu'=>"Perşembe",'Fri'=>"Cuma",'Sat'=>"Cumartesi");
        $tarihGun = "date_format('$tarih','%a')";
        try {
            $baglanti = new VeriTabaniBaglanti();    
            $conn = $baglanti->pdo_baglanti();
            $tarihSorgu = $conn->query("select $tarihGun as Tarih");
            $row = $tarihSorgu->fetch(PDO::FETCH_LAZY);
            $gunAd = $gunler[$row->Tarih];
            
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir(); 
            }    
        }
        return $gunAd;
        
    }
    
    
            
    function MusteriGunGoster($tarih)
    {
        $musteriList = array();
        try {
            $sutunlar="id,musteriAd,musteriSoyad,email,tel,randevuTarihi,mesaj,saat_id,doktor_id,randevuOnay";
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $tarihSorgu = $conn->query("select $sutunlar  from musteri where randevuTarihi='$tarih' and CURDATE()<=randevuTarihi ");
            $rows = $tarihSorgu->fetchAll(PDO::FETCH_CLASS);
            foreach ($rows as $row) {
                $musteri = new Musteri();
                $musteri->setMusteriId($row->id);
                $musteri->setAd($row->musteriAd);
                $musteri->setSoyad($row->musteriSoyad);
                $musteri->setEmail($row->email);
                $musteri->setTel($row->tel);
                $musteri->setRandevuTarihi($row->randevuTarihi);
                $musteri->setSaatId($row->saat_id);
                $musteri->setMesaj($row->mesaj);
                $musteri->setDoktorId($row->doktor_id);
                
                array_push($musteriList, $musteri);
            } 
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir(); 
            }    
        }
        
        return $musteriList;
    }
    
    function MusteriDoktorGunGoster($tarih, $id)
    {
        $musteriList = array();
        try {
            $sutunlar="id,musteriAd,musteriSoyad,email,tel,randevuTarihi,mesaj,saat_id,doktor_id,randevuOnay";
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $tarihSorgu = $conn->query("select $sutunlar  from musteri where randevuTarihi='$tarih' and doktor_id=$id and CURDATE()<=randevuTarihi ");
            $rows = $tarihSorgu->fetchAll(PDO::FETCH_CLASS);
            foreach ($rows as $row) {
                $musteri = new Musteri();
                $musteri->setMusteriId($row->id);
                $musteri->setAd($row->musteriAd);
                $musteri->setSoyad($row->musteriSoyad);
                $musteri->setEmail($row->email);
                $musteri->setTel($row->tel);
                $musteri->setRandevuTarihi($row->randevuTarihi);
                $musteri->setSaatId($row->saat_id);
                $musteri->setMesaj($row->mesaj);
                $musteri->setDoktorId($row->doktor_id);
                
                array_push($musteriList, $musteri);
            } 
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir(); 
            }    
        }
        
        return $musteriList;
    }
    
}
?>
