<?php
include_once '../include/include_class.php';
$include = new IncludeClass();
$include->gunler();
if (isset($_SESSION['admin_id']) || isset($_SESSION['doktor_id'])) {
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
    <title>Geçmiş Randevular</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->setDizi('../');
    $bootstrap->controller_vb();
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setDizin('../');
    $header->kokSayfa_header();
    
    $panel = new PanelInclude();
    $panel->setPath('../');
    if (isset($_SESSION['doktor_id'])) {
        $panel->doktorInclude();
    } else {
        $panel->adminInclude();
    }
    ?>
    <br><br><br>
    <div class="container">
    <div class="panel-group">        
        <div class="panel panel-primary">
            <div class="panel-heading" id="hclick" ><center>Müşteri Listesi</center></div>
            <div class="panel-body" id="pclick" >
                <table class="table">

                    <tr>
                        <th>Müşteri Adı</th>
                        <th>Müşteri Soyadı</th>
                        <th>Eposta</th>
                        <th>Telefonu</th>
                        <th>Randevu Tarihi</th>
                        <th>Randevu Saati</th>

                    <th>Doktor</th>
                    
                    </tr>

                    <?php
                    $musteridao = new MusteriDAO();
                    $musteriList = $musteridao->gecmisMusteriListesi();
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
    $header->footer();
    ?>
</body>
</html>
<?php } ?>