<?php
include_once '../include/include_class.php';
$musteriInclude = new IncludeClass();
$musteriInclude->musteriSil_controller();
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
    ?>
</head>
<body>
<?php
if ($_POST) {
    $header = new Header();
    $header->kokSayfa_header();
    
    $musteri = new Musteri();
    $musteri->setMusteriId(trim($_POST['musteriId']));
    $musteridao = new MusteriDAO();
    $musteridao->musteriSil($musteri);
    
}
}
?>
