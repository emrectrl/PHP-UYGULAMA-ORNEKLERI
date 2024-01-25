<?php 
require_once("baglan.php");
if(isset($_POST["kullaniciadi"])){
$gelenkullanici  = filtre( $_POST["kullanıcıadi"]);
    
}else{
$gelenkullaniciadi = "";

}


if(isset($_POST["sifre"])){
    $gelensifre  =  filtre( $_POST["sifre"]);

}else{
$gelensifre = "";
}







$kontrolsorgusu = $veritabanibaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? AND sifre=?");
$kontrolsorgusu->execute([$gelenkullaniciadi , $gelensifre]);
$kontrolsayisi  =  $kontrolsorgusu->rowCount();

if($kontrolsayisi>0){
$_SESSION["kullanici"] = $gelenkullanici;
header("Location:index.php");
exit();

}else{
echo "girilen bilgiler ile eşleşen kullanıcı kaydı bulunmamaktadır";
echo "ana sayfaya dönmek için <a href='index.php'> buraya </a>  tıklayınız";

}
