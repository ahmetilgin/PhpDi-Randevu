<?php
ob_start(); 
include_once './include/include_class.php';
$loginInclude = new IncludeClass();
$loginInclude->login_include();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta charset="UTF-8">
    <title>Giriş Yapınız</title>
    <?php
    $bootsrap = new Bootstrap();
    $bootsrap->index_vb();
    $bootsrap->login_vb();
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Yet');
    $header->kokSayfa_header();
    ?>
    <div class = "container">
	<div class="wrapper">
    <?php
        if ($_POST) {
            if($_POST['yetki'] == 0) {
                $kulgiris = new KullaniciGiris();
                $kulgirisdao = new KullaniciGirisDAO();
                $sifre = $kulgirisdao->sifreleme(trim($_POST['sifre']));
                $kulgiris->setEmail(trim($_POST['email']));
                //echo $sifre.' '.$_POST['email'];
                $kulgiris->setSifre($sifre);
                $kulgirisdao->LoginKontrol($kulgiris);
            } else {
                $kulgiris = new KullaniciGiris();
                $kulgirisdao = new KullaniciGirisDAO();
                $sifre = $kulgirisdao->sifreleme(trim($_POST['sifre']));
                $kulgiris->setEmail(trim($_POST['email']));
                //echo $sifre.' '.$_POST['email'];
                $kulgiris->setSifre($sifre);
                $kulgirisdao->AdminLoginKontrol($kulgiris);
            }
    }
    ?>
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Giriş Yapınız</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="email" placeholder="Eposta Adresi" required="" autofocus="" />
			  <input type="password" class="form-control" name="sifre" placeholder="Şifrenizi Giriniz. " required=""/>  
                          Doktor <input type="radio" name="yetki" value="0"  checked/>
                          &nbsp;&nbsp;&nbsp;Admin <input type="radio" name="yetki" value="1" />
                          <hr class="colorgraph"><br>
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Giriş</button>
                          <a class="btn btn-link pull-left">Şifremi Unuttum</a>                           
		</form>
            
           
    
    </div>
        
         
    </div>
   <?php
   $header->footer();
   ?>
</body>
</html>
<?php 
ob_end_flush();
?>
