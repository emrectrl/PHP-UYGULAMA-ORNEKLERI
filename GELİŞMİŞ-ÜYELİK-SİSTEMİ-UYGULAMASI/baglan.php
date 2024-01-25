<?php 
try{
$veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8","root" , "");

}catch(PDOException $hatamesajı){
    echo "baglantı hatası <br> hata acıklaması ::" . $hatamesajı->getMessage() ;
    die();
}
function filtre ($deger){
$bir = trim($deger);
$iki = strip_tags($bir);
$uc  = htmlspecialchars($iki , ENT_QUOTES);
$sonuc = $uc;
return $sonuc;



}
