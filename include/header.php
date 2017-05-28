<?php

class Header {

    private $key = null, $dizin;

    function setKey($key) {
        $this->key = $key;
    }
    
    function setDizin($dizin)
    {
        $this->dizin = $dizin;
    }
    function kokSayfa_header() {
        
        $activeList = array('Hak' => 'Hakkımızda', 'Hiz' => 'Hizmetlerimiz', 'Onl' => 'Online Randevu', 'Ils' => 'İletişim', 'Yet' => 'Yetkili Girişi');
        $hrefList = array('Hak' => 'hakkimizda.php', 'Hiz' => 'hizmet.php', 'Onl' => 'musteriekle.php', 'Ils' => 'iletisim.php', 'Yet' => 'login.php');
        $gorevliActiveList = array('Dok' => 'Doktor Paneli', 'Adm' => 'Admin Paneli');
        $gorevliHrefList = array('Dok'=> 'doktor.php' ,'Adm'=> 'admin.php');
        ?>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="<?= $this->dizin; ?>index.php">Anasayfa</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <?php 
                        
                            
                        if (isset($_SESSION['admin_id'])){ 
                          if ($this->key == 'Adm') {
                              $active1 = "active";
                          }    
                        ?>
                        <li class="<?= $active1 ?>"><a  href="<?= $this->dizin.$gorevliHrefList['Adm'] ?>"><?= $gorevliActiveList['Adm'] ?></a></li>
                        <?php } else if (isset($_SESSION['doktor_id'])) {
                            if ($this->key == 'Dok') {
                              $active2 = "active";
                          }
                        ?>
                        <li class="<?= $active2 ?>"><a href="<?= $this->dizin.$gorevliHrefList['Dok'] ?>"><?= $gorevliActiveList['Dok'] ?></a></li>
                        <?php
                        }  ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        //reset($activeList);
                        while (list($anahtar, $deger) = each($activeList)) {
                            if ($anahtar == $this->key) {
                                $active = "active";
                            } else {
                                $active = null;
                            }  
                        ?>
                        
                        <?php
                            if ($anahtar == 'Yet') {
                                if (isset($_SESSION['doktor_id']) || isset($_SESSION['admin_id'])) {
                        ?>
                        <li class="dropdown <?php echo $active; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php
                            if (isset($_SESSION['doktor_id'])) {
                                $doktordao = new DoktorDAO();
                                $ad_soyad = $doktordao->DoktorAdBul($_SESSION['doktor_id']);
                            } else if(isset ($_SESSION['admin_id'])) {
                                $admindao = new AdminDAO();
                                $ad_soyad = $admindao->AdminAdBul($_SESSION['admin_id']);
                            }
                            echo $ad_soyad;
                            ?>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="background-color: grey; ">
                                <li><a href="<?=  $this->dizin.'profil/profilGoruntule.php' ?>">Profil Ayarları</a></li>
                                <li><a href="<?=  $this->dizin.'profil/resimEkle.php' ?>">Resim  Ekle</a></li>
                                <li><a href="<?=  $this->dizin.'profil/oturumKapat.php' ?>">Oturumu Kapat</a></li>
                           </ul>
                        </li>
                        <?php
                                } else {
                        ?>
                                <li class="<?php echo $active; ?>"><a href="<?php echo $this->dizin.$hrefList[$anahtar]; ?>"><?php echo $deger; ?></a></li>
                        <?php 
                                }
                        ?>
                        <?php
                            } else {
                            ?>  
                        <li class="<?php echo $active; ?>"><a href="<?php echo $this->dizin.$hrefList[$anahtar]; ?>"><?php echo $deger; ?></a></li>
                       <?php 
                            }
                        } 
                        ?>
                       
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron text-center">
            <h1>Diş Hastanesi</h1> 


        </div>

        <?php
    }

    function footer() {
        ?>
        <br>
        <br><br>
        <footer class="container-fluid text-center">

            <p> Ahmet İLGİN Tasarımıdır. &copy; Tüm Hakları Saklıdır.</p>	
        </footer>
        <?php
    }

}

/*
  $x = new Header();
  $x->setKey('Hak');
  $x->kokSayfa_header();
 */
?>

