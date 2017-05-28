<?php
class DoktorDAO
{
    function DoktoEkle(Doktor $doktor)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare("insert into doktor (ad, soyad, dogumTarihi, tel, email) values(?,?,?,?,?)");
            $durum = $ekle->execute(array($doktor->getAd(), $doktor->getSoyad(), $doktor->getDogumTarihi(), $doktor->getTel(), $doktor->getEmail()));
            
            if ($durum) {
                echo $sonuc = '<p style="color: green; ">Kayıt Eklendi</p>';
                header("refresh:1;url=../doktorekle.php");
            } else {
                echo $sonuc = '<p style="color: red; ">Hata Oluştu</p>';
            }
        } catch (PDOException $ex) {
            echo $sonuc = '<p style="color: red; ">Kayıt Eklenmedi:'.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        //return $sonuc;
        
    }
    
    function DoktorListele()
    {
        
        $doktorList = array();
        
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from doktor");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            
            foreach ($rows as $row) {
                $doktor = new Doktor();
                $doktor->setDoktorId($row->id);
                $doktor->setAd($row->ad);
                $doktor->setSoyad($row->soyad);
                $doktor->setDogumTarihi($row->dogumTarihi);
                $doktor->setEmail($row->email);
                $doktor->setTel($row->tel);
                array_push($doktorList, $doktor);
            }
        } catch (PDOException $ex) {
            echo '<p style="color: red;">Bağlantı Kurulamadı</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        return $doktorList;
    }
    
    function DoktorIdGoster($id)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select ad, soyad from doktor where id=$id");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $ad_soyad = $row->ad.' '.$row->soyad;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        return $ad_soyad;
    }
    
    function DoktorIdBul($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select id from doktor where email='$email'");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $id = $row->id;
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        return $id;
    }
    
    function DoktorAdBul($id)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select ad, soyad from doktor where id=$id");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $ad_soyad = $row->ad.' '.$row->soyad;
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        return $ad_soyad;
    }
    
    function DoktorEmailAdBul($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select ad, soyad from doktor where email='$email'");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $ad_soyad = $row->ad.' '.$row->soyad;
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        return $ad_soyad;
    }
    
    function DoktorEmailKontrol($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select id from doktor where email='$email'");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($row) {
                $k = 1;
            } else {
                 $k = 0;
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        
        return $k;
    }
            
    function DoktorGuncelle(Doktor $doktor)
    {
        $bilgi = '<p style="color: red;">Bilgiler Günclenmedi</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $guncelle = $conn->prepare("update doktor set ad=?, soyad=?, email=?, tel=?, dogumTarihi=? where id=?");
            $sonuc = $guncelle->execute(array($doktor->getAd(),$doktor->getSoyad(),$doktor->getEmail(),$doktor->getTel(),$doktor->getDogumTarihi(),$doktor->getDoktorId()));
            if ($sonuc) {
                echo $bilgi = '<p style="color: green;">Bilgiler Güncellendi</p>';
                header("refresh:1;url=../doktorekle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Hata Oluştu</p>';
            }
        } catch (Exception $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        //return $bilgi;
    }
    
    function DoktorSil(Doktor $doktor) 
    {
        
        $bilgi = '<p style="color: red;">Veriler Silinmedi</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sil = $conn->prepare("delete from doktor where id=?");
            $sonuc = $sil->execute(array($doktor->getDoktorId()));
            if ($sonuc) {
                echo $bilgi = '<p style="color: green;">Veriler Silindi</p>';
                header("refresh:1;url=../doktorekle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Veriler Silinemedi.</p>';
            }   
        } catch (Exception $ex) {
            $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        return $bilgi;
    }
    
    function DoktorProfilSil(Doktor $doktor) 
    {
        
        $bilgi = '<p style="color: red;">Veriler Silinmedi</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sil = $conn->prepare("delete d, k from doktor as d,kullanicigiris as k where d.id=? and d.email=? and k.email=d.email");
            $sonuc = $sil->execute(array($doktor->getDoktorId(), $doktor->getEmail()));
            if ($sonuc) {
                echo $bilgi = '<p style="color: green;">Veriler Silindi</p>';
                header("refresh:1;url=../doktorekle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Veriler Silinemedi.</p>';
            }   
        } catch (Exception $ex) {
            $bilgi = '<p style="color: red;">Hata Oluştu: '.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }
        }
        return $bilgi;
    }
    
    function DoktorMusteri(Doktor $doktor) 
    {
        $id = $doktor->getDoktorId();
        $musteriList = array();
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from musteri where doktor_id=$id and randevuOnay=1");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            foreach ($rows as $row) {
                $musteri = new Musteri();
                $musteri->setAd($row->musteriAd);
                $musteri->setSoyad($row->musteriSoyad);
                $musteri->setRandevuTarihi($row->randevuTarihi);
                $musteri->setSaatId($row->saat_id);
                $musteri->setEmail($row->email);
                $musteri->setTel($row->tel);
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

