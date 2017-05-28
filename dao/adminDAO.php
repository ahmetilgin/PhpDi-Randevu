<?php
class AdminDAO
{
    function AdminEkle(Admin $admin)
    {
        try {
            $sorgu = "insert into admin (username, ad, soyad, email, tel, dogumTarihi) values(?,?,?,?,?,?)";
            $admindeger = array($admin->getUsername(), $admin->getAd(), $admin->getSoyad(), $admin->getEmail(), $admin->getTel(), $admin->getDogumTarihi()); 
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare($sorgu);
            $sonuc = $ekle->execute($admindeger);
            if ($sonuc) {
                $kul = new KullaniciGiris();
                $kuldao = new KullaniciGirisDAO();
                $sifre = $admin->getAd().$admin->getSoyad();
                $yeniSifre = $kuldao->sifreleme($sifre);
                $kul->setEmail($admin->getEmail());
                $kul->setSifre($yeniSifre);
                $kul->setYetkiId(1);
                echo '<p style="color: green;">Veriler Eklendi</p>';
                echo $kuldao->KullaniciEkle($kul);
            } else {
                echo '<p style="color: red;">Hata Oluştu</p>';
            }
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function AdminIdBul($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select id from admin where email='$email'");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $id = $row->id;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        return $id;
    }
    
    function AdminAdBul($id)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select ad, soyad from admin where id=$id");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            $ad_soyad = $row->ad.' '.$row->soyad;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        return $ad_soyad;
    }
    
    function AdminEamilKontrol($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select id from admin where email='$email'");
            $row = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($row) {
                $k = 1;
            } else {
                $k = 0;
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        return $k;
    }
}
?>
