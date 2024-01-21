<?php 
header("Content-Type: text/xmlns");

try{
    $veritabnıbaglantısı = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8","root","");
}catch(PDOException  $hatamesajı ){
echo "baglantı hatası  <br>  hata mesajı >>>" . $hatamesajı;
    die();


}
echo "<?xml version ='1.0' encoding='utf8'?>
<rss xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' version='2.0'>
<channel>

<title> extraegitim</title>
<description> ileri seviye egitim setleri</link>
<link>http://www.extraegitim.com</link>
<language>tr</language>";


$sorgu = $veritabanibaglantisi->prepare("SELECT * FROM ürünler");
$sorgu->execute();
$sorgusayisi = $sorgu->rowCount();
$sorgukayitlari = $sorgu->fetchAll(PDO::FETCH_ASSOC);
if($sorgusayisi>0){
    foreach($sorgukayitlari as $satirlar){
        echo "<item>
        <title>" .$satirlar["ürünadi"] . "</title>
        <price>" . $satirlar["üründiyati"] . "</price>
        </item>";
    }

}






echo "
</channel>
</rss>";




$veritabanibaglantisi = null;

?>



