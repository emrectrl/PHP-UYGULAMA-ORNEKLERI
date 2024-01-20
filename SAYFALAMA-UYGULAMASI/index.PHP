<?php   
try{
$veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8","root","");
}catch(PDOException $hatamesajı){
echo "veri tabanı baglantı hatası <br> hata mesajı " . $hatamesajı;
}
if(isset($_REQUEST["sayfalama"])){
    $gelensayfalama = $_REQUEST["sayfalama"];
}else{
    $gelensayfalama = 1;
}
$sayfalamaicinbutonsayisi = 
$sayfabasinagösterilecekkayitsayisi = 5;
$toplamkayitsayisisorgusu =  $veritabanibaglantisi->prepare("SELECT * FROM ürünler ");
$toplamkayitsayisisorgusu->execute();
$toplamkayitsayisi = $toplamkayitsayisisorgusu->rowCount();
$sayfalamayabaslanacakkayitsayisi  = $gelensayfalama * $sayfabasinagösterilecekkayitsayisi-$sayfabasinagösterilecekkayitsayisi;
$bulunansayfasayisi = ceil( $toplamkayitsayisi / $sayfabasinagösterilecekkayitsayisi);



?>






<!DOCTYPE html>
<html lang="tr-TR">
    <head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<title>PHP EĞİTİM</title>
</head>
<body style="background-color: black; color:aliceblue ">


<table>
<?php 
$ürünsorgusu            =  $veritabanibaglantisi->prepare("SELECT * FROM ürünler ORDER BY id ASC LIMIT $sayfalamayabaslanacakkayitsayisi , $sayfabasinagösterilecekkayitsayisi ");
$ürünsorgusu->execute();
$ürünsorgusukayitsayisi =  $ürünsorgusu->rowCount();
$ürünsorgusukayitlari   =  $ürünsorgusu->fetchAll(PDO::FETCH_ASSOC);
foreach($ürünsorgusukayitlari as $kayitlar){

echo "<tr height='30'>";
echo "<td width='25' align='left'>" . $kayitlar["id"] . "<td>";
echo "<td width='375' align='left'>" . $kayitlar["ürünadi"] . "<td>";
echo "<td width='100' align='right'>" . $kayitlar["üründiyati"] .  " " . $kayitlar["parabirimi"] . "<td>";
echo "</tr>";
}
?>

</table>

<div class="sayfalamaalanikapsayicisi">

<div class="sayfalamaalanicimetinalanikapsayicisi">
        Toplam <?php   echo $bulunansayfasayisi;   ?> Sayfada , <?php echo $toplamkayitsayisi ?> adet kayıt var.
</div>



<div class="sayfalamaalanicinumaralandırmaalanikapsayicisi">
    <?php
if($gelensayfalama>1){
    echo " <span class='pasif'> < a href='index.php?sayfalama=1'><<</a></span>";
    $sayfalamaicinsayfadegerinibirgerial = $gelensayfalama -1;
    echo " <span class='pasif'> < a href='index.php?sayfalama=" .  $sayfalamaicinsayfadegerinibirgerial . "'><</a></span>";
}

     ?>


</div>





</div>


</body>
</html>