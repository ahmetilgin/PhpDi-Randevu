<?php
include_once '../veritabani/veritabaniAyar.php';
include_once '../dao/doktorDAO.php';
include_once '../dao/kullaniciGirisDAO.php';
$doktordao = new DoktorDAO();
$dkontrol = $doktordao->DoktorEmailKontrol(trim($_POST['email']));
$kuldao = new KullaniciGirisDAO();
$kkontrol = $kuldao->profilKontrol(trim($_POST['email']));


if ($dkontrol == 1 || $kkontrol == 1)
{
    echo 1;

} else {
    echo 0;    
  
}


?>

