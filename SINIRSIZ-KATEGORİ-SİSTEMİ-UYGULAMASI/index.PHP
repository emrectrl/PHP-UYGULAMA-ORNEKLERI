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

function acilirlisteicinmenuyaz($menuustiddegeri = 0 , $boslukdegeri=0){
    global $veritabanibaglantisi;
    
    $menusorgusu = $veritabanibaglantisi->prepare(" SELECT * FROM menuler WHERE ustid=?");
    $menusorgusu->execute([$menuustiddegeri]);
    $menusorgususayi = $menusorgusu->rowCount();
    $menusorgusukayitlari = $menusorgusu->fetchAll(PDO::FETCH_ASSOC);
    if($menusorgususayi>0){
    foreach($menusorgusukayitlari as $kayitlar){
             $menuid = $kayitlar["id"];
             $menuustid = $kayitlar["ustid"];
             $menuadiid = $kayitlar["menuadi"];
    
             echo "<option value='" . $menuid . "'>" .str_repeat("&nbsp;" , $boslukdegeri). $menuadiid . "<option>";
    
             echo str_repeat("&nbsp;" , $boslukdegeri). $menuadiid .  "<a href='guncelle.php?id=' ". $menuid . "'>[güncelle]</a>  <a href='sil.php?id=" . $menuid . "'>[sil]</a><br>";    
             acilirlisteicinmenuyaz($menuid , $boslukdegeri+5);
    
          }
       }
    }
function menuyaz($menuustiddegeri = 0 , $boslukdegeri=0){
global $veritabanibaglantisi;

$menusorgusu = $veritabanibaglantisi->prepare(" SELECT * FROM menuler WHERE ustid=?");
$menusorgusu->execute([$menuustiddegeri]);
$menusorgususayi = $menusorgusu->rowCount();
$menusorgusukayitlari = $menusorgusu->fetchAll(PDO::FETCH_ASSOC);
if($menusorgususayi>0){
foreach($menusorgusukayitlari as $kayitlar){
         $menuid = $kayitlar["id"];
         $menuustid = $kayitlar["ustid"];
         $menuadiid = $kayitlar["menuadi"];
         echo str_repeat("&nbsp;" , $boslukdegeri) . $menuadiid .  "<a href='guncelle.php?id=' ". $menuid . "'>[güncelle]</a>  <a href='sil.php?id=" . $menuid . "'>[sil]</a><br>";    
         menuyaz($menuid , $boslukdegeri+10);

        }
     }
   }
//yeni menü ekleme
// menüleri listeleme
menuyaz();
?>


menü ekleme formu <br>
<form action="ekle.php" method="post">
    üst menü: <select name="ustmenusecimi" >
        <option value="0">ana menü</option>
               <?php         acilirlisteicinmenuyaz();               ?>
              </select>
     menüadi: <input type="text" name="menuadi" ><br>
      <input type="submit" value="menü ekle">




</form><br><br><br>








<?php

$veritabanibaglantisi = null;
?>
</body>
</html>