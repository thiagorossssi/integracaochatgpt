<?php

$base = explode('/', $_SERVER['PHP_SELF']);
global $config;
$config = [];

//Se ambiente for de desenvolvimento, usar configurações para dev, senão usar configurações de produção
if (file_exists('environment.php')) {
    require_once 'environment.php';
    if (ENVIRONMENT == 'development') {
        define("BASE", "http://" . $_SERVER['HTTP_HOST'] . "/" . $base[1] . "/" . $base[2]);
        $config['driver'] = 'mysql';
        $config['dbname'] = 'chatgpt';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = 'toor';
        $config['charset'] = 'utf8mb4';
    } else {
        define("BASE", "https://" . $_SERVER['HTTP_HOST']);
        $config['driver'] = 'mysql';
        $config['dbname'] = '';
        $config['host'] = '';
        $config['dbuser'] = '';
        $config['dbpass'] = '';
        $config['charset'] = '';
    }
}
