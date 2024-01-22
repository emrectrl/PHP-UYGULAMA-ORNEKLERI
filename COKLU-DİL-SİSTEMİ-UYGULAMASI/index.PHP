
<?php 

session_start();
if(empty($_SESSION["sitedili"])){
    include("diltr.PHP");

}else{
    if($_SESSION["sitedili"]== "TR"){
        include("diltr.PHP");

    }else{
        include("dilen.PHP");
    }

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

<table  width="1000" align="center" border="0">
<tr height="40">
<td width="130"><?php echo ANASAYFA;?> </td>
<td width="155"><?php echo HAKKIMIZDA;?></td>
<td width="130"><?php echo ILETISIM;?></td>
<td width="373"><?php echo URUNLER;?></td>
<td width="190"><a href="secim.PHP?Dilsecimi=TR" style="color: white; text-decoration:none;">TR</a> |<a href="secim.PHP?Dilsecimi=EN" style="color: white; text-decoration:none;">EN</a></td>
</tr>
</table>


</body>
</html>