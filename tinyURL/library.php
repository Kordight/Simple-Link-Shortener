<?php
function getDatabaseConfig()
{
    $configFilePath = '/home/SlendertubbiesDB_Data/config.ini';
    return parse_ini_file($configFilePath, true)['database'];
}