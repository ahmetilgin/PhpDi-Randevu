<?php

include_once './include/include_class.php';
$index = new IncludeClass();
$index->index_include();
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
    <title>Ana Sayfa</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    
    ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php
    $header = new Header();
    $header->kokSayfa_header();
    
    $slider = new Slider();
    echo '<br><br>';
    $slider->sliderOlustur();
    $bootstrap->slider_vb();
    $header->footer();
    ?>
</body>
</html>
