<?php
include_once '../include/include_class.php';
$gunlerInclude = new IncludeClass();
$gunlerInclude->gunler();


if (!empty($_SESSION['doktor_id'])) {

?>
<!DOCTYPE html>


<html>
<head>
    <meta charset="UTF-8">
    <title>Müşteri Listesi</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->controller_vb();
    ?>
</head>
<body>
    <?php
    $header = new Header();
    //$header->setKey('Dok');
    $header->setDizin('../');
    $header->kokSayfa_header();
    $panel = new PanelInclude();
    $panel->setPath('../');
    $panel->doktorInclude();
    echo '<br/><br/><br/>';
    for ($i = 0; $i < 7; $i++)
    {
        $tarih = date("Y-m-d", mktime(0,0,0,date("m"),date("d")+$i,date("Y")));
        $tarihdao = new TarihDAO();
        $musteriList = $tarihdao->MusteriDoktorGunGoster($tarih,$_SESSION['doktor_id']);
    ?>
       
<div class="container">
    <div class="panel-group">        
        <div class="panel panel-primary">
            <div class="panel-heading"  id="b<?php echo $i;?>" style="background-color: #ff0906;" ><center><a  style="color: white;text-decoration: none;"><h2><?php echo $gunAd = $tarihdao->Gunler($tarih); ?></a></h2></center></div>
            
            <div class="panel-body" id="t<?php echo $i;?>" style="display: none;">
    <?php
    if (empty($musteriList)) {
       echo '<p style="color: red;">'.$gunAd.' günü için hiç müşteri yok</p></div>';   
    } else {
    ?>

    <table class="table" >
       
        <tr>
            <th>Müşteri Adı</th>
            <th>Müşteri Soyadı</th>
            <th>Eposta</th>
            <th>Telefonu</th>
            <th>Randevu Tarihi</th>
            <th>Randevu Saati</th>
            
            <th>Doktor</th>
            <th colspan="2"><center>İşlemler</center></th>
        </tr>
        
        <?php
        
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
                if ($list->getDoktorId() == null){
                    echo "Atanmadı";
                } else {
                    $doktordao = new DoktorDAO();
                    echo $doktordao->DoktorIdGoster($list->getDoktorId());
                }
                ?>
            </td>
            <td>
   
                <form action="../controller/musteriDetay_controller.php" method="post">
                     <input type="text" value="<?php echo $list->getAd(); ?>" name="ad" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getSoyad(); ?>" name="soyad" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getMusteriId(); ?>" name="musteriId" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getTel(); ?>" name="tel" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getEmail(); ?>" name="email" style="display: none;"/>
                     <input  value="<?php echo $list->getMesaj(); ?>" name="mesaj" style="display: none;"/>
                     <input type="date" value="<?php echo $list->getRandevuTarihi(); ?>" name="tarih" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getSaatId(); ?>" name="saat" style="display: none;"/>
                     <input type="text" value="<?php echo $list->getDoktorId(); ?>" name="doktorId" style="display: none;"/>
                     <?php
                     if ($list->getRandevuTarihi() != date('Y-m-d')) {
                         $disable = 'disabled="disabled"';
                     } else {
                         $disable = null;
                     }
                     ?>
                     <button type="submit" title="Müştreri Muayne Durumu" <?= $disable ?> class="btn btn-warning glyphicon glyphicon-user"></button>
                </form>
                
            </td>
            <td>
                  
                <form action="../controller/musteriSil_controller.php" method="post">
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
    </table><br>
    <?php } ?>
<script>    
    
    $("#b<?php echo $i; ?>").click(function(){    
        $("#t<?php echo $i;?>").slideToggle(1000);    
    });    
    
</script>
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
<?php
} else {
    header("Location:../index.php");
}
?>