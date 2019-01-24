<?php

// settings
$send_to = "2ral@gmail.com";
$subject = "Crea: New Message";
// end settings

$mailcontent = "You have 1 new message:\n";
$mailcontent .= "From: ".$_POST["name"]."\n";
$mailcontent .= "Email: ".$_POST["email"]."\n";
if ($_POST["website"])
   $mailcontent .= "Website: ".$_POST["website"]."\n";
if ($_POST["phone"])
   $mailcontent .= "Phone: ".$_POST["phone"]."\n";
$mailcontent .= "Message: ".$_POST["message"]."\n";

echo "Your message has been sent.";

$subject=iconv("utf8", "cp1251", $subject);
$subject = '=?koi8-r?B?'.base64_encode(convert_cyr_string($subject, "w","k")).'?=';
$headers .= "Content-Type: text/plain; "
. "charset=UTF-8; format=flowed\n"
. "MIME-Version: 1.0\n"
. "From: Parallax <mailer@parallax>\n"
. "Content-Transfer-Encoding: 8bit\n"
. "X-Mailer: PHP\n";

$res = mail($send_to, $subject, $mailcontent, $headers);

?>
