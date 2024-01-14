
<?php 


try{
    $veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=makaleler;charset=utf8;" ,"root" , "");


}catch(PDOException $hatamesaji){
    echo "baglanti hatasi <br> hata aciklamasi >>" . $hatamesaji;
    die();
}


function filtre ($deger){
$bir = trim($deger);
$iki  = strip_tags($bir);
$uc   = htmlspecialchars($iki , ENT_QUOTES);
$sonuc  = $uc;
return $sonuc;
}














?>


