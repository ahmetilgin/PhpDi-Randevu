<?php
include_once './include/include_class.php';
$hizmetInclude = new IncludeClass();
$hizmetInclude->hizmet_include();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Hizmetlerimiz</title>
    <?php
    $bootstrap = new Bootstrap();
    $bootstrap->index_vb();
    ?>
</head>
<body>
    <?php
    $header = new Header();
    $header->setKey('Hiz');
    $header->kokSayfa_header();
    ?>
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Doktor Kadromuz Hakkında<span class="text-muted"></span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a pellentesque ante. Nunc ut tortor auctor, malesuada purus vitae, iaculis nulla. Etiam laoreet tortor a aliquet aliquet. Sed volutpat aliquet vestibulum. Maecenas fringilla, quam accumsan consectetur malesuada, nisl nunc faucibus libero, non tristique orci arcu ut neque. Pellentesque vestibulum iaculis lacus nec auctor. Maecenas non leo justo. Vestibulum facilisis nunc in malesuada accumsan. Phasellus a nisl et lacus ornare malesuada. Proin ultrices ultricies neque, non pharetra purus accumsan interdum. Nulla elementum maximus nibh eget gravida. Morbi cursus condimentum odio, interdum sodales nisi mattis sed. Donec mattis rutrum dui at pharetra. Nulla facilisi. Vestibulum lacinia, sem at elementum rhoncus, tellus lacus convallis eros, a pellentesque enim purus mattis nibh
</p>
        </div>
        <div class="col-md-5"></div>
      <span class="col-md-5"><img src="" width="500" height="500"></span>      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5"><img src="" width="400" height="400"></div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Tedavi Yöntemimiz <span class="text-muted"></span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a pellentesque ante. Nunc ut tortor auctor, malesuada purus vitae, iaculis nulla. Etiam laoreet tortor a aliquet aliquet. Sed volutpat aliquet vestibulum. Maecenas fringilla, quam accumsan consectetur malesuada, nisl nunc faucibus libero, non tristique orci arcu ut neque. Pellentesque vestibulum iaculis lacus nec auctor. Maecenas non leo justo. Vestibulum facilisis nunc in malesuada accumsan. Phasellus a nisl et lacus ornare malesuada. Proin ultrices ultricies neque, non pharetra purus accumsan interdum. Nulla elementum maximus nibh eget gravida. Morbi cursus condimentum odio, interdum sodales nisi mattis sed. Donec mattis rutrum dui at pharetra. Nulla facilisi. Vestibulum lacinia, sem at elementum rhoncus, tellus lacus convallis eros, a pellentesque enim purus mattis nibh</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Müşteri Memnuniyeti<span class="text-muted"></span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a pellentesque ante. Nunc ut tortor auctor, malesuada purus vitae, iaculis nulla. Etiam laoreet tortor a aliquet aliquet. Sed volutpat aliquet vestibulum. Maecenas fringilla, quam accumsan consectetur malesuada, nisl nunc faucibus libero, non tristique orci arcu ut neque. Pellentesque vestibulum iaculis lacus nec auctor. Maecenas non leo justo. Vestibulum facilisis nunc in malesuada accumsan. Phasellus a nisl et lacus ornare malesuada. Proin ultrices ultricies neque, non pharetra purus accumsan interdum. Nulla elementum maximus nibh eget gravida. Morbi cursus condimentum odio, interdum sodales nisi mattis sed. Donec mattis rutrum dui at pharetra. Nulla facilisi. Vestibulum lacinia, sem at elementum rhoncus, tellus lacus convallis eros, a pellentesque enim purus mattis nibh</p>
        </div>
        <div class="col-md-5"><img src="" width="400" height="400"></div>
      </div>
    
</div>
    <?php
    $header->footer();
    ?>
</body>
</html>
