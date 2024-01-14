
<?php 
require("baglan.PHP");
$gelenid = filtre(  $_GET["id"]);
$hitguncelle = $veritabanibaglantisi->prepare( "UPDATE  makaleler SET  gosterimsayisi = gosterimsayisi + 1 WHERE  id = ?");
$hitguncelle->execute([$gelenid]);


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

<table width="1000" border="0" cellpadding="0" cellspacing="0"  align="center">

<tr>
    <td align="left"><b></b> G oruntuleme ve Hit Uygulamasi</td>
    <td align="right"><a href="index.php" style= "text-decoration: none color:">Ana  Sayfa</a></td>
</tr>




</table>






<?php 
$sorgu = $veritabanibaglantisi->prepare( "SELECT * FROM makaleler WHERE  id = ?");
$sorgu->execute([$gelenid]);
 $kayitsayisi =    $sorgu->rowCount();
 $kayitlar     =  $sorgu->fetch(PDO::FETCH_ASSOC);
if($kayitsayisi>0){
?>

<tr height="30">
    <td colspan="2" align="left"><h3> <?php  echo $kayitlar["makalebasligi"];?>  <h3></td>
</tr>

<tr height="30">
    <td colspan="2" align="left"> <?php  echo $kayitlar["makaleicerigi"];?>  </td>
</tr>

<tr height="30">
    <td colspan="2" align="center"> Bu makale <?php  echo $kayitlar["gosterimsayisi"];?>  defa goruntulendi </td>
</tr>

  
<?php
   
}else{
    header("Location:index.php");
}



?>









</body>
</html>
<?php 
$veritabanibaglantisi = null;
?>