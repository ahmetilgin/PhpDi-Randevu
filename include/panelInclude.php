<?php
class PanelInclude
{
    private $path = null, $dizin;
    
    function setPath($path)
    {
        $this->path = $path;
    }
    
    function setDizin($dizin)
    {
        $this->dizin = $dizin;
    }
            
    function doktorInclude()
    {
?>
    <div class="container">

        <div class="row">
            <center style="color: red;">
                <h3><strong>Doktor Paneli</strong></h3>
            </center>
        </div><br><br/>

        <div class="row">
            <center>
            <div class="col-md-4" >

                <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/doktorMusteriGun.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/doctor-icon.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Haftalık Randevular</strong></a>
            </div>

            <div class="col-md-4" >
                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/gecmisRandevular.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/history.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Geçmiş Randevular</strong></a>
            </div>

            <div class="col-md-4" >

                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/tumRandevular.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/eski.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Tüm Randevular</strong></a>
            </div>
            
            </center>
        </div>
    </div>
<?php
    }
    
    function adminInclude()
    {
?>
    <div class="container">

        <div class="row">
            <center style="color: red;">
                <h3><strong>Admin Paneli</strong></h3>
            </center>
        </div><br><br/>

        <div class="row">
            <center>
            <div class="col-md-2" >

                <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/gunler.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/doctor-icon.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Haftalık Randevular</strong></a>
            </div>

            <div class="col-md-2" >
                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/gecmisRandevular.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/history.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Geçmiş Randevular</strong></a>
            </div>

            <div class="col-md-2" >

                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>gunler/tumRandevular.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/eski.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Tüm Randevular</strong></a>
            </div>
                
            <div class="col-md-2">

                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>doktorekle.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/dis-doktor.ico" style="width: 120px; height: 120px;"/><br>
                    <strong>Doktor Ekle</strong></a>
            </div>
                
            <div class="col-md-2">

                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>adminekle.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/admin.ico" style="width: 120px; height: 120px;"/><br>
                    <strong>Admin Ekle</strong></a>
            </div>    
            
             <div class="col-md-2" >

                    <a style="text-decoration: none; color: black;" href="<?= $this->path ?>iletisim.php" class="hover">
                    <img src="<?= $this->path ?>dist/resimler/iconlar/ziyaretci.png" style="width: 120px; height: 120px;"/><br>
                    <strong>Ziyaretçi Mesajları</strong></a>
             </div>   
            
            </center>
        </div>
    </div>
<?php
    }
}

?>

