<?php
ob_start();
include_once '../include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->doktorGuncelle_controller_include();
if ($_POST) {
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Doktor Güncelle</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->controller_vb();
    $bootstrap->setDizi('../');
    $bootstrap->login_vb();
    ?>        
</head>
<body>
    <?php
     $header = new Header();
     $header->setDizin('../');
     $header->kokSayfa_header();
    ?>
    <div class="container">
    <div class="wrapper">
        <form method="post" action="" class="form-signin">
            <h3 class="form-signin-heading">Doktor Bilgileri</h3>
            <table class="table">
            
            <tr>
                <td>Adı</td>
                <td><input type="text" value="<?php echo $_POST['ad'] ?>" name="ad"  required autofocus/></td>
                <input type="number" value="<?php echo $_POST['id'] ?>" name="id1" style="display: none;" />
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><input type="text" value="<?php echo $_POST['soyad'] ?>" name="soyad" required autofocus/></td>
            </tr>
            <tr>
                <td>Eposta</td>
                <td><input type="email" value="<?php echo $_POST['email'] ?>" name="email" readonly/></td>
            </tr>
            <tr>
                <td>Telefonu</td>
                <td><input type="tel" value="<?php echo $_POST['tel'] ?>" name="tel"  required autofocus/></td>
            </tr>
            <tr>
                <td>Doğum Tarihi</td>
                <td><input type="date" value="<?php echo $_POST['dogumTarihi'] ?>" name="dogumTarihi" required autofocus/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Güncelle"></td>
            </tr>
        </table>
        
    </form>
    <?php
    if (isset($_POST['id1'])) {
        $doktor = new Doktor();
        $doktordao = new DoktorDAO();
        $doktor->setDoktorId(trim($_POST['id1']));
        $doktor->setAd(trim($_POST['ad']));
        $doktor->setSoyad(trim($_POST['soyad']));
        $doktor->setEmail(trim($_POST['email']));
        $doktor->setTel(trim($_POST['tel']));
        $doktor->setDogumTarihi(trim($_POST['dogumTarihi']));
        
        $doktordao->DoktorGuncelle($doktor);
        
        
    }
    ?>
    </div>
    </div>    
</body>
</html>
<?php
$header->footer();
}
ob_end_flush();
?>