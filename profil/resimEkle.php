<?php
ob_start();
include_once '../include/include_class.php';
$profilInclude = new IncludeClass();
$profilInclude->profilGoruntule();
if (isset($_SESSION['admin_id']) || isset($_SESSION['doktor_id'])) {
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Resim Ekle</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->setDizi('../');
    $bootstrap->controller_vb();
    $bootstrap->login_vb();
    ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#dosya').change(getFile);
    function getFile(){
        var filename = document.getElementById("dosya").value;
        var uzanti = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename):undefined;
        if(this.files[0].size < 1024*1024) {
            if(uzanti == "png" || uzanti == "jpg" || uzanti == "gif" || uzanti == "jpeg"){
                document.getElementById("txt").innerHTML = '';
                $("#kbutton").removeAttr("disabled","disabled");
            } else {
                document.getElementById("txt").innerHTML = '<p style="color: red;">Lütfen png, jpg, gif ve jpeg uzantılı dosyalar seçiniz.</p>';
                $("#kbutton").attr("disabled","disabled");
            }
        } else {
            document.getElementById("txt").innerHTML = '<p style="color: red;">Dosya boyutu 1 Mb den büyük!</p>';
            $("#kbutton").attr("disabled","disabled");
        }   
    }
});
</script>    
</head>
<body>
<?php
$header = new Header();
$header->setDizin('../');
$header->kokSayfa_header();
?>
    <div class = "container">
	<div class="wrapper">
            <?php
            if ($_POST) {
                if ($_FILES["resim"]["size"] < 1024*1024) {
                    if (isset($_SESSION['doktor_id'])) {
                        $id = $_SESSION['doktor_id'];
                        $klasor = "doktor";
                    } else {
                        $id = $_SESSION['admin_id'];
                        $klasor = "admin";
                    }
                    
                    $dosya_adi = $_FILES["resim"]["name"];
                    $uzanti = pathinfo($dosya_adi);
                    $path = "dist/resimler/$klasor/$id/".$id.'.'.$uzanti['extension'];
                    $klasor_kontorol = "../dist/resimler/$klasor/".$id;                    
                    
                    if(!file_exists($klasor_kontorol))
                    {
                        mkdir($klasor_kontorol);
                    }
                    
                    
                    $yeniAd = $klasor_kontorol."/".$id.'.'.$uzanti['extension'];
                    
                    if (move_uploaded_file($_FILES["resim"]["tmp_name"] , $yeniAd)) {
                        $kul = new KullaniciGiris();
                        $kul->setEmail($_SESSION['email']);
                        $kul->setResim($path);
                        $kuldao = new KullaniciGirisDAO();
                        $kuldao->ResimEkle($kul);
                   
                    } else {
                        echo 'Dosya yüklenmedi';
                    }

                } else {
                    echo 'Dosya boyutu 1mb yı geçemez';
                }
            }
            ?>
            <form action="" method="post" name="Login_Form" class="form-signin" enctype="multipart/form-data">
                <?php
                $kuldao = new KullaniciGirisDAO;
                $resim = $kuldao->profilResimGoster($_SESSION['email']);
                if ($resim != null) {
                    $resimyolu = "../".$resim;
                    $h3 = "Profil Resminizi Güncelleyiniz";
                } else {
                    $resimyolu = "../dist/resimler/bos-resim/bos-profil.png";
                    $h3 = "Profil Resmi Ekleyin";
                }
                ?>
                <h3 class="form-signin-heading"><img src="<?= $resimyolu ?>" class="img-rounded" style="width: 120px; height: 120px;"/></h3>
                    <h3 class="form-signin-heading"><?= $h3 ?></h3>
			  <hr class="colorgraph"><br>
			  
                          <input type="file"  class="form-control" name="resim" id="dosya" placeholder="Resim Yükleyin" required="" autofocus="" />
                          <div id="txt"></div>
                          <hr class="colorgraph"><br>
                          <button class="btn btn-lg btn-primary btn-block" id="kbutton" disabled="disabled"  name="Submit" type="Submit">Resmi Yükle</button>
                                                     
		</form>
            <div id="txt"></div>
        </div>
    </div>

   
<?php 
        
$header->footer();
?>    
</body>
</html>
<?php
} else {
    header("Location:../login.php");
}
ob_end_flush();
?>