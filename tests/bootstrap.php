<?php

require_once __DIR__ . '/../vendor/autoload.php';

$iniFile = __DIR__ . '/../config.ini';

if(is_file($iniFile))
{
    foreach (parse_ini_file($iniFile) as $key => $val)
    {
        putenv("{$key}={$val}");
    }
}
