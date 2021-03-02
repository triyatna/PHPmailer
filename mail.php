<?php

                  $name=$_POST['name'];
                  $email=$_POST['email'];
                  $subject=$_POST['subject'];
                  $telepon=$_POST['telepon'];
                  $trimail=$_POST['tri-mail'];
                  $message=$_POST['message'];
                  //buat token
                  $token=hash('sha256', md5(date('Y-m-d'))) ;
                  //cek user terdaftar
                  $sql_cek=mysqli_query($koneksi,"SELECT * FROM users_tpow WHERE telepon='".$telepon."'");
                  $r_cek=mysqli_num_rows($sql_cek);
                 $insert=mysqli_query($koneksi,"INSERT INTO users_tpow(name,email,subject,telepon,message,tri-mail) VALUES('".$name."','".$email."','".$subject."','".$telepon."','".$message."','".$trimail."')");
       

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'mail.google.com';// mail host domain
$mail->SMTPAuth = true;
$mail->Username = 'user@domain.com'; //gunakan email yang valid sebagai email pengirim
$mail->Password = 'Passwordku'; //password email
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465; //Port mail
$mail->setFrom('CS@domain.id', 'Triyatna'); //gunakan email yang anda inginkan dan sebelahnya ganti dengan nama yang anda inginkan
$mail->addAddress($_POST['email']); //mail tujuan
$mail->isHTML(true);
$mail->Subject = "Email Pemberitahuan"; //subjek dari mail
$mail->Body ="<html>   <style type='text/css'>
      .f-fallback  {
        font-family: Arial, sans-serif;
      }
    </style>
  <body>
    <span style='display: none !important;
      visibility: hidden;
      mso-hide: all;
      font-size: 1px;
      mso-hide: all;
      line-height: 1px;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;'>Message From ".$email."</span>
    <table style=' width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;' width='100%' cellpadding='0' cellspacing='0' role='presentation'>
      <tr>
        <td align='center'>
          <table style='width: 110%;
      margin: 0;
      padding: 0;
      -premailer-width: 110%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;' width='100%' cellpadding='0' cellspacing='0' role='presentation'>
            <tr>
     <td style='padding: 30px 0;
      text-align: center;  background-color:#F4F4F7!important;
        color: #FFF !important;'>
                <h2>
              </h2>
              </td>
            </tr>        
             
       <td style=' width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;' width='100%' cellpadding='0' cellspacing='0'>
                <table style=' width: 570px;
      margin: 0 auto;
      padding: 0;
      border: 3px solid red;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #0fb3ff;' width='570' cellpadding='0' cellspacing='0' role='presentation'>
     
                  <tr>
                    <td style='padding: 35px;color:#FFF'>
                      <div class='f-fallback'>
                        <h1>Hayy, ".$name."!</h1>
                        <p>Pesan anda telah berhasil dikirim.<br>
                        ================================
                        <br>
                        Pesan : ".$message."
                        <br><br><br><br><br><br><br>
                        Pesan dari Email anda akan dibalas secepatnya.</p>
                        <!-- Action -->
                        <p>Terimakasih telah menghubungi.</p>
                        <p>Salam hangat.
                          <br><br><br><br>Triyatna.</p>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table style='width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
                  <tr>
                    <td style='padding: 35px;' align='center'>
                      <p class='f-fallback sub align-center'>BOT Email Otomatis Triyatna.</p>
                      <p class='f-fallback sub align-center'>
                        Jl.Selang KM4 Desa Ciwaringin Kec. Lemahabang - Karawang.
                        <br>JawaBarat - Kodepos 41383
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
";
$mail->isHTML(true);
$mail->send();
echo 'Email berhasil di kirim!';






