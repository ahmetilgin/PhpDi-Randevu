<?php
ob_start(); 
include_once '../include/include_class.php';
$musteriInclude = new IncludeClass();
$musteriInclude->musteriDetay_controller();
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
       
        $maxTarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+30 , date("Y")));
        if (date('l') == 'Sunday') {
            $tarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
        } else {
            $tarih = date('Y-m-d');
        }
    
    ?>
<div class="container">
    <div class="wrapper">
        <?php
        
        if (isset($_POST['musteriId1'])) {
            //echo  $_POST['musteriId1'];  
            $musteri = new MusteriDetay();
            $musteri->setMusteriId($_POST['musteriId1']);
            $musteri->setDoktorId($_POST['doktor']);
            $musteri->setMesaj(trim($_POST['mesaj']));
            $musteri->setRandevuOnay(1);
            $musteri->setYapilanIslem($_POST['yapilanIslem']);
            $musteri->setMuayneDurumu($_POST['muayneDurumu']);
            $musteri->setEskiRandevuTarihi($_POST['tarih']);
            if ($_POST['muayneDurumu'] != "2") {
                $musteri->setSaatId($_POST['saat']);
                $musteri->setRandevuTarihi($_POST['tarih']);
            } else {
                
                $musteri->setSaatId($_POST['ysaat']);
                $musteri->setYapilacakIslem($_POST['yapilacakIslem']);
                $musteri->setRandevuTarihi($_POST['yTarih']);
            }
            $musteridao = new MusteriDetayDAO();
            $musteridao->RandevuTamamalaErtele($musteri);
            $musteridao->MusteriDetayEkle($musteri);
            
        }
        ?>
        <form action="" method="post" class="form-signin">
        <h3 class="form-signin-heading">Müşteri Bilgileri</h3>
        <table class="table">
            <tr>
                <td>Adı</td>
                <td><input class="form-control" name="ad" type="text" value="<?php echo $_POST['ad']; ?>" readonly/>
                <input name="musteriId1" type="number" value="<?php echo $_POST['musteriId']; ?>" style="display: none;" readonly/>
                </td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><input class="form-control" name="soyad" type="text" value="<?php echo $_POST['soyad']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Eposta</td>
                <td><input class="form-control" name="email" type="email" value="<?php echo $_POST['email']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Mesajı</td>
                <td><textarea class="form-control" name="mesaj" readonly><?php echo $_POST['mesaj']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telefonu</td>
                <td><input class="form-control" name="tel" type="tel" value="<?php echo $_POST['tel']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Randevu Tarihi</td>
                <td><input class="form-control" type="date" name="tarih" min="<?= $tarih ?>" max="<?= $maxTarih ?>" value="<?php echo $_POST['tarih']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Saati</td>
                <td>
                    <select name="saat" class="form-control">
                        <option value="<?php echo $_POST['saat']; ?>">
                            <?php
                            $saatdao = new SaatDAO();
                            echo $saatdao->saatIdGoster($_POST['saat']);
                            ?>
                        </option>
                        <?php
                        /*
                        $saatList = $saatdao->saatGoster();
                        foreach ($saatList as $list) {
                            echo '<option value="'.$list->getSaatId().'">'.$list->getSaatAdi().'</option>';
                        }*/
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Doktor</td>
                <td>
                    <select name="doktor" class="form-control" >
                        <?php
                        $doktordao = new DoktorDAO();
                        //$doktorList = $doktordao->DoktorListele();
                        if ($_POST['doktorId'] != null) {
                            echo '<option value="'.$_POST['doktorId'].'">'.$doktordao->DoktorIdGoster($_POST['doktorId']).'</option>';
                        }
                        /*
                        foreach ($doktorList as $list) {
                            echo '<option value="'.$list->getDoktorId().'">'.$list->getAd().' '.$list->getSoyad().'</option>';
                        }*/
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Yapılan İşlem</td>
                <td>
                    <textarea name="yapilanIslem" class="form-control"></textarea>
                </td>
            </tr>
            <tr>
                <td>Muayne Durumu</td>
                <td>
                    <select name="muayneDurumu" id="m" class="form-control">
                        <option value="1">Tamamlandı</option>
                        <option value="2">Ertelendi</option>
                    </select>
                </td>
            </tr>
            <tr id="txt1">
                
            </tr>
            <tr>
                
            </tr>
            <tr id="txt2">
                
            </tr>
            <tr id="txt3">
                
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-lg btn-success" value="Onayla"/></td>
            </tr>
        </table>
        </form>
        <script>
            $('#m').change(select_control);
            function select_control()
            {
                var select = $('#m').val();
                
                if (select == "2") {
                    <?php
                    $saatList = $saatdao->saatGoster();
                        
                    ?>
                    document.getElementById("txt2").innerHTML = '<td>Saati</td><td><select name="ysaat" class="form-control"><?php foreach ($saatList as $list) { echo '<option value="'.$list->getSaatId().'">'.$list->getSaatAdi().'</option>';} ?></select></td>';
                    document.getElementById("txt1").innerHTML = '<td>Yeni Randevu Tarihi</td><td><input type="date" min="<?=$tarih?>" max="<?=$maxTarih?>" name="yTarih" class="form-control"/></td>';
                    document.getElementById("txt3").innerHTML = '<td>Yapılacak İşlem</td><td><textarea  name="yapilacakIslem" class="form-control"></textarea></td>';
                } else {
                    document.getElementById("txt1").innerHTML = "";
                    document.getElementById("txt3").innerHTML = "";
                    document.getElementById("txt2").innerHTML = "";
                }    
            }
        </script>   
    <?php
    
        $header->footer();
    }
    
    ?>
</div>
</div>
</body>
</html>
<?php
}
ob_end_flush();
?>