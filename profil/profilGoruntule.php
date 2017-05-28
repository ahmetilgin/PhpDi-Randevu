<?php
include_once '../include/include_class.php';
$profilInclude = new IncludeClass();
$profilInclude->profilGoruntule();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Profil Bilgileri</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->setDizi('../');
    $bootstrap->controller_vb();
    $bootstrap->login_vb();
    ?>
</head>
<body>
<?php
$header = new Header();
$header->setDizin('../');
$header->kokSayfa_header();
$maxtarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y") - 21));
$mintarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y") - 70));

$kuldao = new KullaniciGirisDAO();
$profil = $kuldao->profilBilgileri();

?>
    <?php
    
    
    ?>
    <div class = "container">
    <div class="wrapper">
        <div  class="form-signin" method="post">
        <?php
                $kuldao = new KullaniciGirisDAO;
                $resim = $kuldao->profilResimGoster($_SESSION['email']);
                if ($resim != null) {
                    $resimyolu = "../".$resim;
                    
                } else {
                    $resimyolu = "../dist/resimler/bos-resim/bos-profil.png";
                    
                }
            ?>
            <h3 class="form-signin-heading"><img src="<?= $resimyolu ?>" class="img-rounded" style="width: 120px; height: 120px;"/></h3>
            <h3 class="form-signin-heading">Profil Bilgileri</h3>
            <hr class="colorgraph"><br>
            <table class="table" >
                <?php
                if(isset($_SESSION['admin_id'])) {
                ?>
                <tr>
                    <td>Kullanıcı Adı</td>
                    <td><input type="text" class="form-control" value="<?= $profil->getUsername() ?>" readonly/></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td><label>Adı</label></td>
                    <td><input type="text" name="ad" class="form-control" value="<?= $profil->getAd() ?>" readonly/></td> 
                </tr>
                <tr>
                    <td><label>Soyadı</label></td>
                    <td><input type="text" class="form-control" name="soyad" value="<?= $profil->getSoyad() ?>" readonly/></td>
                </tr>
                <tr>
                    <td><label>Doğum Tarihi</label></td>
                    <td><input type="date" name="dogumTarihi" min="<?=$mintarih?>" max="<?=$maxtarih?>" class="form-control" value="<?= $profil->getDogumTarihi() ?>" readonly/></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="email" class="form-control" value="<?= $profil->getEmail() ?>" readonly/></td>
                    
                </tr>
                <tr>
                    <td><label>Telefonu</label></td>
                    <td><input type="tel" name="tel" class="form-control" value="<?= $profil->getTel() ?>" readonly/></td>
                </tr>
                <tr>
                    <td><button  class="btn btn-primary"><a href="bilgileriGunc.php" style="color: white;text-decoration: none;">Bilgilerimi Güncelle</a></button></td>
                    <td><button class="btn btn-link"><a href="sifreDegistir.php" >Şifremi Değiştir</a></button></td>
                    
                </tr>
                <tr>
                    
                </tr>
            </table>
        </div>
        
    </div>
</div>
<?php 
        
$header->footer();
?>    
</body>
</html>
