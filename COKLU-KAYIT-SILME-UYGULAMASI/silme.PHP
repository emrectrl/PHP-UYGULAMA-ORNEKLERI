
<?php 
require_once("baglan.PHP");
echo"------------------->   SILME UYGULAMA SAYFASI  <-----------------------------";
//--------------------------> SILME UYGULAMA SAYFASI  <-------------------------------------------
echo "<br>";
/*                                    
BU ALANDA SILME ISLEMI GERCEKLESECEK  GELEN DEGERLER DIZI OLARAK GELIYOR  gelen veriyi guvenlik islemine tabi tutmak
icin function olusturduk
*/  

function filtrele($deger){
    $bir = trim($deger);     // gelen verinin basindaki ve sonundaki bosluklari kaldir
    $iki = strip_tags($bir);  // gelen veride html tagi varsa temizle
    $uc   =  htmlspecialchars($iki , ENT_QUOTES);  //gelen verideki html isaretlerini temizle end_quote ile tirnaklari temizle
    $sonuc = $uc;    // degiskene atamadan direkt de uc return edilebilir
    return $sonuc;

}


$gelensecimdegerleri = $_POST["secim"];   //  POST OLARAK GELEN DEGERLERI ALMAK ICIN
$idler      = implode(", " , $gelensecimdegerleri);
$sil = $veritabanibaglantisi->prepare("DELETE FROM kisiler WHERE id IN ($idler)");
$sil->execute();

header("Location:index.php");
exit();




?>



