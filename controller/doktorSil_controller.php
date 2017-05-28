<?php
ob_start();
include_once '../include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->setIncDizin('../');
$doktorInclude->IncludeAll();
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
if ($_POST){
    $header = new Header();
    $header->setDizin('../');
    $header->kokSayfa_header();
    
    $doktor = new Doktor();
    $durum = $_POST['durum'];
    
    $doktor->setDoktorId(trim($_POST['id']));
    $doktor->setEmail(trim($_POST['email']));
    $doktordao = new DoktorDAO();
    
    if ($durum == 0) {
        $doktordao->DoktorSil($doktor);
    } else {
        $doktordao->DoktorProfilSil($doktor);
    }
    
    
}
?>
</body>
</html>
<?php }
 ob_end_flush();
?>