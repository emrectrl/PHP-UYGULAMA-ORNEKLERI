<?php 
session_start(); ob_start();
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
 <table width="1000" height="600" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td colspan="5" height="100" bgcolor="#cccccc" >ÜST ALAN (HEADER) (LOGO-BANNER - MENULER)   </td>
    </tr>
    <tr>
    <td colspan="5" height="20"  > &nbsp; </td>
    </tr>
<tr> 
<td   width="200"  valign="top" height="100" bgcolor="#cccccc">ANASAYFA</td>
<td width="10" height="400" > &nbsp;</td>
<td width="480" height="400" bgcolor="#cccccc"> MAİN ALANI</td>
<td width="10" height="400" > &nbsp;</td>
<td width="300" height="400" valign="top" > 


<?php  if(isset($_SESSION["kullanici"])){?>
<table width="250">
<tr>
<td colspan="3" height="30" bgcolor="#990000" style="color:#FFFFFF" > ÜYELİK ALANI </td>
</tr>
<tr>
<td  height="30"  align="LEFT" >&nbsp; MERHABA XXX </td>
</tr>
<tr>
<td  height="30"  align="right" >&nbsp; ÇIKIŞ YAP </td>
</tr>
</table>
<?php  }else{  ?>
    <form action="uyegiris.php" method="post">
  <table width="300" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td colspan="3" height="30" bgcolor="#990000" style="color:#FFFFFF" > ÜYELİK ALANI </td>
</tr>
<tr>
<td  height="30"  width="100"  > &nbsp; KULLANICI ADI</td>
<td  height="30"   width="10" >:</td>
<td  height="30"   width="190"  >  <input type="text " name="kullanıcıadi" style="width: 100%"></td>
</tr>
<tr>
<td  height="30"  width="100"  > &nbsp; ŞİFRE</td>
<td  height="30"   width="10" >:</td>
<td  height="30"   width="190"  >  <input type="password " name="sifre" style="width: 100%"></td>
</tr>
<tr>
<td  height="30"  width="100"  > &nbsp; </td>
<td  height="30"   width="10" ></td>
<td  height="30"   width="190"  align="right" >  <input type="submit" value="Giriş yap"></td>
</tr>
<tr>
<td colspan="3" height="30"  align="right" >&nbsp; YENİ ÜYE OL </td>
</tr>
       </table>
       </form>

       <?php } ?>

<table width="250">
<tr>
<td  height="30" bgcolor="#990000" style="color:#FFFFFF" > ÜYELİK ALANI </td>
</tr>
</table>
</td>
</tr>
  <tr>
    <td colspan="5" height="20"  > &nbsp; </td>
    </tr>

      <tr>
      <td colspan="5" height="100"bgcolor="#cccccc" >ALT ALAN (FOOTER ALANI)  (LOGO - BANNER-MENULER)    </td>
      </tr>
</table>
</body>
</html>