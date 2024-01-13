<?php
echo"-------------------> KISI SILME UYGULAMASI   <-----------------------------";
//-------------------------->  KISI SILME UYGULAMASI <-------------------------------------------
echo "<br>";
/*                                    
veri tabani baglantisini ayri bir sayfada yaptik ismi baglan.php
*/  
require_once("baglan.PHP");
?>





<!DOCTYPE html>
<html lang="tr-TR">
    <head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<title>PHP EĞİTİM</title>
<style>
</style>    
</head>
<body style="background-color: black; color:aliceblue ">
<script>
</script>



<form action="silme.PHP" method="post">
<table width="500" align="center"  cellpadding="0" cellspacing="0">
<?php 
// dongu icerisindeki veriyi tablolamak icin php taglarini table icerisine aldik

$sorgu = $veritabanibaglantisi->prepare("SELECT * FROM kisiler");
$sorgu->execute();

$kayitsayisi =  $sorgu->rowCount();       //kayit sayisini aldik
$kayitlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);        //kayitlari depoluyoruz fecht yontemleri ile fetch all diyoruz dizi olarak alaccagimiz icin
foreach($kayitlar as $kayitsatirlari){     // kayitlar dizisini kayit satiri dizisine ata
    ?>
   <tr>
<td width="25" height="30" align="left"><input type="checkbox" name="secim[]" value="<?php echo $kayitsatirlari["id"];?>" ></td>
<td align="left"><?php echo  $kayitsatirlari["adi"]   .  " " .    $kayitsatirlari["soyadi"]      ?></td>
   </tr>
<?php
}
//asagida ki butona basinca secili olanlari silmek icin silme sayfasina gececek silme ile ilgili islemler o sayfada
?>

<tr>
<td colspan="2" align="left"> <input type="submit" value="secili olanlari sil"> </td>

</tr>


</table>
</form>






    
    




</body>




</html>