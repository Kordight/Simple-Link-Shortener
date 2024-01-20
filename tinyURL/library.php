<?php
function getDatabaseConfig()
{
    $configFilePath = '/home/SlendertubbiesDB_Data/config.ini';
    return parse_ini_file($configFilePath, true)['database'];
}
function addQuotesToString($string)
{
    $phrasedString = '"' . $string . '"';
    return $phrasedString;
}
