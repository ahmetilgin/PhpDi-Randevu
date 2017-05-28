<?php
//error_reporting(0);
class VeriTabaniBaglanti
{
    private $dns;
    private $user;
    private $pdo = null;
    private $pass;
    
    public function pdo_baglanti() 
    {
        try{
           $this->dns = 'mysql:host=localhost;dbname=mydb';
           $this->user = 'root';
           $this->pass = "";
           $this->pdo = new PDO($this->dns,$this->user,$this->pass);
           $this->pdo->exec('SET CHARCTER UTF-8');
           
           
          // echo("PDO bağlantı objesi oluşturuşdu");
        } catch(PDOException $e) {
            die('Baglanti kurulamadi: '.$e->getMessage());
        }
        return $this->pdo;
    }
    
    public function pdo_sonlandir()
    {
        $this->pdo = null;
        return $this->pdo;
    }
    
}
//$x = new VeriTabaniBaglanti();
//$x->pdo_baglanti();
?>

