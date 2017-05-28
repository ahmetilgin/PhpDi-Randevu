<?php
include_once '../include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->kullaniciDoktorOlustur_controller();
if (isset($_SESSION['admin_id'])) {
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
    
    $sifre = $_POST['ad'].$_POST['soyad'];
    $email = $_POST['email'];
    
    $kulgirisdao = new KullaniciGirisDAO();
    $yenisifre = $kulgirisdao->sifreleme($sifre);
    
    $kulgiris = new KullaniciGiris();
    $kulgiris->setEmail($email);
    $kulgiris->setSifre($yenisifre);
    $kulgiris->setYetkiId(0);
    
    $kulgirisdao->KullaniciEkle($kulgiris);
    
}
?>
</body>
</html>
<?php } ?>