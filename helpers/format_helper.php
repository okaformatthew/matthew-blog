<?php
/*******
 * @param $date
 * Format Date
 * @return false|string
 */
function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
}

/*******
 * Shorten Text
 * @param $text
 * @param int $char
 * @return bool|string
 */
function shortenText($text, $char=450){
    $text = $text.' ';
    $text = substr($text, 0, $char);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text. '>>>>>>>>> ';
    return $text;
}