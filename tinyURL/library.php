<?php
function getDatabaseConfig()
{
    $configFilePath = 'C:\config.ini';
    return parse_ini_file($configFilePath, true)['database'];
}
function addQuotesToString($string)
{
    $phrasedString = '"' . $string . '"';
    return $phrasedString;
}
function calcExpireDate($valID)
{
    $currentDate = gmdate("Y-m-d\TH:i:s");

    switch ($valID) {
        case 0:
            $numberOfDaysToAdd = 1;
            break;
        case 1:
            $numberOfDaysToAdd = 3;
            break;
        case 2:
            $numberOfDaysToAdd = 7;
            break;
        case 3:
            $numberOfDaysToAdd = 31;
            break;
        case 4:
            $numberOfDaysToAdd = 90;
            break;
        case 5:
            $numberOfDaysToAdd = 365;
            break;
        default:
            $numberOfDaysToAdd = 3;
            break;
    }
    $newDate = date("Y-m-d\TH:i:s", strtotime($currentDate . " + $numberOfDaysToAdd days"));
    return $newDate;
}
