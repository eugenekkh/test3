<?php

function bigsum(string $a, string $b): string
{
    if (!ctype_digit($a)) {
        throw new \RuntimeException('Invalid value $a');
    }

    if (!ctype_digit($b)) {
        throw new \RuntimeException('Invalid value $b');
    }

    $a = strrev($a);
    $b = strrev($b);

    $aLen = strlen($a);
    $bLen = strlen($b);

    $result = '';
    $overflow = 0;

    for ($i = 0; $i < max($aLen, $bLen); $i++) {
        $aDigit = (int) ($aLen > $i ? $a[$i] : 0);
        $bDigit = (int) ($bLen > $i ? $b[$i] : 0);

        $sum = $aDigit + $bDigit + $overflow;
        if ($sum > 9) {
            $sum %= 10;
            $overflow = 1;
        } else {
            $overflow = 0;
        }

        $result .= $sum;
    }

    if ($overflow > 0) {
        $result .= '1';
    }

    return strrev($result);
}
