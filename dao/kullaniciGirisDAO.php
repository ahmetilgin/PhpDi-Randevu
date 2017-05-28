<?php
/*
include_once '../veritabani/veritabaniAyar.php';
include_once '../dao/kullaniciGirisDAO.php';
include_once '../model/kullanici_giris.php';
 */
class KullaniciGirisDAO
{
    function KullaniciEkle(KullaniciGiris $kulgiris)
    {
        //$bilgi = '<p style="color: red;">Profil Oluşturulmadı</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare("insert into kullanicigiris (email, sifre, yetki_id) values(?,?,?)");
            $sonuc = $ekle->execute(array($kulgiris->getEmail(),$kulgiris->getSifre(),$kulgiris->getYetkiId()));
            if ($sonuc) {
                echo $bilgi = '<p style="color: green;">Profil Oluşturuldu</p>';
                header("refresh:1;url=../doktorekle.php");
            } else {
                echo $bilgi = '<p style="color: red;">Profil Oluşturulmadı.</p>';
            }
        } catch (PDOException $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu:'.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        
        
    }
    
    function ResimEkle(KullaniciGiris $kulgiris)
    {
        //$bilgi = '<p style="color: red;">Profil Oluşturulmadı</p>';
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $ekle = $conn->prepare("update kullanicigiris set resim=? where email=? ");
            $sonuc = $ekle->execute(array($kulgiris->getResim(), $kulgiris->getEmail()));
            if ($sonuc) {
                echo $bilgi = '<p style="color: green;">Resim yüklendi</p>';
                header("refresh:1;url=profilGoruntule.php");
            } else {
                echo $bilgi = '<p style="color: red;">Resim yüklenmedi.</p>';
            }
        } catch (PDOException $ex) {
            echo $bilgi = '<p style="color: red;">Hata Oluştu:'.$ex->getMessage().'</p>';
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        
        //return $bilgi;
    }
   
    function LoginKontrol(KullaniciGiris $kul)
    {
        
        try {
            $eposta = $kul->getEmail();
            $sifre = $kul->getSifre();
            
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from kullanicigiris where email='$eposta' and sifre='$sifre' and yetki_id=0 ");
            $sonuc = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($sonuc) {
                $doktordao = new DoktorDAO();
                $id = $doktordao->DoktorIdBul($sonuc->email);
                if (isset($_SESSION['yetki'])) {
                    unset($_SESSION['yetki']);
                    unset($_SESSION['doktor_id']);
                    unset($_SESSION['admin_id']);
                    unset($_SESSION['email']);
                }
                
                $_SESSION['yetki'] = $sonuc->yetki_id;
                $_SESSION['doktor_id'] = $id;
                $_SESSION['email'] = $eposta;
                
             
                //echo '<p style="color: green;">Giriş Başarılı</p>';
                header("Location:doktor.php");
            }
            else {
?>
                  <div class="form-signin alert alert-danger" style="background-color: pink;">
                     Geçersiz email veya şifre girdiniz.
                  </div>
<?php
            }
            /*
            foreach ($rows as $row) {
                echo $row->sifre.' '.$row->email.' '.$row->yetki_id.'<br>';
            }*/
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        
        
    }
    
    function AdminLoginKontrol(KullaniciGiris $kul)
    {
        //$email = "ufukpalavar52@gmail.com";
        try {
            $eposta = $kul->getEmail();
            $sifre = $kul->getSifre();
            //$eposta = "ufukpalavar52@gmail.com";
            $sifre = "b62b090624daf9bd41c51d545dbde330";
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from kullanicigiris where email='$eposta' and sifre='$sifre' and yetki_id=1 ");
            $sonuc = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($sonuc) {
                $admindao = new adminDAO();
                $id = $admindao->AdminIdBul($sonuc->email);
                if (isset($_SESSION['yetki'])) {
                    unset($_SESSION['yetki']);
                    unset($_SESSION['doktor_id']);
                    unset($_SESSION['admin_id']);
                    unset($_SESSION['email']);
                }
                
                $_SESSION['yetki'] = $sonuc->yetki_id;
                $_SESSION['admin_id'] = $id;
                $_SESSION['email'] = $eposta;
                
             
                //echo '<p style="color: green;">Giriş Başarılı</p>';
                header("Location:admin.php");
            }
            else {
?>
              <div class="form-signin alert alert-danger" style="background-color: pink;">
                     Geçersiz email veya şifre girdiniz.
             </div>
<?php
            }
           
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        
        
    }
            
    function sifreleme($sifre)
    {
        $yenisifre = md5(sha1(md5($sifre)));
        
        return $yenisifre;
    }
    
    function profilKontrol($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select *from kullanicigiris where email='$email'");
            $sonuc = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($sonuc) {
                return 1; 
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
    }
    
    function profilResimGoster($email)
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select resim from kullanicigiris where email='$email'");
            $sonuc = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($sonuc) {
                return $sonuc->resim; 
            } else {
                return null;
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
    }
    
    function DoktorGoster()
    {
        $kulList = array();
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query("Select resim ,email from kullanicigiris where yetki_id=0");
            $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);
            foreach ($rows as $row) {
                $kul = new KullaniciGiris();
                $kul->setEmail($row->email);
                $kul->setResim($row->resim);
                array_push($kulList, $kul);
            }
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        
        return $kulList;
    }
    
    
    
    function profilBilgileri()
    {
        //$profilList = array();
    
        try {
            
            if (!empty($_SESSION['doktor_id'])) {
                $profil = new Doktor();
                $d = 0;
                $id = $_SESSION['doktor_id'];
                $sql="Select *from doktor where id='$id'";
            } else if (!empty ($_SESSION['admin_id'])) {
                $profil = new Admin();
                $d = 1;
                $id = $_SESSION['admin_id'];
                $sql="Select *from admin where id='$id'";
            }
            $profil = new Doktor();
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $sorgu = $conn->query($sql);
            $sonuc = $sorgu->fetch(PDO::FETCH_LAZY);
            if ($sonuc) {
                $profil->setAd($sonuc->ad);
                $profil->setSoyad($sonuc->soyad);
                $profil->setEmail($sonuc->email);
                $profil->setTel($sonuc->tel);
                $profil->setDogumTarihi($sonuc->dogumTarihi);
                
                if (isset($_SESSION['admin_id'])) {
                    $profil->setUsername($sonuc->username);
                }
            } else {
                echo 'Verilere Ulaşılmadı'; 
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        return $profil;
    }
    
    function profilGuncelle($kul)
    {
        try {
            
            if (isset($_SESSION['doktor_id'])) {
                $id = $_SESSION['doktor_id'];
                $sql="update doktor set ad=?, soyad=?, dogumTarihi=?, tel=? where id=?";
                $sql_update = array($kul->getAd(), $kul->getSoyad(), $kul->getDogumTarihi(), $kul->getTel(), $kul->getDoktorId());
            } else if (isset($_SESSION['admin_id'])) {
                
                $id = $_SESSION['admin_id'];
                $sql="update admin set ad=?, soyad=?, dogumTarihi=?, tel=? where id=?";
                $sql_update = array($kul->getAd(), $kul->getSoyad(), $kul->getDogumTarihi(), $kul->getTel(), $kul->getAdminId());
            }
            $profil = new Doktor();
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $update = $conn->prepare($sql);
            $sonuc = $update->execute($sql_update);
            if ($sonuc) {
                echo '<p style="color: green;">Bilgileriniz Güncellendi</p>';
                header("refresh:1;url=profilGoruntule.php");
            } else {
                echo '<p style="color: red;">Bilgiler Güncellenmedi</p>'; 
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        } finally {
            if ($conn != null) {
                $conn = $baglanti->pdo_sonlandir();
            }  
        }
        return $profil;
    }
    
    function sifreGuncelle(KullaniciGiris $kul) 
    {
        try {
            $baglanti = new VeriTabaniBaglanti();
            $conn = $baglanti->pdo_baglanti();
            $update = $conn->prepare("update kullanicigiris set sifre=? where email=?");
            $sonuc = $update->execute(array($kul->getSifre(), $kul->getEmail()));
            if ($sonuc) {
                echo '<center><p style="color:green;">Şifreniz Güncellendi</p></center>';
                header("refresh:2;url=profilGoruntule.php");
            } else {
                echo '<center><p style="color: red;">Şifreniz Güncellenemedi</p></center>';
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
/*
$k = new KullaniciGirisDAO();
$k->LoginKontrol();*/

?>
