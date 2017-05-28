<?php
include_once './include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->IncludeAll();
if (isset($_SESSION['admin_id'])) {
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Doktor Sayfasi</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Adm');
    $header->kokSayfa_header();
    
    $panel = new PanelInclude();
    $panel->adminInclude();
    
    $header->footer();        
    ?>
</body>
</html>
<?php } else {
     header("Location: index.php");
} ?>