<?php 
try{
$veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8","root","");
}catch(PDOException $hatamesajı){
echo "baglantı hatası <br> hata mesajı >>" . $hatamesajı;
die();
}
function filtre ($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $üc  = htmlspecialchars($iki , ENT_QUOTES);
    $sonuc = $üc;
    return $sonuc;
}
