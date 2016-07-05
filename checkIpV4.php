<?php
/**
 * ----------------------------------------------
 * checkIpV4
 * 
 * Kiểm tra địa chỉ IP
 * 
 * @version     1.0.1
 * @since       01/06/2016
 * 
 * ----------------------------------------------
 */
if (!function_exists('checkIpV4')) {
    function checkIpV4($IpAddress)
    {
        if (!filter_var($IpAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === FALSE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
