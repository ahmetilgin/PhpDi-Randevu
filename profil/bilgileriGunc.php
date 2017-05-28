<?php
ob_start();
include_once '../include/include_class.php';
$profilInclude = new IncludeClass();
$profilInclude->profilGoruntule();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Profil Güncelle</title>
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
    <div class = "container">
    <div class="wrapper">
        <?php
        if ($_POST) {
            $kulgirisdao = new KullaniciGirisDAO();
            if (isset($_SESSION['doktor_id'])) {
                $doktor = new Doktor();
                $doktor->setAd(trim($_POST['ad']));
                $doktor->setSoyad(trim($_POST['soyad']));
                $doktor->setDogumTarihi(trim($_POST['dogumTarihi']));
                $doktor->setTel(trim($_POST['tel']));
                $doktor->setDoktorId($_SESSION['doktor_id']);
        ?>
        <div class="form-signin" style="background-color: pink;">
                <?php $kuldao->profilGuncelle($doktor); ?>
        </div>
        <?php
                
            } else if (isset($_SESSION['admin_id'])) {
                $admin = new Admin();
                $admin->setAd(trim($_POST['ad']));
                $admin->setSoyad(trim($_POST['soyad']));
                $admin->setDogumTarihi(trim($_POST['dogumTarihi']));
                $admin->setTel(trim($_POST['tel']));
                $admin->setAdminId($_SESSION['admin_id']);
        ?>
        <div class="form-signin" style="background-color: pink;">
                <?php $kuldao->profilGuncelle($admin); ?>
        </div>
        <?php
            }
        }
        ?>
        <form  class="form-signin" method="post">       
            <h3 class="form-signin-heading">Doktor Ekleme</h3>
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
                    <td ><label>Adı</label></td>
                    <td><input type="text" name="ad" class="form-control" value="<?= $profil->getAd() ?>" /></td> 
                </tr>
                <tr>
                    <td><label>Soyadı</label></td>
                    <td><input type="text" class="form-control" name="soyad" value="<?= $profil->getSoyad() ?>"/></td>
                </tr>
                <tr>
                    <td><label>Doğum Tarihi</label></td>
                    <td><input type="date" name="dogumTarihi" min="<?=$mintarih?>" max="<?=$maxtarih?>" class="form-control" value="<?= $profil->getDogumTarihi() ?>"/></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="email" class="form-control" value="<?= $profil->getEmail() ?>" readonly/></td>
                    
                </tr>
                <tr>
                    <td><label>Telefonu</label></td>
                    <td><input type="tel" name="tel" class="form-control" value="<?= $profil->getTel() ?>"/></td>
                </tr>
                <tr>
                    <td><button type="reset" class="btn btn-default">Varsayılan</button></td>
                    <td><button type="submit" class="btn btn-primary">Güncelle</button></td>
                    
                </tr>
                <tr>
                    
                </tr>
            </table>
        </form>
        
    </div>
</div>
    <?php
    $header->footer();
    ?>
</body>
</html>
<?php
ob_end_flush();
?>