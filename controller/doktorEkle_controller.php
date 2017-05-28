<?php
ob_start();
include_once '../include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->doktorEkle_controller_include();
if (isset($_SESSION['admin_id'])) {
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Admin Ekleme</title>
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
    
    $doktorInclude->doktorEkle_controller_include();

    $doktor = new Doktor();
    $doktor->setAd(trim($_POST['ad']));
    $doktor->setSoyad(trim($_POST['soyad']));
    $doktor->setDogumTarihi(trim($_POST['dogumTarihi']));
    $doktor->setTel(trim($_POST['tel']));
    $doktor->setEmail(trim($_POST['email']));
    $ekle = new DoktorDAO();

    $ekle->DoktoEkle($doktor);
    
}
?>
</body>
</html>
<?php
}
ob_end_flush();
?>