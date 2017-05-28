<?php
include_once './include/include_class.php';
$hakkimizda = new IncludeClass();
$hakkimizda->IncludeAll();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Hakkımızda</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Hak');
    $header->kokSayfa_header();
    ?>
<div class="container marketing">
    
<center>
        <h2>Doktorlarımız</h2><hr>
</center><br/>
<div class="row">
    <?php
      $kuldao = new KullaniciGirisDAO();
      $resimList = $kuldao->DoktorGoster();
      foreach ($resimList as $list) {
          if ($list->getResim() != null) {
              $resim = $list->getResim();
          } else {
              $resim = "dist/resimler/bos-resim/bos-profil.png";
          }
    ?>
    
        <div class="col-lg-4">
            <center><img class="img-thumbnail" src="<?= $resim ?>" alt="" style="width: 100px; height: 150px;"/></center>
            <?php
            $doktordao = new DoktorDAO();
            ?>
            <center><h3><strong><?= $doktordao->DoktorEmailAdBul($list->getEmail()) ?></strong> </h3></center>
            <center><h3>Diş Hekimi</h3></center>
            <center><p><a class="btn btn-primary"  role="button">Daha Ayrıntılı Bilgi</a></p></center><hr>
        </div>
    
    <?php
          
      }
    ?>
</div>
</div>
<?php
$header->footer();
?>
</body>
</html>
