<?php
include_once './include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->doktorEkle_include();
if (1) {
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
    <title>Doktor Ekle</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    $bootstrap->login_vb();
    ?>
    <script>
        $(document).ready(function () {
            $("#hclick").click(function () {
                $("#pclick").slideToggle("slow");
            });
        });
    </script>
<script>
$(document).ready(function()
{
    $('#email').keyup(email_check);
}); 
function email_check()
{   
    var email = $('#email').val();
    
    if (email == '') {
        document.getElementById("txtHint").innerHTML = '';
    } else {
    jQuery.ajax({
        type: "POST",
        url: "ajaxKontrol/doktorEmailKontrol.php",
        data: 'email='+ email,
        cache: false,
        success: function(response){
            if(response == 1){
                document.getElementById("txtHint").innerHTML = '<p style="color: red;">Bu eposta adresi kullanılamaz.</p>'; 
        
                $("#kbutton").attr("disabled","disabled");
            }
            else
            {
                document.getElementById("txtHint").innerHTML = '<p style="color: green;">Bu eposta adresi uygundur.</p>'; 
                $("#kbutton").removeAttr("disabled"); 
            }
        }
    });
    }
    
}


</script>
</head>
<body>

    <?php
    $header = new Header();

    $header->kokSayfa_header();
    $maxtarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y") - 21));
    $mintarih = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y") - 70));
    ?>

<div class = "container">
    <div class="wrapper">
        <form action="controller/doktorEkle_controller.php" method="post" name="Login_Form" class="form-signin">       
            <h3 class="form-signin-heading">Doktor Ekleme</h3>
            <hr class="colorgraph"><br>
            <table class="table">
                <tr>
                    <td ><label>Adı</label></td>
                    <td><input name="ad" type="text" class="form-control" required autofocus/></td>
                </tr>
                <tr>
                    <td><label>Soyadı</label></td>
                    <td><input name="soyad" type="text" class="form-control"  required autofocus/></td>
                </tr>
                <tr>
                    <td><label>Doğum Tarihi</label></td>
                    <td><input name="dogumTarihi" class="form-control" type="date" min="<?php echo $mintarih; ?>"  max="<?php echo $maxtarih; ?>" required autofocus/></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input name="email" type="email" class="form-control" id="email" required autofocus /> <div id='txtHint'></div> </td>
                    
                </tr>
                <tr>
                    <td><label>Telefonu</label></td>
                    <td><input name="tel" type="tel" class="form-control" required autofocus/></td>
                </tr>
                <tr>
                    <td><label>Sifre</label></td>
                    <td><input name="Sifre" type="Sifre" class="form-control" required autofocus/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary" type="submit"  id="kbutton" disabled="disabled">Kaydet</button></td>
                </tr>
                
            </table>
        </form>
        
    </div>
</div>   





<br>


<div class="container">
<div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading" id="hclick"><center>Doktor Listesi</center></div>
        <div class="panel-body" id="pclick" style="display: none;">
            <table  class="table table-hover table-responsive table-striped">
                <tr>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Eposta</th>
                    <th>Telefonu</th>
                    <th>Doğum Tarihi</th>
                    <th colspan="4"><center>İşlemler</center></th>
                </tr>
                <?php
                $doktordao = new DoktorDAO();
                $doktorList = $doktordao->DoktorListele();

                foreach ($doktorList as $list) {
                    echo '<tr>';
                    echo '<td>' . $list->getAd() . '</td>';
                    echo '<td>' . $list->getSoyad() . '</td>';
                    echo '<td>' . $list->getEmail() . '</td>';
                    echo '<td>' . $list->getTel() . '</td>';
                    echo '<td>' . $list->getDogumTarihi() . '</td>';
                    ?>
                    <th>
                    <form action="controller/doktorGuncelle_controller.php" method="post">
                        <input type="number" value="<?php echo $list->getDoktorId(); ?>" name="id"  class="hidden"/>
                        <input type="text" value="<?php echo $list->getAd(); ?>" name="ad"  class="hidden"/>
                        <input type="text" value="<?php echo $list->getSoyad(); ?>" name="soyad"  class="hidden"/>
                        <input type="email" value="<?php echo $list->getEmail(); ?>" name="email"  class="hidden"/>
                        <input type="tel" value="<?php echo $list->getTel(); ?>" name="tel"  class="hidden"/>
                        <input type="date" value="<?php echo $list->getDogumTarihi(); ?>" name="dogumTarihi"  class="hidden"/>
                        <input type="sifre" value="<?php echo $list->getSifre(); ?>" name="sifre"  class="hidden"/>
                        <button type="submit" class="btn btn-warning glyphicon glyphicon-pencil" title="Güncelle" ></button>
                    </form>
                    </th>
                    <?php
                        $kuldao = new KullaniciGirisDAO();
                        $kontrol = $kuldao->profilKontrol($list->getEmail());
                        if ($kontrol == 0) {
                            $durum = 0;
                    ?>
                    <th>
                    <form action="controller/kullaniciDoktorOlustur_controller.php" method="post">
                        <input type="email" value="<?php echo $list->getEmail(); ?>" name="email"  class="hidden"/>
                        <input type="text" value="<?php echo $list->getAd(); ?>" name="ad"  class="hidden"/>
                        <input type="text" value="<?php echo $list->getSoyad(); ?>" name="soyad"  class="hidden"/>
                        
                        <button type="submit" class="btn btn-primary glyphicon glyphicon-user" title="Profil Oluştur"></button>
                        
                    </form>
                    </th>
                    <?php } else {
                        $durum = 1;
                    } ?>
                    <th>
                    <form action="controller/doktorSil_controller.php" method="post">
                        <input type="text" value="<?php echo $durum; ?>" name="durum"  class="hidden"/>
                        <input type="text" value="<?php echo $list->getEmail(); ?>" name="email"  class="hidden"/>
                        <input type="number" name="id" value="<?php echo $list->getDoktorId(); ?>"  class="hidden"/>
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" title="Sil"></button>
                    </form>
                    </th>
                    
                    <th>
                    <form action="controller/doktorMusteri_controller.php" method="post">
                        
                        <input type="text" value="<?php echo $list->getDoktorId(); ?>" name="id"  class="hidden"/>
                        <button type="submit" class="btn btn-default glyphicon glyphicon-list-alt" title="Müşterilerini Gör"></button>
                    </form>
                    </th>

    <?php
    echo '</tr>';
}
?>
            </table>
        </div>        
    </div>            
</div>
</div>

<?php
$header->footer();
?>

</body>
</html>
<?php } ?>