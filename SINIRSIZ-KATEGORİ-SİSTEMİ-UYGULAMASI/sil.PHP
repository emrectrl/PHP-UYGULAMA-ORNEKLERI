<?php 
require_once("baglan.php");
$gelenid = filtrele( $_GET["id"]);
function filtrele($deger){
   $bir = trim($deger);
   $iki = strip_tags($bir);
   $uc = htmlspecialchars($iki , ENT_QUOTES);
   $sonuc = $uc;
   return $sonuc;
}
$menuhiyerasisinibuldizi = array();
function menuhiyerasisinibul($menuiddegeri){
   global $veritabanibaglantisi;
   global $menuhiyerasisinibuldizi;
   
   $menusorgusu = $veritabanibaglantisi->prepare(" SELECT * FROM menuler WHERE ustid=?");
   $menusorgusu->execute([$menuiddegeri]);
   $menusorgususayi = $menusorgusu->rowCount();
   $menusorgusukayitlari = $menusorgusu->fetchAll(PDO::FETCH_ASSOC);

   if($menusorgususayi>0){
   foreach($menusorgusukayitlari as $kayitlar){
            $menuid = $kayitlar["id"];
            $menuustid = $kayitlar["ustid"];
            $menuadiid = $kayitlar["menuadi"];
            $menuhiyerasisinibuldizi[] = $menuid; 
            menuhiyerasisinibul($menuid);
         }
      }
      return $menuhiyerasisinibuldizi;
   }

if(isset($gelenid)){
   $silinecekmenuler = menuhiyerasisinibul($gelenid);
   foreach($silinecekmenuler as $silinecekid){

      $sil   = $veritabanibaglantisi->prepare("DELETE FROM menuler  WHERE id=? LIMIT 1");
      $sil->execute([$silinecekid]);
      $silkontrolsayisi = $sil->rowCount();
if($silkontrolsayisiz1){
   echo "işlem sırasında beklenmeyen sorun oluşştu <br>";
   echo "ana sayfaya geri  dönmek için lütfen buraya tıklayınız <a href='index.php'>tıklayınız</a>.";

   }
}

header( "Location: index.php");
exit();
   
}else{
   echo "işlem sırasında beklenmeyen sorun oluşştu <br>";
   echo "ana sayfaya geri  dönmek için lütfen buraya tıklayınız <a href='index.php'>tıklayınız</a>.";
}
$veritabanibaglantisi = null;

