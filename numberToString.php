<?php
function number1($num) {
    $res = 0;
    $num1 = ['ноль', ['один', 'одна'], ['два', 'две'], 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
    if ($num == 1) {
        return $num1[1][0];
    } elseif ($num == 2) {
        return $num1[2][0];
    } elseif ($num == 0) {
        return $num1[0];
    } else {
        if (mb_strlen($num) > 1) {
            return $num1[substr($num, 1, 1)];
        } else {
            return $num1[$num];
        }
    }
}

function number2($num) {
    if ($num == 0) {
        return null;
    } elseif (substr($num, 0, 1) == 0) {
        return number1(substr($num, 1));
    } else {
        $num1 = ['ноль', ['один', 'одна'], ['два', 'две'], 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
        $num2 = ['десять', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
        if (substr($num, 0, 1) == 1) {
            if (substr($num, 1, 1) == 1) {
                return $num1[1][0] . 'надцать';
            } elseif (substr($num, 1, 1) == 2) {
                return $num1[2][1] . 'надцать';
            } elseif (substr($num, 1, 1) == 0) {
                return $num2[0];
            } else {
                return str_replace('ь', '', ($num1[substr($num, 1, 1)])) . 'надцать';
            }
        } else {
            if (substr($num, 1, 1) == 1) {
                return $num2[substr($num, 0, 1) - 1] . ' ' . $num1[1][0];
            } elseif (substr($num, 1, 1) == 2) {
                return $num2[substr($num, 0, 1) - 1] . ' ' . $num1[2][0];
            } elseif (substr($num, 1, 1) == 0) {
                return $num2[substr($num, 0, 1) - 1];
            } else {
                return $num2[substr($num, 0, 1) - 1] . ' ' . $num1[substr($num, 1, 1)];
            }
        }
    }
}
function number3($num) {
    $num3 = ['сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'];
    if($num == 0) {
        return null;
    }
    return $num3[substr($num, 0, 1) - 1];
}

function number6($a) {
    if($a == 0) {
        return null;
    }
    $num1 = ['ноль', ['один', 'одна'], ['два', 'две'], 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
    $num2 = [null, 'десять', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
    $num4 = ['тысяча', 'тысяч', 'тысячи'];
    if (substr($a, 2, 1) == 1) {
        $res = number3(substr($a, 0, 1)) . ' ' . $num2[substr($a, 1, 1)] . ' ' . $num1[1][1] . ' ' . $num4[0] . ' ' . number3(substr($a, 3, 1)) . ' ' . number2(substr($a, 4));
    } elseif (substr($a, 2, 1) == 2) {
        $res = number3(substr($a, 0, 1)) . ' ' . $num2[substr($a, 1, 1)] . ' ' . $num1[2][1] . ' ' . $num4[2] . ' ' . number3(substr($a, 3, 1)) . ' ' . number2(substr($a, 4));
    } elseif (substr($a, 2, 1) == 0) {
        $res = number3(substr($a, 0, 1)) . ' ' . $num2[substr($a, 1, 1)] . ' ' . $num4[1] . ' ' . number3(substr($a, 3, 1)) . ' ' . number2(substr($a, 4));
    } else {
        if (mb_strpos($num1[substr($a, 2, 1)], 'ь') == false) {
            $res = number3(substr($a, 0, 1)) . ' ' . number2(substr($a, 1, 2)) . ' ' . $num4[2] . ' ' . number3(substr($a, 3, 1)) . ' ' . number2(substr($a, 4));
        } else {
            $res = number3(substr($a, 0, 1)) . ' ' . number2(substr($a, 1, 2)) . ' ' . $num4[1] . ' ' . number3(substr($a, 3, 1)) . ' ' . number2(substr($a, 4));
        }
    }
    return $res;
}

function numberToString($a)
{
    $num1 = ['ноль', ['один', 'одна'], ['два', 'две'], 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
    $num2 = [null, 'десять', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
    $num4 = ['тысяча', 'тысяч', 'тысячи'];
    $num6 = ['миллион', 'миллионов', 'миллиона'];
    $lenght = mb_strlen($a);

    if ($lenght == 1) {
        $res = number1($a);
    } elseif ($lenght == 2) {
        $res = number2($a);
    } elseif ($lenght == 3) {
        $res = number3(substr($a, 0, 1)) . ' ' . number2(substr($a, 1));
    } elseif ($lenght == 4) {
        if (substr($a, 0, 1) == 1) {
            $res = $num1[1][1] . ' ' . $num4[0] . ' ' . number3(substr($a, 1, 1)) . ' ' . number2(substr($a, 2));
        } else {
            if (mb_strpos($num1[substr($a, 0, 1)], 'ь') == false) {
                $res = number1(substr($a, 0, 1)) . ' ' . $num4[2] . ' ' . number3(substr($a, 1, 1)) . ' ' . number2(substr($a, 2));
            } else {
                $res = number1(substr($a, 0, 1)) . ' ' . $num4[1] . ' ' . number3(substr($a, 1, 1)) . ' ' . number2(substr($a, 2));
            }
        }
    } elseif ($lenght == 5) {
        if (substr($a, 1, 1) == 1) {
            $res = $num2[substr($a, 0, 1)] . ' ' . $num1[1][1] . ' ' . $num4[0] . ' ' . number3(substr($a, 2, 1)) . ' ' . number2(substr($a, 3));
        } elseif (substr($a, 1, 1) == 2) {
            $res = $num2[substr($a, 0, 1)] . ' ' . $num1[2][1] . ' ' . $num4[2] . ' ' . number3(substr($a, 2, 1)) . ' ' . number2(substr($a, 3));
        } elseif (substr($a, 1, 1) == 0) {
            $res = $num2[substr($a, 0, 1)] . ' ' . $num4[1] . ' ' . number3(substr($a, 2, 1)) . ' ' . number2(substr($a, 3));
        } else {
            if (mb_strpos($num1[substr($a, 1, 1)], 'ь') == false) {
                $res = number2(substr($a, 0, 2)) . ' ' . $num4[2] . ' ' . number3(substr($a, 2, 1)) . ' ' . number2(substr($a, 3));
            } else {
                $res = number2(substr($a, 0, 2)) . ' ' . $num4[1] . ' ' . number3(substr($a, 2, 1)) . ' ' . number2(substr($a, 3));
            }
        }
    } elseif ($lenght == 6) {
        $res = number6($a);
    } elseif ($lenght == 7) {
        if (substr($a, 0, 1) == 1) {
            $res = $num1[1][0] . ' ' . $num6[0] . ' ' . number6(substr($a, 1));
        } elseif (substr($a, 0, 1) == 2) {
            $res = $num1[2][0] . ' ' . $num6[2] . ' ' . number6(substr($a, 1));
        } elseif (mb_strpos($num1[substr($a, 0, 1)], 'ь') == false) {
            $res = number1(substr($a, 0,1)) . ' ' . $num6[2] . ' ' . number6(substr($a, 1));
        } else {
            $res = number1(substr($a, 0,1)) . ' ' . $num6[1] . ' ' . number6(substr($a, 1));
        }
    } elseif ($lenght == 8) {
        if (substr($a, 1, 1) == 1) {
            $res = $num2[substr($a, 0, 1)] . ' ' . $num1[1][0] . ' ' . $num6[0] . ' ' . number6(substr($a, 2));
        } elseif (substr($a, 1, 1) >= 2 and substr($a, 1, 1) <= 4) {
            $res = $num2[substr($a, 0, 1)] . ' ' . $num1[2][1] . ' ' . $num6[2] . ' ' . number6(substr($a, 2));
        } else {
            $res = number2(substr($a,0,2)) . ' ' . $num6[1] . ' ' . number6(substr($a, 2));
        }
    } elseif ($lenght == 9) {
        if (substr($a, 2, 1) == 1) {
            $res = number3(substr($a, 0,1)) . ' ' . $num2[substr($a, 1, 1)] . ' ' . $num1[1][0] . ' ' . $num6[0] . ' ' . number6(substr($a, 3));
        } elseif (substr($a, 2, 1) >= 2 and substr($a, 2, 1) <= 4) {
            $res = number3(substr($a, 0,1)) . ' ' . $num2[substr($a, 1, 1)] . ' ' . $num1[2][1] . ' ' . $num6[2] . ' ' . number6(substr($a, 3));
        } else {
            $res = number3(substr($a, 0,1)) . ' ' . number2(substr($a,1,2)) . ' ' . $num6[1] . ' ' . number6(substr($a, 3));
        }
    }
    echo rtrim(str_replace('  ', ' ', $res));
}
