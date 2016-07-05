<?php
/**
 * ----------------------------------------------
 * getIpAddress
 * 
 * Lấy địa chỉ IP kết nối của người dùng
 * 
 * @version     1.0.1
 * @since       01/06/2016
 * 
 * ----------------------------------------------
 */
if (!function_exists('getIpAddress')) {
    function getIpAddress($convertToInteger = false)
    {
        $ip = '';
        if ($_SERVER) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } else {
                $ip = getenv('remote_addr');
            }
        }
        // Convert IP string to Integer
        // Example, IP: 127.0.0.1 --> 2130706433
        if ($convertToInteger) {
            $ip = ip2long($ip);
        }
        return $ip;
    }
}
