<?php  
try{
$veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8" , "root" , "");

}catch(PDOException $hatamesajı){
echo "baglantı hatası<br> hata mesajı>>>>" . $hatamesajı;
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
<?php   
$reklamsorgusu = $veritabanibaglantisi->prepare(" SELECT * FROM bannerlar ORDER BY gösterimsayisi ASC LIMIT 1");
$reklamsorgusu->execute();
$reklamsayisi = $reklamsorgusu->rowCount();
$reklamkaydi  = $reklamsorgusu->fetch(PDO::FETCH_ASSOC);

?>

<table width="1000" align="center" border="0" cellpadding="0" cellspacing="0" >
<tr height="150" >
 <td align="center"> <img src=" <?php $reklamkaydi["bannerdosyasi"]; ?>"border="0" width="300px" > </td>
</tr>
</table>

</body>
</html>
<?php 
$reklamgüncelle = $veritabanibaglantisi->prepare("UPDATE bannerlar SET gösterimsayisi = gösterimsayisi+1 WHERE id = ?  LIMIT 1 ");
$reklamgüncelle->execute(["id"]);
$veritabanibaglantisi =null;
?>