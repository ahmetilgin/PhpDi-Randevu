<?php
include_once '../include/include_class.php';
$musteriInclude = new IncludeClass();
$musteriInclude->musteriEkle_controller();

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
</head>
<body>
<?php
if ($_POST) {
    $header = new Header();
    $header->kokSayfa_header();
    
    $musteri = new Musteri();
    $musteri->setAd(trim($_POST['ad']));
    $musteri->setSoyad(trim($_POST['soyad']));
    $musteri->setEmail(trim($_POST['email']));
    $musteri->setTel(trim($_POST['tel']));
    $musteri->setRandevuTarihi(trim($_POST['randevuTarihi']));
    $musteri->setSaatId(trim($_POST['saat']));
    $musteri->setMesaj($_POST['mesaj']);
    $musteridao = new MusteriDAO();
    $musteridao->musteriEkle($musteri);
    
}
?>
</body>
</html>