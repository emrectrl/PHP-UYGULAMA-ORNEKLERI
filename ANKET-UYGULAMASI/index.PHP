

<?php
require_once("baglan.php");
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
<?php  
$anketsorgusu = $veritabanibaglantisi->prepare("SELECT * FROM anket LIMIT 1") ; //BİRDEN FAZLA ANKET EKLENIRSE SADECE BİR TANESİ GELSİN DİYE LİMİT 1 EKLEDİK
   $anketsorgusu ->execute();
   $kayitsayisi   = $anketsorgusu ->rowCount();
   $kayit         = $anketsorgusu ->fetch(PDO::FETCH_ASSOC);

  if($kayitsayisi>0){
?>
<form action="oyver.PHP" method="post">
<table widht="300" align="center" border="0" cellpadding="0" cellspacing="0">
<tr height="30" >
     <td colspan="2"> <?php  echo $kayit["soru"] ;?> </td>
</tr>

<tr height="30">
   <td width="25"> <input type="radio" name="cevap" value="1"></td>
   <td  width="275"><?php  echo $kayit["cevapbir"] ;?>    </td>
</tr>

<tr height="30">
   <td width="25"> <input type="radio" name="cevap" value="2"></td>
   <td  width="275"><?php  echo $kayit["cevapiki"] ;?>    </td>
</tr>

<tr height="30">
   <td width="25"> <input type="radio" name="cevap" value="3"></td>
   <td  width="275"><?php  echo $kayit["cevapüc"] ;?>    </td>
</tr>

<tr height="30" >
     <td colspan="2"> <input type="submit" value="oyumu gönder"></td>
</tr>

<tr height="30" >
     <td colspan="2" align="right"> <a href="sonuclar.PHP " style=" color:white; text-decoration:none;" > Anket Sonuclarını Göster </a></td>
</tr>

</table>
</form>

<?php
  }else{
    ?>
    ANKET BULUNMUYOR
    <?php
  }
  ?>
<?php 








?>



</body>
</html>
<?php
$veritabanibaglantisi =null;