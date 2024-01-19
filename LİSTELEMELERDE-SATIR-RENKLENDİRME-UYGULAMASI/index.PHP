
<?php 


try{

$veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8","root","");
}catch(PDOException $hatamesaj){
    echo "baglantı hatası <br> hata mesajı>>" . $hatamesaj;
    die();
}
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

<table width="1000" align="center" border="0" cellpadding="0" cellspacing="0" >


<tr height="30">
<td align="left">&nbsp;ÜRÜN ADI  </td>
<td align="right">ÜRÜN FİYATI &nbsp;</td>
</tr>






<?php 

$sorgu = $veritabanibaglantisi->prepare("SELECT * FROM urunler ");
$sorgu->execute();
$sorgusayisi = $sorgu->rowCount();
$sorgukayitlari = $sorgu->fetchAll(PDO::FETCH_ASSOC);
foreach($sorgukayitlari as $satirlar){






?>




<tr height="30" onMouseOver="this.bgColor='#808080';" onmouseout="this.bgColor='#000000';">
<td align="left">&nbsp; <?php  echo $satirlar["urunadi"];  ?> </td>
<td align="right"> &nbsp; <?php  echo $satirlar["urunfıyatı"];  ?> </td>
</tr>


<?php  
}
?>
</table>







</body>




</html>
<?php 

$veritabanibaglantisi =null;


?>