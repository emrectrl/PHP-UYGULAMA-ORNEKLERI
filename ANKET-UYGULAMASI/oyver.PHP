
<?php 
require_once("baglan.php");


$gelencevap = filtre($_POST["cevap"]);

$kontrolsorgusu  = $veritabanibaglantisi->prepare("SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >= ?");

$kontrolsorgusu->execute([$ipadresi , $zamandamgasi]);
$kontrolsayisi = $kontrolsayisi->rowCount();
if($kontrolsayisi>0){
    echo "hata<br>";
    echo "daha önce oy kullanmışsınız lütfen en az 24 saat sonra tekrea  deneyiz. <br>";
    echo "anasayfaya donmek için tıklayınız...  <a href='index.PHP'>tıklayınız.</a>";

}else{

     if($gelencevap==1){
            $guncelle = $veritabanibaglantisi->prepare("UPDATE anket SET oysayisibir=oysayisi+1 , toplamoysayisi=toplamoysayisi+1");
            $guncelle->execute();
     
     
        }elseif($gelencevap==2){

            $guncelle = $veritabanibaglantisi->prepare("UPDATE anket SET oysayisiiki=oysayisiiki+1 , toplamoysayisi=toplamoysayisi+1");
            $guncelle->execute();
     
     }elseif($gelencevap==3){
        $guncelle = $veritabanibaglantisi->prepare("UPDATE anket SET oysayisiuc=oysayisiuc+1 , toplamoysayisi=toplamoysayisi+1");
        $guncelle->execute();
 

     }else{

        echo "hata<br>";
        echo "cevap kaydı bulunamıyor  <br>";
        echo "anasayfaya donmek için tıklayınız...  <a href='index.PHP'>tıklayınız.</a>";
     }
     $ekle = $veritabanibaglantisi->prepare("INSERT INTO  oykullananlar (ipadresi,tarih) values(?,?)");
     $ekle->execute([$ipadresi,$zamandamgasi]);
     $eklekontrol  = $ekle->rowCount();
     if($eklekontrol>0){
     echo "tesekkürler<br>";
     echo "vermis oldugunz oy sisteme kaydedildi <br>";
     echo "anasayfaya donmek için tıklayınız...  <a href='index.PHP'>tıklayınız.</a>";
     



     }else{
        echo "hata<br>";
        echo "işlem sırasında beklenmeyen bir hata olustu lutfen daha sonra tekrar deneyiniz   <br>";
        echo "anasayfaya donmek için tıklayınız...  <a href='index.PHP'>tıklayınız.</a>";


     }


}


$veritabanibaglantisi =null;
?>
$veritabanibaglantisi =null;