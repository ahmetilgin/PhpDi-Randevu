<?php
class MusteriDetayDAO
{
    function MusteriDetayEkle(MusteriDetay $musteri)
    {
        try {
            $sql = "insert into musteri_detay (musteri_id, randevu_tarihi, saat_id, doktor_id, yapilan_islem, yapilacak_islem, muayneDurumu) values(?,?,?,?,?,?,?)";
            $musteriDetay = array($musteri->getMusteriId(), $musteri->getEskiRandevuTarihi(), $musteri->getSaatId(), $musteri->getDoktorId(), $musteri->getYapilanIslem(), $musteri->getYapilacakIslem(), $musteri->getMuayneDurumu());
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare($sql);
            $sonuc = $ekle->execute($musteriDetay);
            if ($sonuc) {
?>
             <div class="form-signin" style="color: green; background-color: white;">
                  Randevu <?php if ($musteri->getMuayneDurumu() == '1') { echo "Tamalandı";} else { echo "ileri tarihe ertelendi"; } ?>.
                  <?php  header("refresh:3;url=../gunler/doktorMusteriGun.php"); ?>   
              </div>  
<?php            
            } else {
                echo $bilgi = '<div class="form-signin" style="color: red; background-color: pink;"><p style="color: red;">Hata Oluştu</p></div>';
            }
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }    
        }
    }
    
    function RandevuTamamalaErtele(MusteriDetay $musteri) 
    {
        
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $guncelle = $conn->prepare("update musteri set randevuTarihi=?, saat_id=?, doktor_id=?, randevuOnay=?, mesaj=? where id=?");
            $sonuc = $guncelle->execute(array($musteri->getRandevuTarihi(), $musteri->getSaatId(), $musteri->getDoktorId(), $musteri->getRandevuOnay(), $musteri->getMesaj(), $musteri->getMusteriId()));
            if ($sonuc) {
            ?>
              <div class="form-signin" style="color: green; background-color: white;">
                  Randevu  Güncellendi.
              </div>
            <?php 
                //header("refresh:1;url=../musteriekle.php");
            } else {
                echo $bilgi = '<div class="form-signin" style="color: red; background-color: pink;"><p style="color: red;">Hata Oluştu</p></div>';
            } 
            
        } catch (Exception $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
    }
}
?>
