<?php

echo "\033[38;5;208m\033[1;31m==============================\n";
echo "| \033[2;32m[+] YouTube    : \033[38;5;208m|أحمد الحراني \n";
echo "| \033[2;32m[+] TeleGram   : \033[38;5;208m maho_s9    |\n";
echo "| \033[2;32m[+] Instagram  : \033[38;5;208m mahmedalharrani |\n";
echo "| \033[2;32m[+] Tool       : \033[38;5;208mAvailable Username IG |\n";
echo "| \033[2;32m[+] Server     : \033[38;5;208m Web |\n";
echo "\033[1;31m==============================\n";

$ID = readline("ENTER YOUR ID: ");
$token = readline("ENTER YOUR TOKEN: ");

function mahos($user) {
    $csr = bin2hex(random_bytes(8)) . bin2hex(random_bytes(8));
    $uid = strtoupper(bin2hex(random_bytes(16)));
    $miid = strtoupper(bin2hex(random_bytes(7)));
    $dtr = bin2hex(random_bytes(7));
    $cookies = [
        'csrftoken' => $csr,
        'dpr' => '2.1988937854766846',
        'ps_n' => '0',
        'ps_l' => '0',
        'mid' => $miid,
        'ig_did' => $uid,
        'datr' => $dtr,
        'ig_nrcb' => '1',
    ];
    $headers = [
        'authority' => 'www.instagram.com',
        'accept' => '*/*',
        'accept-language' => 'ar-YE,ar;q=0.9,en-YE;q=0.8,en-US;q=0.7,en;q=0.6',
        'content-type' => 'application/x-www-form-urlencoded',
        'dpr' => '2.19889',
        'origin' => 'https://www.instagram.com',
        'referer' => 'https://www.instagram.com/accounts/emailsignup/',
        'sec-ch-prefers-color-scheme' => 'dark',
        'sec-ch-ua' => '"Not)A;Brand";v="24", "Chromium";v="116"',
        'sec-ch-ua-mobile' => '?0',
        'sec-ch-ua-model' => '""',
        'sec-ch-ua-platform' => '"Linux"',
        'sec-ch-ua-platform-version' => '""',
        'sec-fetch-dest' => 'empty',
        'sec-fetch-mode' => 'cors',
        'sec-fetch-site' => 'same-origin',
        'user-agent' => 'Mozilla/5.0 (Linux; Android 10; SM-A205U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36',
        'viewport-width' => '891',
        'x-asbd-id' => '129477',
        'x-csrftoken' => $csr,
        'x-ig-app-id' => '936619743392459',
        'x-ig-www-claim' => '0',
        'x-instagram-ajax' => '1012280089',
        'x-requested-with' => 'XMLHttpRequest',
    ];
    $timestamp = time();
    $data = [
        'enc_password' => "#PWD_INSTAGRAM_BROWSER:0:{$timestamp}:mahos999",
        'email' => 'mahos@mahos.com',
        'first_name' => 'Ahmedalhrrani',
        'username' => $user,
        'client_id' => $miid,
        'seamless_login_enabled' => '1',
        'opt_into_one_tap' => 'false',
    ];
    $data_string = http_build_query($data);

    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => implode("\r\n", array_map(function($k, $v) {
                return "$k: $v";
            }, array_keys($headers), $headers)),
            'content' => $data_string,
            'timeout' => 60,
        ],
    ]);

    $result = file_get_contents('https://www.instagram.com/api/v1/web/accounts/web_create_ajax/attempt/', false, $context);
    if (strpos($result, '"dryrun_passed":true,') !== false) {
        echo "\033[2;32mGood Username : $user\n";
        $tlg = "
            Hi hunt Username INSTAGRAM
            ⋘─────━*AHMED*━─────⋙
            Good Username : $user
            Instagram ==√
            ⋘─────━*AHMED*━─────⋙";
        echo "\033[2;32m$tlg\n";
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$ID&text=" . urlencode($tlg));
    } else {
        echo "\033[1;31mBAD USERNAME: $user\n";
    }
}

function randomusers() {
    while (true) {
        $v1 = chr(mt_rand(97, 122));
        $v2 = chr(mt_rand(97, 122));
        $v3 = chr(mt_rand(97, 122));
        $v4 = chr(mt_rand(97, 122));
        $vx = chr(mt_rand(97, 122));
        $v5 = '.';
        $v6 = '_';

        $all = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $simm = $all[mt_rand(0, strlen($all) - 1)];
        $defr = substr(str_shuffle(str_replace($simm, '', $all)), 0, 1);
        $stru = str_repeat($simm, (6 - 1)) . $defr;
        $hh = '';
        foreach (array_rand(str_split($stru), 6) as $key) {
            $hh .= $stru[$key];
        }

        $user1 = $v6 . $v1 . $v2 . $v3;
        $user2 = $v1 . $v2 . $v3 . $v4;
        $user3 = $v2 . $v5 . $v3 . $v4;
        $user4 = $v2 . $v3 . $v5 . $v4;
        $user5 = $hh;
        $user6 = $vx . $v6 . $vx . $v6 . $vx;
        $user7 = $vx . $v5 . $vx . $v5 . $vx;
        $ahmed = [$user5, $user1, $user2, $user3, $user4, $user5];
        $user = $ahmed[array_rand($ahmed)];
        mahos($user);
    }
}

randomusers();
?>
