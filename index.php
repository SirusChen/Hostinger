<?php
/**
 * Created by PhpStorm.
 * User: Sirus
 * Date: 2017/3/9
 * Time: 22:26
 */

// 解析query
parse_str($_SERVER['QUERY_STRING'], $output);
// 是否有index.php，有就转去API，没就直接输出静态资源
$is_api = strpos($_SERVER['REQUEST_URI'], '/index') == 0;

if ($is_api && isset($output['r'])) {
    echo getLocalContent($output['r']);
} else {

}

function getLocalContent ($url) {
    $realUrl = rawurlencode(substr($url, 1));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://yii.base.com/web/index.php?r='.$realUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}