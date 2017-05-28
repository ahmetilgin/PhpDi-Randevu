<?php
ob_start();
include_once './include/include_class.php';
$index = new IncludeClass();
$index->IncludeAll();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title>Ana Sayfa</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    $bootstrap->login_vb();
    ?>
    <script>
        $(document).ready(function () {
            $('#hclick').click(function () {
                $('#pclick').slideToggle("1000")
            });
        });
    </script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php
    $header = new Header();
    $header->setKey('Ils');
    $header->kokSayfa_header();

    $slider = new Slider();
    echo '<br><br>';
    $slider->sliderOlustur();
    $bootstrap->slider_vb();
    ?>
    <br><br>   
<div class="container">     
    <div id="contact" class="container-fluid bg-grey">
        <h3 class="text-center"><strong>İletişim</strong></h3><br><br>
        <div class="row">
            <div class="col-sm-5">
                <p>Saat 8:00 ile 18:00 arası telefon iletişimine açığız .</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> İstanbul, Türkiye</p>
                <p><span class="glyphicon glyphicon-phone"></span> 0(212) 555 55 55 </p>
                <p><span class="glyphicon glyphicon-envelope"></span> karadenizklinigi@gmail.com</p>	   
            </div>
            <form class="col-sm-7" action="" method="post">
                <?php
                if ($_POST) {
                    $ilt = new Iletisim();
                    $iltdao = new IletisimDAO();
                    $ilt->setAd(trim($_POST['ad']));
                    $ilt->setEmail(trim($_POST['email']));
                    $ilt->setMesaj(trim($_POST['mesaj']));
                    $iltdao->IletisimEkle($ilt);
                }
                ?>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" type="text"   name="ad" placeholder="Adınız.." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Eposta Adresiniz..." type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="mesaj" placeholder="Mesajınız..." rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-success pull-right" type="submit">Gönder</button>
                    </div>
                </div>


            </form>



        </div>        
    </div>
</div>
<?php
if (isset($_SESSION['admin_id'])) {
?>
<br><br>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading" id="hclick"><center>Mesaj Listesi</center></div>
            <div class="panel-body" id="pclick" style="display: none;">

                <div id="contact" class="container-fluid bg-grey">

                    <div class="row">
                        <?php
                        $iltdao = new IletisimDAO();
                        $mesajlist = $iltdao->MesajList();
                        foreach ($mesajlist as $list) {
                            ?>   
                            <form class="col-sm-7" action="controller/mesajSil_controller.php" method="post">

                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <input class="form-control" type="text" value="<?= $list->getAd() ?>"  name="ad" readonly/>
                                        <input class="form-control" type="text" value="<?= $list->getIletisimId() ?>"  name="id" style="display: none;" readonly/>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input class="form-control" id="email" name="email" value="<?= $list->getEmail() ?>" type="email" readonly/>
                                    </div>
                                </div>
                                <textarea class="form-control" id="comments" name="mesaj" placeholder="Mesajınız..." rows="5" readonly><?= $list->getMesaj() ?></textarea><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-danger pull-right" type="submit">Sil</button>
                                    </div>
                                </div>
                                <hr>

                            </form>

                        <?php } ?>  

                    </div>        
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>
<br><br>
<?php
$header->footer();
?>
</body>
</html>
<?php
ob_end_flush();
?>