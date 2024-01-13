
<?php 

try{
    $veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=silmeuygulamasi;charset=utf8","root" ,"");
    
    }catch(PDOException $hatamesaji){
    echo "baglanti hatasi <br> hata aciklamasi>>" . $hatamesaji->getMessage();
    die(); 
    }



?>


