
<?php 
  
  echo"-------------------> ILETISIM FORMU ORNEK UYGULAMASI <-----------------------------";
  //--------------------------> ILETISIM FORMU ORNEK UYGULAMASI  <-------------------------------------------
  echo "<br>";
  /*                                    
   ILETISIM FORMU ORNEK UYGULAMASI
   NOT  DENEME ICIN GITHUB UZERINDEN ORNEK KODLAR CEKILDI VE UZERINDE DUZENLEMELER YAPILDI  ILGILI ALICI 
   GONDERICI VE SMTP MAIL ALANLARI BOS BIRAKILDI LOCALHOST UZERINDE DENEME YAPTIGIM ICIN CALISMAYACAKTI

   https://github.com/PHPMailer/PHPMailer uzerinden gerekli kodlar tedarik edildi
  */
  
  echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
  
  
  

header("Content-Type:tex/html; charset=utf-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/*guvenlik fonksiyonu kullanici verilerin icerisine birtakim zararli kodlar sikistirabilir bunu engellemek
icin html spesial  fonksiyonunu kullaniyoruz
*/
function filtrele($deger){                                      //once bir fonksiyon olustur
    $islembir  = trim($deger);                                 //ilk islemde parametre olarak gelen degerin basindaki ve sonundaki bosluklari kaldir
    $islemiki  = strip_tags($islembir);                       //ilk islemden gelen bosluklari temizlenmis verinin icindeki html karakterlerini kaldir
    $islemuc   = htmlspecialchars($islemiki , ENT_QUOTES);   // html ozel karakterlerini yok et
    $sonuc     =$islemuc;
    return $sonuc;

}






//gelen bilgileri almak    ancak tum bilgileri once filtrele fonksiyonundan geciriyoruz
$gelenisimsoyisim   =  filtrele(   $_POST  ["adisoyadi"]);
$gelentelefon       =  filtrele(   $_POST  ["telefon"]);
$gelenemailadresi   =  filtrele(   $_POST  ["emailadresi"]);
$gelenkonu          =  filtrele(   $_POST  ["konusu"]);
$gelenmesaj         =  filtrele(   $_POST  ["mesaj"]);

echo  "ISIM SOYISIM : " . $gelenisimsoyisim."<br>";
echo  "TELEFON      : " . $gelentelefon    ."<br>";
echo  "E-MAIL       : " . $gelenemailadresi."<br>";
echo  "KONU         : " . $gelenkonu       ."<br>";
echo  "MESAJ        : " . $gelenmesaj      ."<br>";




die();














$mailgonder = new PHPMailer(true);
try {
    //sunucu ayarlari
    $mailgonder->SMTPDebug      =         2;                       //debug ciktisi (0 kapali 2 detayli)
    $mailgonder->isSMTP();                                         //Send using SMTP
    $mailgonder->Host           = 'smtp.example.com';              //gonderilecek smtp mail adresi
    $mailgonder->SMTPAuth       = true;                            //smtp nin aktif edilmesi
    $mailgonder->CharSet        = 'UTF-8';                         // GONDERILEN MESAJIN TR KARAKTER DESTEGI ICIN
    $mailgonder->Username       = 'user@example.com';              //mailin gonderilecegi mail adresi
    $mailgonder->Password       = 'secret';                        //SMTP mailinin sifresi
    $mailgonder->SMTPSecure     = PHPMailer::ENCRYPTION_SMTPS;     //maili gondermek icin tls mi yoksa smtp yapisini mi kullanacagiz
    $mailgonder->Port           = 465;                             //sunucu firmasinin verdigi port numarasi
    $mailgonder->SMTPOptions    = array(
                                   'ssl'=>[
                                       'verify_peer'=>false,
                                       'verify_peer_name'=>false,
                                       'allow_self_signed'=>true,
                                          ],
                                     );

    //gonderici ayarlari
    $mailgonder->setFrom($gelenemailadresi, $gelenisimsoyisim);      //kim gonderecek? mail girilmeli
    $mailgonder->addAddress('joe@example.net', 'Joe User');         //kime gidecek?   mail girilmeli
    $mailgonder->addReplyTo($gelenemailadresi, $gelenisimsoyisim); //yanitlama maili
  
    //gonderim turu icerigi
    $mailgonder->isHTML(true);                                                            //html icerebilir mi?
    $mailgonder->Subject = 'Here is the subject';                                        //mailin konusu
    $mailgonder->Body    = 'This is the HTML message body <b>in bold!</b>';              //mailin govdesi (icerigi)
    $mailgonder->AltBody = 'This is the body in plain text for non-HTML mail clients';   //mailin govdesi (html mail kabul etmeyen sunucular icin)
    $mailgonder->send();                                                                  //mailin gonderilmesini saglar
    echo 'mail gonderildi';   
} catch (Exception $e) {
    echo "Mail gonderim hatasi <br> hata aciklamasi>>: {$mailgonder->ErrorInfo}";
}























?>

