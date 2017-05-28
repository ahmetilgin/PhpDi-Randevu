<?php
class MusteriDAO
{
    function musteriEkle(Musteri $musteri)
    {
        try {
            $sutunlar = "musteriAd, musteriSoyad, email, tel, mesaj, randevuTarihi, saat_id";
            $sutunDegerleri = array($musteri->getAd(), $musteri->getSoyad(), $musteri->getEmail(), $musteri->getTel(),$musteri->getMesaj(), $musteri->getRandevuTarihi(), $musteri->getSaatId());
                    
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            
            $ekle = $conn->prepare("insert into musteri($sutunlar) values(?,?,?,?,?,?,?)");
            $sonuc = $ekle->execute($sutunDegerleri);
            if ($sonuc) {
                $bilgi = '<p style="color: green;">Bilgileriniz kaydedildi en yakın zamanda sizinle irtibata geçeceğiz.</p>';
                echo $bilgi;
                header("refresh:1;url=../musteriekle.php");
            } else {
                $bilgi = '<p style="color: red;">Hata Oluştu: </p>';
                echo $bilgi;
                header("refresh:1;url=../musteriekle.php");
            }
        } catch (Exception $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>'; 
            
        }
        
        //return $bilgi;
    }
    
    function musteriListesi()
    {
        $musteriList = array();
        try {
            if (isset($_SESSION['doktor_id'])) {
                $id = $_SESSION['doktor_id'];
                $sql = "Select *from musteri where doktor_id=$id";
            } else if (isset($_SESSION['admin_id'])) {
                $sql = "Select *from musteri";
            } 
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query($sql);
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            
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
    
    function gecmisMusteriListesi()
    {
        $musteriList = array();
        try {
            if (isset($_SESSION['doktor_id'])) {
                $id = $_SESSION['doktor_id'];
                $sql = "Select *from musteri where doktor_id=$id and CURDATE() > randevuTarihi";
            } else if (isset($_SESSION['admin_id'])) {
                $sql = "Select *from musteri where CURDATE() > randevuTarihi";
            } 
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query($sql);
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            
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
    
    
    function musteriTarihListesi()
    {
        $musteriList = array();
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from musteri where randevuTarihi >= CURDATE()");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            
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
    
    function musteriSil(Musteri $musteri) 
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $delete = $conn->prepare("delete from musteri where id=?");
            $sonuc = $delete->execute(array($musteri->getMusteriId()));
            
            if ($sonuc) { 
                echo $bilgi = '<p style="color: green;">Müşteri Silindi.</p>';
                header("refresh:1;url=../musteriEkle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Hata oluştu.</p>';
            }    
        } catch (Exception $ex) {
            die($ex->message);
        }  finally {
          if ($conn != null) {
              $conn = $baglanti->pdo_sonlandir();
          }
        }
        //return $bilgi;
    }
            
    function randevuOnayla(Musteri $musteri) 
    {
        //echo  $musteri->getMusteriId().' #'.$musteri->getDoktorId().' '.$musteri->getRandevuTarihi().' '.$musteri->getRandevuOnay() ;
        $bilgi = '<p style="color: red;">Bilgiler Günclenmedi</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $guncelle = $conn->prepare("update musteri set randevuTarihi=?, saat_id=?, doktor_id=?, randevuOnay=?, mesaj=? where id=?");
            $sonuc = $guncelle->execute(array($musteri->getRandevuTarihi(), $musteri->getSaatId(), $musteri->getDoktorId(), $musteri->getRandevuOnay(), $musteri->getMesaj(), $musteri->getMusteriId()));
            if ($sonuc) {
            ?>
              <div class="form-signin" style="color: green; background-color: white;">
                     Randevu Onaylandı.
              </div>
            <?php 
                header("refresh:1;url=../musteriekle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Hata Oluştu</p>';
            } 
            //echo $sonuc;
        } catch (Exception $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        //return $bilgi;
    }
}
?>

