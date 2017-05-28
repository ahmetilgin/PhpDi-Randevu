<?php
class Bootstrap
{
    private $dizin = null;
    
    function setDizi($dizin)
    {
        $this->dizin = $dizin; 
    }
            
    function index_vb()
    {
?>
          <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
          <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
          <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script src="dist/js/bootstrap.min.js"></script>
          <link href="dist/site/style.css" rel="stylesheet" type="text/css" />
<?php
    }
    
    function controller_vb()
    {
?>
          <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
          <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
          <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
          <script src="../dist/js/bootstrap.min.js"></script>
          <link href="../dist/site/style.css" rel="stylesheet" type="text/css" />
<?php          
    }
    
    function login_vb() 
    {
?>
          
          <link href="<?php echo $this->dizin;?>dist/loginCss/style.css" rel="stylesheet" type="text/css" />
<?php    
        
    } 
    
    function slider_vb()
    {
?>
          <script src="<?= $this->dizin ?>dist/slider/js/jquery-1.9.1.min.js"></script>
          <script src="<?= $this->dizin ?>dist/slider/js/docs.min.js"></script>
          <script src="<?= $this->dizin ?>dist/slider/js/ie10-viewport-bug-workaround.js"></script>
          <script type="<?= $this->dizin ?>text/javascript" src="dist/slider/js/jssor.slider.mini.js"></script>
<?php        
    }
}
?>