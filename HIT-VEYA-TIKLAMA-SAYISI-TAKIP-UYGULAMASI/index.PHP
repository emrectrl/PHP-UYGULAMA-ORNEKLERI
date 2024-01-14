<?php    
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

<table width="1000" border="0" cellpadding="0" cellspacing="0"  align="center">

<tr>
    <td align="left"><b></b> G oruntuleme ve Hit Uygulamasi</td>
    <td align="right"><a href="index.php" style= "text-decoration: none color:">Ana  Sayfa</a></td>
</tr>

<tr height="30">
    <td colspan="2"></td>
</tr>


<tr>
    <td align="left">  Makale Basligi</td>
    <td align="right"> Gosterim Sayisi</td>
</tr>



<?php 
$sorgu = $veritabanibaglantisi->prepare( "SELECT * FROM makaleler");
$sorgu->execute();
 $kayitsayisi =    $sorgu->rowCount();
 $kayitlar     =  $sorgu->fetchAll(PDO::FETCH_ASSOC);
if($kayitsayisi>0){
foreach($kayitlar as $satirlar){
?>

<tr height="30">
    <td align="left"> <a href="oku.php?id=<?php echo $satirlar["id"]; ?>" style="color:white; text-decoration:none;"> &nbsp; <?php echo $satirlar["makalebasligi"]; ?></a></td>
    <td align="right"> <?php echo $satirlar["gosterimsayisi"];  ?>   </td>
</tr>











<?php
}






}






?>











</table>






<script>

</script>

<?php 











?>



</body>




</html>
<?php 
$veritabanibaglantisi = null;
?>