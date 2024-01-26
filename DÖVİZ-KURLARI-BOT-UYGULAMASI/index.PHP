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
try{
}catch(PDOException $hatamesajı){
    $veritabanibaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8;" ,"root" , "");
    echo " baglantı hatası <br> hata mesajı >>>" . $hatamesajı->getMessage() ;
    die();
}

$link = "https://www.tcmb.gov.tr/kurlar/today.xml";
$icerik = simplexml_load_file($link);
$usd_birim              = $icerik->Currency[0]->Unit;
$usd_adi                = $icerik->Currency[0]->Isim;
$usd_alis               = $icerik->Currency[0]->ForexBuying;
$usd_satıs              = $icerik->Currency[0]->ForexSelling;
$usd_efektifalıs        = $icerik->Currency[0]->BanknoteBuying;
$usd_efektifsatıs       = $icerik->Currency[0]->BanknoteSelling;

$usdguncelle = $veritabanibaglantisi->prepare("UPDATE dövizkurlari SET  adi=? , birim=? , alis=? , satis=? , efektifalis=? efektifsatis=?  WHERE kodu=?  ");
$usdguncelle->execute([   $usd_adi  , $usd_birim ,  $usd_alis,$usd_satıs,$usd_efektifalıs,$usd_efektifsatıs]);
$usdetkilenensayi = $usdguncelle->rowCount();
if($usdetkilenensayi<1){
    echo " usd güncelleme işleminde hata";
    die();
}

$aud_birim              = $icerik->Currency[1]->Unit;
$aud_adi                = $icerik->Currency[1]->Isim;
$aud_alis               = $icerik->Currency[1]->ForexBuying;
$aud_satıs              = $icerik->Currency[1]->ForexSelling;
$aud_efektifalıs        = $icerik->Currency[1]->BanknoteBuying;
$aud_efektifsatıs       = $icerik->Currency[1]->BanknoteSelling;
?>
<table align="center" width="750" border="0" cellpadding="0" cellspacing="0">
<tr height="30" bgcolor="#CCCCCC">
    <th align="left" width="200">Adı</th>
    <th align="left" width="100">Birimi</th>
    <th align="left" width="100">Alış </th>
    <th align="left" width="100">Satış</th>
    <th align="left" width="125">Efektif Alış</th>
    <th align="left" width="125">Efektif Satış</th>
</tr>
<tr height="30" >
    <td align="left" width="200"><?php echo  $usd_adi ;             ?></td>
    <td align="left" width="125"><?php echo  $usd_birim;            ?></td>
    <td align="left" width="100"><?php echo  $usd_alis;             ?></td>
    <td align="left" width="100"><?php echo  $usd_satıs;            ?></td>
    <td align="left" width="100"><?php echo  $usd_efektifalıs;      ?></td>
    <td align="left" width="125"><?php echo  $usd_efektifsatıs;     ?></td>
</tr>
<tr height="30" >
    <td align="left" width="200"><?php echo  $aud_adi ;             ?></td>
    <td align="left" width="125"><?php echo  $aud_birim;            ?></td>
    <td align="left" width="100"><?php echo  $aud_alis;             ?></td>
    <td align="left" width="100"><?php echo  $aud_satıs;            ?></td>
    <td align="left" width="100"><?php echo  $aud_efektifalıs;      ?></td>
    <td align="left" width="125"><?php echo  $aud_efektifsatıs;     ?></td>
</tr>
</table>
</body>
</html>