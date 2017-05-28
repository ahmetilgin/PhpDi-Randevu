<?php
include_once './include/include_class.php';
$doktorInclude = new IncludeClass();
$doktorInclude->IncludeAll();
if (isset($_SESSION['doktor_id'])) {
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    <title>Doktor Sayfası</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Dok');
    $header->kokSayfa_header();
    
    $panel = new PanelInclude();
    $panel->doktorInclude();
    
    $header->footer();        
    ?>
</body>
</html>
<?php } else {
     header("Location: index.php");
} ?>