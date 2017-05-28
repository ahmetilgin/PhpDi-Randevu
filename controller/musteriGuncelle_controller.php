<?php
ob_start(); 
include_once '../include/include_class.php';
$musteriInclude = new IncludeClass();
$musteriInclude->musteriGuncelle_controller();
if (isset($_SESSION['admin_id'])) {
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Müşteri Güncelle</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->controller_vb();
    $bootstrap->setDizi('../');
    $bootstrap->login_vb();
    ?>
</head>
<body>
    <?php
    if ($_POST) {
        $header = new Header();
        $header->setDizin('../');
        $header->kokSayfa_header();
       
        $maxTarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+15 , date("Y")));
        if (date('l') == 'Sunday') {
            $tarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
        } else {
            $tarih = date('Y-m-d');
        }
    
    ?>
<div class="container">
    <div class="wrapper">
        <form action="" method="post" class="form-signin">
        <h3 class="form-signin-heading">Müşteri Bilgileri</h3>
        <table class="table">
            <tr>
                <td>Adı</td>
                <td><input name="ad" type="text" value="<?php echo $_POST['ad']; ?>" readonly/>
                <input name="musteriId1" type="number" value="<?php echo $_POST['musteriId']; ?>" style="display: none;" readonly/>
                </td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><input name="soyad" type="text" value="<?php echo $_POST['soyad']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Eposta</td>
                <td><input name="email" type="email" value="<?php echo $_POST['email']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Mesajı</td>
                <td><textarea name="mesaj"><?php echo $_POST['mesaj']; ?> </textarea></td>
            </tr>
            <tr>
                <td>Telefonu</td>
                <td><input name="tel" type="tel" value="<?php echo $_POST['tel']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Randevu Tarihi</td>
                <td><input type="date" name="tarih" min="<?= $tarih ?>" max="<?= $maxTarih ?>" value="<?php echo $_POST['tarih']; ?>" /></td>
            </tr>
            <tr>
                <td>Saati</td>
                <td>
                    <select name="saat">
                        <option value="<?php echo $_POST['saat']; ?>">
                            <?php
                            $saatdao = new SaatDAO();
                            echo $saatdao->saatIdGoster($_POST['saat']);
                            ?>
                        </option>
                        <?php
                        $saatList = $saatdao->saatGoster();
                        foreach ($saatList as $list) {
                            echo '<option value="'.$list->getSaatId().'">'.$list->getSaatAdi().'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Doktor</td>
                <td>
                    <select name="doktor">
                        <?php
                        $doktordao = new DoktorDAO();
                        $doktorList = $doktordao->DoktorListele();
                        if ($_POST['doktorId'] != null) {
                            echo '<option value="'.$_POST['doktorId'].'">'.$doktordao->DoktorIdGoster($_POST['doktorId']).'</option>';
                        }
                        foreach ($doktorList as $list) {
                            echo '<option value="'.$list->getDoktorId().'">'.$list->getAd().' '.$list->getSoyad().'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Randevuyu Onayla"></td>
            </tr>
        </table>
        </form>
    
    <?php
        if (isset($_POST['musteriId1'])) {
            //echo  $_POST['musteriId1'];  
            $musteri = new Musteri();
            $musteri->setMusteriId($_POST['musteriId1']);
            $musteri->setDoktorId($_POST['doktor']);
            $musteri->setRandevuTarihi($_POST['tarih']);
            $musteri->setSaatId($_POST['saat']);
            $musteri->setMesaj(trim($_POST['mesaj']));
            $musteri->setRandevuOnay(1);
            $musteridao = new MusteriDAO();
            $musteridao->randevuOnayla($musteri);
            
        }
    }
    $header->footer();
    ?>
</div>
</div>
</body>
</html>
<?php 
}
ob_end_flush();
?>