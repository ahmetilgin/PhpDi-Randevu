<?php
ob_start();
include_once '../include/include_class.php';
$adminInclude = new IncludeClass();
$adminInclude->adminEkle_controller_include();
if (isset($_SESSION['admin_id'])) {     
if ($_POST) {
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
    $header = new Header();
    $header->setKey('Yet');
    $header->kokSayfa_header();
    
    $admin = new Admin();
    $admindao = new AdminDAO();
    $admin->setAd(trim($_POST['ad']));
    $admin->setSoyad(trim($_POST['soyad']));
    $admin->setEmail(trim($_POST['email']));
    $admin->setUsername(trim($_POST['username']));
    $admin->setTel(trim($_POST['tel']));
    $admin->setDogumTarihi(trim($_POST['dogumTarihi']));
   
    $admindao->AdminEkle($admin);
    ?>
</body>
</html>
<?php
}
}
ob_end_flush();
?>