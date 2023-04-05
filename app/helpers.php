<?php

function getOperator($phoneNumber)
{

    $result = str_replace("88", "", $phoneNumber);
    $result = str_replace("+88", "", $phoneNumber);
    $result = (int)substr($result, 2, 1);
    // operator check GP(017,013), ROBI(016,018), B-LINK(019,014) and T-TALK(015)
    if ($result == 3 || $result == 7) {
        return "GP";
    } else if ($result == 6 || $result == 8) {
        return "ROBI";
    } else if ($result == 4 || $result == 9) {
        return "B-LINK";
    } else if ($result == 5) {
        return "T-TALK";
    } else {
        return "WIFI";
    }
}
