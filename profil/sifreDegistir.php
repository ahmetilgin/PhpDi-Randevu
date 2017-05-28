<?php
ob_start();
include_once '../include/include_class.php';
$profilInclude = new IncludeClass();
$profilInclude->profilGoruntule();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Şifre Değiştir</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->setDizi('../');
    $bootstrap->controller_vb();
    $bootstrap->login_vb();
    ?>
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
                $kul = new KullaniciGiris();
                $kuldao = new KullaniciGirisDAO();
                $sifre = $kuldao->sifreleme(trim($_POST['sifre1']));
                $kul->setEmail($_SESSION['email']);
                $kul->setSifre($sifre);
            ?>
            <div class="form-signin" style="background-color: pink;">
                <?php $kuldao->sifreGuncelle($kul); ?>
            </div>
            <?php
            }
            ?>
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Şifre Değiştirme</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="password" id="sif1" class="form-control" name="sifre1" placeholder="Yeni şifreyi giriniz" required="" autofocus="" />
			  <input type="password" id="sif2" class="form-control" name="sifre2" placeholder="Tekrar yeni şifreyi giriniz " required=""/>  
                          
                          
                          
			 
                          <button class="btn btn-lg btn-primary btn-block" id="kbutton" disabled="disabled"  name="Submit" type="Submit">Şifreyi Değiştir</button>
                                                     
		</form>
            <div id="txt"></div>
        </div>
    </div>

<script>
    $('#sif2').keyup(sifreKontrol);
    function sifreKontrol()
    {
        var sif1 = $('#sif1').val();
        var sif2 = $('#sif2').val();
        
        if (sif1 != "" && sif2 != "" && sif1.length > 5 && sif2.length > 5)
        {
            if (sif1 != sif2) {
                document.getElementById("txt").innerHTML = '<div class="form-signin" style="background-color:pink;"><center><p style="color:red;">Şifre eşleşmiyor.</p></center></div>';
                $("#kbutton").attr("disabled","disabled");
            } else {
                document.getElementById("txt").innerHTML = '<div class="form-signin" style="background-color:#94F67C;"><center><p style="color:green;">Şifre Uygun.</p></center></div>';
                $("#kbutton").removeAttr("disabled");
            }
        }    
        
    }
</script>    
<?php 
        
$header->footer();
?>    
</body>
</html>
<?php
ob_end_flush();
?>