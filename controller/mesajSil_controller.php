<?php
include_once '../include/include_class.php';
$inc = new IncludeClass();
$inc->setIncDizin('../');
$inc->IncludeAll();

if (isset($_SESSION['admin_id'])) {
    if ($_POST) {
        $ilt = new Iletisim();
        $ilt->setIletisimId($_POST['id']);
        $iltdao = new IletisimDAO();
        $iltdao->IletisimSil($ilt);
    }
}

?>