<?php
/**
 * Created by Overlord.
 * Date: 08.02.2019
 * Time: 17:08
 */

$version = '1';


/*==================FIND FUNCTIONS==================*/
function strrposArray($haystack, $needle)
{
    for ($i = 0; $i < count($haystack); $i++) {
        $position = strrpos($haystack[$i], $needle);
        $return = array($position, $i);
        return $return;
    }
}

function strriposArray($haystack, $needle)
{
    for ($i = 0; $i < count($haystack); $i++) {
        $position = strripos($haystack[$i], $needle);
        $return = array($position, $i);
        return $return;
    }
}

function strposArray($haystack, $needle)
{
    for ($i = 0; $i < count($haystack); $i++) {
        $position = strpos($haystack[$i], $needle);
        $return = array($position, $i);
        return $return;
    }
}

function striposArray($haystack, $needle)
{
    for ($i = 0; $i < count($haystack); $i++) {
        $position = stripos($haystack[$i], $needle);
        $return = array($position, $i);
        return $return;
    }
}

/*==================FIND FUNCTIONS==================*/

/*==================OTHER==================*/
function arrGen($int)
{
    for ($i = 0; $i < $int; $i++) $int[$i] = $i;
    return $int;
}

function crypt($type, $text, $key = null)
{
    if (!is_integer($key)) return 0;
    $type = strtolower($type);
    switch ($type) {
        case 'caesar':
            $result = null;
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $ansiCode = ord($text[$i]) + $key;
                while(true){
                    if ($ansiCode > 255) $ansiCode -= 255; else break;
                    continue;
                }
                $result .= chr($ansiCode);
            }
            return $result;
        default:
            echo 'Unknown type crypt(' . $type . ', "' . $text . '", ' . $key . ')';
            return 0;
    }
}

function probability($percent)
{
    $percent = str_replace('%', '', $percent);
    if ($percent >= mt_rand(1, 100)) return 1;
}

function randWord($int = 8)
{
    $result = null;
    for ($i = 0; $i < $int; $i++) {
        $word = chr(mt_rand(33, 126));
        if (probability('30')) $result .= strtoupper($word); else $result .= $word;
    }
    return $result;
}

function alphabet_randWord($alphabet, $int = 8)
{
    $result = null;
    for ($i = 0; $i < $int; $i++) {
        $word = mt_rand(0, mb_strlen($alphabet) - 1);
        if (probability('30')) $result .= strtoupper($alphabet[$word]); else $result .= $alphabet[$word];
    }
    return $result;
}


function minIndex($arr)
{
    return array_search(min($arr), $arr);
}

function maxIndex($arr)
{
    return array_search(max($arr), $arr);
}

function sendPost($url, $data = null, $cookie = null, $useragent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36')
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_USERAGENT, $useragent);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'] . '/' . $cookie);
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}

function getPost($url, $data = null, $cookie = null, $useragent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36')
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_USERAGENT, $useragent);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    if (isset($cookie)) curl_setopt($curl, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'] . '/' . $cookie);
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}

/*==================OTHER==================*/

/*==================FILE CRYPT/DECRYPT==================*/
function cryptFile($filename, $key = 0)
{
    $text = file_get_contents($filename);
    $text = strrev(base64_encode(strrev($text)));
    $crypted = null;
    $int = mb_strlen($text) * 10 / 100;
    $resultr = mb_substr($text, $int + 1);
    for ($i = 0; $i < $int; $i++) {
        $ansi = ord($text[$i]) + $key;
        $crypted .= chr($ansi);
    }
    file_put_contents($filename . '.crypted', $crypted . $resultr);
    return $filename . '.crypted';
}

function decryptFile($filename, $key = 0)
{
    $text = file_get_contents($filename);
    $crypted = null;
    $int = mb_strlen($text) * 10 / 100;
    $resultr = mb_substr($text, $int + 1);
    for ($i = 0; $i < $int; $i++) {
        $ansi = ord($text[$i]) - $key;
        $crypted .= chr($ansi);
    }
    $decrypt = strrev(base64_decode(strrev($crypted . $resultr)));
    file_put_contents($filename . '.decrypted', $decrypt);
    return $filename . '.decrypted';
}