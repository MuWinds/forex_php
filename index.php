<?php

if (!$_GET['currency']) {
    echo 'no param!';
} else {
    $currency = $_GET['currency'];
    $param = "?base=CNY&symbols=" . $currency . "&rtype=fpy";
    $url = 'https://theforexapi.com/api/latest' . $param;
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //执行并获取内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    $decode_currency = json_decode($output);
    $rates = $decode_currency->rates;
    $result_convert = $rates->$currency;
    echo $result_convert;
}
