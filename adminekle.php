<?php
include_once './include/include_class.php';
$adminInclude = new IncludeClass();
$adminInclude->adminEkle_include();
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Yönetici Ekle</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    $bootstrap->login_vb();
    ?>
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
        url: "ajaxKontrol/adminEmailKontrol.php",
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
    ?>
<div class="container"> 
    <div class="wrapper">
        <form action="controller/adminEkle_controller.php" method="post" class="form-signin">
        <h3 class="form-signin-heading">Admin Bilgileri</h3>
        <?php
        $maxtarih = date("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-16));
        $mintarih = date("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")-70));
        ?>
        <table class="table">
            <tr>
                <td><label>Adı</label></td>
                <td><input name="ad" type="text" class="form-control"  required autofocus/></td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><input name="soyad" type="text" class="form-control"  required autofocus/></td>
            </tr>
            <tr>
                <td>Kullanıcı Adı</td>
                <td><input name="username" type="text" class="form-control"  required autofocus/></td>
            </tr>
            <tr>
                <td>Doğum Tarihi</td>
                <td><input name="dogumTarihi" type="date" class="form-control" max="<?php echo $maxtarih; ?>" min="<?php echo $mintarih; ?>"  required autofocus/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="email" id="email" type="email" class="form-control"  required autofocus/><div id="txtHint"></div></td>
            </tr>
            <tr>
                <td>Telefonu</td>
                <td><input name="tel" type="tel" class="form-control"  required autofocus/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="kbutton" value="Kaydet" class="btn btn-primary btn-block" /></td>
            </tr>
        </table>
    </form>
    </div>
</div>
<?php
$header->footer();
?>    
</body>
</html>
