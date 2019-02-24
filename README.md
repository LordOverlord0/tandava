# tandava
Tandava Lib - this is library for PHP, which adds large number functions.
<h3>Hello World! I born!</h3>

Function list:<br>
<code>probability($percent)</code> - will return 1 with a certain probability<br>
<code>randWord($countWords)</code> - random set of characters ANSI <br>
<code>alphabet_randWord($alphabet, $countWords)</code> - random character set using your alphabet. Example alphabet: <i>abcdef0123456789</i><br>
<code>maxIndex($array)</code> - returns index of the array with the highest number<br>
<code>minIndex($array)</code> - returns index of the array with the smallest number<br>
<code>cryptFile($filename, $key)</code> - Encrypt file using key<br>
<code>decryptFile($filename, $key)</code> - Decrypt file using key<br>
<code>sendPost($url, $postData, $cookie_file, $useragent)</code> - send post query, save cookies in file<br>
<code>getPost($url, $postData, $cookie_file, $useragent)</code> - send post query using cookies from file<br>
<code>arrGen($count)</code> - generates a numbered array of numbers<br>
<code>strrposArray($haystack, $needle)</code> - Find the numeric position of the last occurrence of needle in the haystack array. Return array. 0 index - position, 1 index - where find<br>
<code>strriposArray($haystack, $needle)</code> - Find the numeric position of the last occurrence of needle in the haystack array. Return array. 0 index - position, 1 index - where find<br>
<code>strposArray($haystack, $needle)</code> - Find the numeric position of the first occurrence of needle in the haystack array. Return array. 0 index - position, 1 index - where find<br>
<code>striposArray($haystack, $needle)</code> - Find the numeric position of the first occurrence of needle in the haystack array. Return array. 0 index - position, 1 index - where find<br>
<code>convertMoreInt($int)</code> - convert str format (3.5477930175797E+23) to 354779301757970000000000000000000000 
<code>user_function_exists($func)</code> - return 1, if exists specific user func
<code>isJSON($string)</code> - return 1, if is json


<b>Examples:</b><br><hr>
<code>echo randWord(25)</code> <br>Out: 1+VqKb[M2&4M.u9#/{fNi{ICh<br><hr>
<code>echo alphabet_randWord('abcdefghj123456789_!*',10)</code><br>Out: j31D87ha64<hr><br>
<code>print_r(arrGen(10))</code><br>Out: <br>Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 [7] => 7 [8] => 8 [9] => 9 )<hr>
