

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

  $anketinbirincisikkiicinoysayisi    =    $kayit["oysayisibir"];
  $anketinikincisikkiicinoysayisi     =    $kayit["oysayisiiki"];
  $anketinucuncusikkiicinoysayisi     =    $kayit["oysayisiuc"];
  $anketintoplamoysayisi              =    $kayit["toplamoysayisi"];

  $birincisacenekicinyüzdehesapla  =  ($anketinbirincisikkiicinoysayisi/$anketintoplamoysayisi)*100;
  $birincisacenekicinyüzde  =  number_format($birincisacenekicinyüzdehesapla , 2 , " ","");
  $ikincisacenekicinyüzdehesapla  =  ($anketinikincisikkiicinoysayisi/$anketintoplamoysayisi)*100;
  $ikincisacenekicinyüzde  =  number_format($ikincisacenekicinyüzdehesapla , 2 , " ","");
  $ucuncusacenekicinyüzdehesapla  =  ($anketinucuncusikkiicinoysayisi/$anketintoplamoysayisi)*100;
  $ucuncusacenekicinyüzde  =  number_format($ucuncusacenekicinyüzdehesapla , 2 , " ","");

  if($kayitsayisi>0){
?>

<table widht="300" align="center" border="0" cellpadding="0" cellspacing="0">
<tr height="30" >
     <td colspan="2"> <?php  echo $kayit["soru"] ;?> </td>
</tr>

<tr height="30">
   <td width="50"> %    <?php  echo  $birincisacenekicinyüzde ;   ?>       </td>
   <td  width="250"><?php  echo $kayit["cevapbir"] ;?>    </td>
</tr>

<tr height="30">
   <td width="50">    <?php  echo  $ikincisacenekicinyüzde ;   ?>   </td>
   <td  width="250"><?php  echo $kayit["cevapiki"] ;?>    </td>
</tr>

<tr height="30">
   <td width="50">    <?php  echo  $ucuncusacenekicinyüzde ;   ?>   </td>
   <td  width="250"><?php  echo $kayit["cevapüc"] ;?>    </td>
</tr>



<tr height="30" >
     <td colspan="2" align="right"> <a href="index.PHP " style=" color:white; text-decoration:none;" > ANA SAYFAYA DÖN  </a></td>
</tr>

</table>


<?php
  }else{
    header("Location:index.PHP");
    exit();
    ?>
   
    <?php
  }
  ?>
<?php 








?>



</body>
</html>
<?php
$veritabanibaglantisi =null;