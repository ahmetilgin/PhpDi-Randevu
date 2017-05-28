<?php
include_once '../include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->doktorMusteri_controller();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Doktor Müşteri</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->controller_vb();
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
    if ($_POST) {
        $header = new Header();
        $header->kokSayfa_header();

        $doktor = new Doktor();
        $doktor->setDoktorId(trim($_POST['id']));
        $doktordao = new DoktorDAO();
        $musteriList = $doktordao->DoktorMusteri($doktor);
        ?>
    <div class="container">
        <div class="panel-group">        
            <div class="panel panel-primary">
                <div class="panel-heading" id="hclick" ><center>Randevu Listesi</center></div>
                <div class="panel-body" id="pclick" style="display: none;">

                    <table class="table table-striped table-hover table-responsive">
                        <tr>
                            <th>Adı</th>
                            <th>Soyadı</th>
                            <th>Telefonu</th>
                            <th>Eposta</th>
                            <th>Randevu Tarihi</th>
                            <th>Saati</th>
                        </tr>
    <?php
    foreach ($musteriList as $list) {
        ?>
                            <tr>
                                <td><?php echo $list->getAd(); ?></td>
                                <td><?php echo $list->getSoyad(); ?></td>
                                <td><?php echo $list->getTel(); ?></td>
                                <td><?php echo $list->getEmail(); ?></td>
                                <td><?php echo $list->getRandevuTarihi(); ?></td>
                                <td>
        <?php
        $saatdao = new SaatDAO();
        echo $saatdao->saatIdGoster($list->getSaatId());
        ?>
                                </td>
                            </tr>
        <?php
    }
    ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
$header->footer();
?>
</body>
</html>
