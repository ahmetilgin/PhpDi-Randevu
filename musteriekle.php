<?php
include_once './include/include_class.php';
$musteriInclude = new IncludeClass();
$musteriInclude->musteriEkle_include();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Randevu Al</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    $bootstrap->login_vb();
    ?>
    <script>
        $(document).ready(function () {
            $("#hclick").click(function () {
                $("#pclick").slideToggle("slow");
            });
        });
    </script>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Onl');
    $header->kokSayfa_header();
    
    $slider = new Slider();
    echo '<br><br>';
    $slider->sliderOlustur();
    $bootstrap->slider_vb();
    ?>

    <?php
    $maxTarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 15, date("Y")));
    if (date('l') == 'Sunday') {
        $tarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
    } else {
        $tarih = date('Y-m-d');
    }
    ?>
<div class="container">
    <div class="wrapper">


        <form action="controller/musteriEkle_controller.php" method="post" class="form-signin">
            <h3 class="form-signin-heading">Online Randevu</h3>
            <table class="table">
                <tr>
                    <td><label>Adınız</label></td>
                    <td><input type="text" name="ad" class="form-control" required autofocus/></td>
                </tr>

                <tr>
                    <td><label>Soyadınız</label></td>
                    <td><input type="text" name="soyad" class="form-control" required autofocus/></td>
                </tr>
                <br>
                <tr>
                    <td><label>Eposta</label></td>
                    <td><input type="email" name="email" class="form-control" required/></td>
                </tr>

                <tr>
                    <td><label>Telefonunuz</label></td>
                    <td><input type="tel" name="tel" class="form-control" required autofocus/></td>
                </tr>

                <tr>
                    <td><label>Randevu Tarihi</label></td>
                    <td><input type="date" class="form-control" name="randevuTarihi" min="<?php echo $tarih; ?>" max="<?php echo $maxTarih; ?>" required autofocus/></td>
                </tr>
                <tr>
                    <td><label>Saat</label></td>
                    <td>
                        <select name="saat" class="form-control">
                            <?php
                            $saatdao = new SaatDAO();
                            $saatList = $saatdao->saatGoster();
                            foreach ($saatList as $list) {
                                echo '<option value="' . $list->getSaatId() . '">' . $list->getSaatAdi() . '</option>';
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Mesajınız</label></td>
                    <td><textarea name="mesaj"  class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                <input type="Reset" value="Temizle" class="btn btn-default"/> 
                <input type="submit" value="Randevu Al" class="btn btn-primary"/>
                </td>
                </tr>
            </table>
        </form>
    </div>
</div>        
<br>
<?php if (!empty($_SESSION['admin_id'])) { ?>
<div class="container">
    <div class="panel-group">        
        <div class="panel panel-primary">
            <div class="panel-heading" id="hclick" ><center>Müşteri Listesi</center></div>
            <div class="panel-body" id="pclick" style="display: none;">
                <table class="table">

                    <tr>
                        <th>Müşteri Adı</th>
                        <th>Müşteri Soyadı</th>
                        <th>Eposta</th>
                        <th>Telefonu</th>
                        <th>Randevu Tarihi</th>
                        <th><center>Randevu Saati</center></th>

                    <th>Doktor</th>
                    <th colspan="2"><center>İşlemler</center></th>
                    </tr>

                    <?php
                    $musteridao = new MusteriDAO();
                    $musteriList = $musteridao->musteriTarihListesi();
                    foreach ($musteriList as $list) {
                        ?>
                        <tr>
                            <td><?php echo $list->getAd(); ?></td>
                            <td><?php echo $list->getSoyad(); ?></td>
                            <td><?php echo $list->getEmail(); ?></td>
                            <td><?php echo $list->getTel(); ?></td>
                            <td><?php echo $list->getRandevuTarihi(); ?></td>
                            <td>
                                <?php
                                $saatdao = new SaatDAO();
                                echo $saatdao->saatIdGoster($list->getSaatId());
                                ?>
                            </td>

                            <td>
                                <?php
                                if ($list->getDoktorId() == null) {
                                    echo "Atanmadı";
                                } else {
                                    $doktordao = new DoktorDAO();
                                    echo $doktordao->DoktorIdGoster($list->getDoktorId());
                                }
                                ?>
                            </td>
                            <td>
                                <form action="controller/musteriGuncelle_controller.php" method="post">
                                    <input type="text" value="<?php echo $list->getAd(); ?>" name="ad" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getSoyad(); ?>" name="soyad" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getMusteriId(); ?>" name="musteriId" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getTel(); ?>" name="tel" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getEmail(); ?>" name="email" style="display: none;"/>
                                    <input  value="<?php echo $list->getMesaj(); ?>" name="mesaj" style="display: none;"/>
                                    <input type="date" value="<?php echo $list->getRandevuTarihi(); ?>" name="tarih" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getSaatId(); ?>" name="saat" style="display: none;"/>
                                    <input type="text" value="<?php echo $list->getDoktorId(); ?>" name="doktorId" style="display: none;"/>
                                    <button type="submit" title="Güncelle/Doktor Ata" class="btn btn-primary glyphicon glyphicon-transfer"></button>
                                </form>
                                
                                
                            </td>
                            <td>
                                </form>
                                <form action="controller/musteriSil_controller.php" method="post">
                                    <input type="number" value="<?php echo $list->getMusteriId(); ?>" name="musteriId" style="display: none;"/>
                                    <button type="submit" title="Sil"  class="btn btn-danger glyphicon glyphicon-trash"></button>
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                    //echo date('Y-m-d');
                    //echo ''.date('l'). ' '.date('w');
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
$header->footer();
?>        

</body>
</html>
