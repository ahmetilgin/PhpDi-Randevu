<?php
class IletisimDAO
{
    function IletisimEkle(Iletisim $ilt)
    {
        try {
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare("insert into iletisim (ad, email, mesaj) values(?,?,?)");
            $sonuc = $ekle->execute(array($ilt->getAd(), $ilt->getEmail(), $ilt->getMesaj()));
            if ($sonuc) {
                echo '<div class="row"><div class="col-sm-12 form-group"><p style="color: green;">Mesajınız iletildi</p></div></div>';
                header("refresh:2;url=iletisim.php");
            } else {
                echo '<div class="row"><div class="col-sm-12 form-group"><p style="color: red;">Hata Oluştu</p></div></div>';
            }
            
        } catch (PDOException $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        } 
    }
    
    function MesajList()
    {
        $mesajList = array();
        try {
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("select *from iletisim order by id desc limit 10");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            
            foreach ($rows as $row) {
                $ilt = new Iletisim();
                $ilt->setIletisimId($row->id);
                $ilt->setAd($row->ad);
                $ilt->setEmail($row->email);
                $ilt->setMesaj($row->mesaj);
                array_push($mesajList, $ilt);
            }
            
        } catch (PDOException $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        return $mesajList;
    }
    
    function IletisimSil(Iletisim $ilt)
    {
        try {
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare("delete from iletisim where id=?");
            $sonuc = $ekle->execute(array($ilt->getIletisimId()));
            if ($sonuc) {
                
                header("Location:../iletisim.php");
            } else {
                echo '<div class="row"><div class="col-sm-12 form-group"><p style="color: red;">Hata Oluştu</p></div></div>';
            }
            
        } catch (PDOException $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        } 
    }
}

?>