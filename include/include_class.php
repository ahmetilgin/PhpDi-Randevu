<?php
class IncludeClass
{
    private $incdizin = null;
    
    function setIncDizin($dizin)
    {
        $this->incdizin = $dizin;
    }
            
    function IncludeAll()
    {
        session_start();
        include_once $this->incdizin.'veritabani/veritabaniAyar.php';
        include_once $this->incdizin.'dao/saatDAO.php';
        include_once $this->incdizin.'dao/musteriDAO.php';
        include_once $this->incdizin.'dao/doktorDAO.php';
        include_once $this->incdizin.'dao/adminDAO.php';
        include_once $this->incdizin.'dao/musteri_detayDAO.php';
        include_once $this->incdizin.'dao/kullaniciGirisDAO.php';
        include_once $this->incdizin.'dao/tarihDAO.php';
        include_once $this->incdizin.'model/saat.php';
        include_once $this->incdizin.'model/musteri.php';
        include_once $this->incdizin.'model/doktor.php';
        include_once $this->incdizin.'model/musteri_detay.php';
        include_once $this->incdizin.'model/admin.php';
        include_once $this->incdizin.'model/kullanici_giris.php';
        include_once $this->incdizin.'include/panelInclude.php';
        include_once $this->incdizin.'include/slider.php';
        include_once $this->incdizin.'model/iletisim.php';
        include_once $this->incdizin.'dao/iletisimDAO.php';
        include_once $this->incdizin.'include/bootstrap.php';
        include_once $this->incdizin.'include/header.php';
        
    }
            
    function index_include()
    {
        session_start();
        include_once './include/header.php';
        include_once './include/bootstrap.php';
        include_once './veritabani/veritabaniAyar.php';
        include_once './dao/doktorDAO.php';
        include_once './dao/adminDAO.php';
        include_once './include/slider.php';
    }
    
    function hakkimizda_include()
    {
        session_start();
        include_once './include/header.php';
        include_once './include/bootstrap.php';
        include_once './veritabani/veritabaniAyar.php';
        include_once './dao/doktorDAO.php';
        include_once './dao/adminDAO.php';

    }
    
    function hizmet_include()
    {
        session_start();
        include_once './include/header.php';
        include_once './include/bootstrap.php';
        include_once './veritabani/veritabaniAyar.php';
        include_once './dao/doktorDAO.php';
        include_once './dao/adminDAO.php';
    }
            
    function musteriEkle_include()
    {
        session_start();
        include_once 'veritabani/veritabaniAyar.php';
        include_once 'dao/saatDAO.php';
        include_once 'model/saat.php';
        include_once 'model/musteri.php';
        include_once 'dao/musteriDAO.php';
        include_once 'dao/doktorDAO.php';
        include_once './dao/adminDAO.php';
        include_once './include/slider.php';
        include_once './include/bootstrap.php';
        include_once './include/header.php';
    }
    
    function doktorEkle_include()
    {
        session_start();
        include_once 'veritabani/veritabaniAyar.php';
        include_once 'dao/doktorDAO.php';
        include_once './dao/adminDAO.php';
        include_once 'model/doktor.php';
        include_once 'dao/kullaniciGirisDAO.php';
        include_once './include/bootstrap.php';
        include_once './include/header.php';
    }
    
    function login_include()
    {
        session_start();
        include_once 'veritabani/veritabaniAyar.php';
        include_once 'dao/kullaniciGirisDAO.php';
        include_once 'dao/doktorDAO.php';
        include_once 'model/kullanici_giris.php';
        include_once 'dao/adminDAO.php';
        include_once './include/bootstrap.php';
        include_once './include/header.php';
    }
    
    function adminEkle_include()
    {
        session_start();
        include_once './veritabani/veritabaniAyar.php'; 
        include_once './include/bootstrap.php';
        include_once './include/header.php';
        include_once './dao/doktorDAO.php';
        include_once './dao/adminDAO.php';
    }
    
    function adminEkle_controller_include()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/adminDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../model/admin.php';
        include_once '../model/kullanici_giris.php';
        include_once '../dao/kullaniciGirisDAO.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function doktorEkle_controller_include()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../model/doktor.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function doktorGuncelle_controller_include()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../model/doktor.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function doktorMusteri_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/saat.php';
        include_once '../model/musteri.php';
        include_once '../dao/musteriDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/doktor.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';

    }
    
    function doktorSil_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../model/doktor.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    function kullaniciDoktorOlustur_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/kullaniciGirisDAO.php';
        include_once '../model/kullanici_giris.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function musteriEkle_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/musteriDAO.php';
        include_once '../model/musteri.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function musteriGuncelle_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/saat.php';
        include_once '../model/musteri.php';
        include_once '../dao/musteriDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/doktor.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function musteriSil_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/musteriDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../model/musteri.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function gunler()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../model/musteri.php';
        include_once '../dao/tarihDAO.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/saat.php';
        include_once '../dao/musteriDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php'; 
        include_once '../include/panelInclude.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function profilGoruntule()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/kullaniciGirisDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../model/admin.php';
        include_once '../model/doktor.php';
        include_once '../model/kullanici_giris.php';
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
    
    function musteriDetay_controller()
    {
        session_start();
        include_once '../veritabani/veritabaniAyar.php';
        include_once '../dao/saatDAO.php';
        include_once '../model/saat.php';
        include_once '../model/musteri.php';
        include_once '../dao/musteriDAO.php';
        include_once '../dao/doktorDAO.php';
        include_once '../dao/adminDAO.php';
        include_once '../dao/saatDAO.php';
        include_once '../dao/musteri_detayDAO.php';
        include_once '../model/doktor.php';
        include_once '../model/musteri_detay.php';
        
        include_once '../include/bootstrap.php';
        include_once '../include/header.php';
    }
}

?>