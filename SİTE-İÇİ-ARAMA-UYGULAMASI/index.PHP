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

</head>
<body style="background-color: black; color:aliceblue ">
<br><br>

<form action="index.PHP" method="post">
<table width="500" border="0" cellpadding="0" cellspacing="0" align="0">
<tr>
<td> <input type="text" name="kelime" style=" width: 100%; height:30px; margin-bottom:20px;"></td>
</tr>
<tr>
<td align="center"> <input type="submit" value="aramayap" style=" padding: 0 100px; height:30px"></td>
</tr>
</form>

<?php    
if(isset($_POST["kelime"])){
    $gelenkelime  =  filtre($_POST["kelime"]);
}else{
    $gelenkelime  = "";
}
if($gelenkelime!=""){

$kosul = "%$gelenkelime%";
$sorgu        = $veritabanibaglantisi->prepare("SELECT * FROM esyalar WHERE adi LIKE ? ");
$sorgu->execute([$kosul]);
$kayitsayisi = $sorgu->rowCount();
$kayitlar  =  $sorgu->fetchAll(PDO::FETCH_ASSOC);
echo "bulunan kayıtlar <br>" ;
foreach($kayitlar as $satirlar){
    echo  "Bulunan kayıt::" . $satirlar["adi"];
}
}

?>






</table>
</body>
</html>
<?php 
$veritabanibaglantisi = null;
?>
