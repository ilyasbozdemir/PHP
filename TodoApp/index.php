<?php

session_start();

require __DIR__ . '/config/config.php';

if (DEV_MODE == true) {
    error_reporting(E_ALL);
    ini_set('error_reporting', true);
} else {
    error_reporting(0);
    ini_set('error_reporting', false);
}



foreach (glob(BASEDIR . '/helpers/*.php') as $file) {
    require $file;
}

$config['route'][0] = 'home';
$config['lang'] = 'tr';

if (isset($_GET['route'])) {
    preg_match('@(?<lang>\b[a-z]{2}\b)?/?(?<route>.+)/?@', $_GET['route'], $result);
}

if (isset($result['lang'])) {
    if (file_exists(BASEDIR . '/language/' . $result['lang'] . '.php')) {
        $config['lang'] = $result['lang'];
    } else {
        $config['lang'] = 'tr';
    }
}

require BASEDIR . '/language/' . $config['lang'] . '.php';


if (isset($result['route'])) {
    $config['route'] = explode('/', $result['route']);
}



if (file_exists(BASEDIR . '/controller/' . $config['route'][0] . '.php')) {
    require BASEDIR . '/controller/' . $config['route'][0] . '.php';
} else {
    echo 'Sayfa bulunamadı';
}

if(get_session('error')) add_session('error', null);
if(get_session('post')) add_session('post', null);

$ip = '192.127.124.199';

exec("ping -n 3 $ip", $output, $status);
print_r($output);
?>