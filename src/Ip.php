<?php
/**
 * Project Script-Check-3G-Viettel.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/6/18
 * Time: 15:07
 */

namespace nguyenanhung\VnTelcoViettel;
if (!interface_exists('nguyenanhung\VnTelcoViettel\Interfaces\ProjectInterfaces')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Interfaces' . DIRECTORY_SEPARATOR . 'ProjectInterfaces.php';
}
if (!interface_exists('nguyenanhung\VnTelcoViettel\Interfaces\IpInterfaces')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Interfaces' . DIRECTORY_SEPARATOR . 'IpInterfaces.php';
}
if (!class_exists('nguyenanhung\VnTelcoViettel\Repository\DataRepository')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'DataRepository.php';
}

use nguyenanhung\VnTelcoViettel\Interfaces\ProjectInterfaces;
use nguyenanhung\VnTelcoViettel\Interfaces\IpInterfaces;
use nguyenanhung\VnTelcoViettel\Repository\DataRepository;

class Ip implements ProjectInterfaces, IpInterfaces
{
    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:09
     *
     * @return mixed|string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Function getIpAddress
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:09
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     */
    public function getIpAddress($convertToInteger = FALSE)
    {
        $ip_keys = DataRepository::getData('ip_address_server');
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === TRUE) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if ($this->ipValidate($ip)) {
                        if ($convertToInteger === TRUE) {
                            $result = ip2long($ip);

                            return $result;
                        }

                        return $ip;
                    }
                }
            }
        }

        return FALSE;
    }

    /**
     * Function ipInRange
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:12
     *
     * @param string $ip_address
     * @param string $network_range
     *
     * @return bool|null
     */
    public function ipInRange($ip_address = '', $network_range = '')
    {
        if (empty($ip_address) || empty($network_range)) {
            return NULL;
        }
        $address = \IPLib\Factory::addressFromString($ip_address);
        $range   = \IPLib\Factory::rangeFromString($network_range);
        $result  = $address->matches($range);

        return $result;
    }

    /**
     * Function ipValidate
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:10
     *
     * @param $ip
     *
     * @return bool
     */
    public function ipValidate($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === FALSE) {
            return FALSE;
        }

        return TRUE;
    }
}
