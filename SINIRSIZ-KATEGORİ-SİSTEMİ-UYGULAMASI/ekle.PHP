<?php 
require_once("baglan.php");
function filtrele($deger){
   $bir = trim($deger);
   $iki = strip_tags($bir);
   $uc = htmlspecialchars($iki , ENT_QUOTES);
   $sonuc = $uc;
   return $sonuc;

}
$gelenustmenusecimi = filtrele( $_POST["ustmenusecimi"]);
$gelenmenuadi = filtrele( $_POST["menuadi"]);

if((isset($gelenustmenusecimi)) and (isset($gelenmenuadi))){
$ekle   = $veritabanibaglantisi->prepare("INSERT INTO menuler  (ustid , menuadi ) values(?,?)");
$ekle->execute([$gelenustmenusecimi,$gelenmenuadi]);
$eklekontrolsayisi = $ekle->rowCount();
if($eklekontrolsayisi>0){
   
header( "Location: index.php");
exit();
}else{
   echo "işlem sırasında beklenmeyen sorun oluşştu <br>";
   echo "ana sayfaya geri  dönmek için lütfen buraya tıklayınız <a href='index.php'>tıklayınız</a>.";
}
}else{

   echo "lütfen bos alan bırakmayın <br>";
   echo "ana sayfaya geri  dönmek için lütfen buraya tıklayınız <a href='index.php'>tıklayınız</a>.";
}





$veritabanibaglantisi = null;

