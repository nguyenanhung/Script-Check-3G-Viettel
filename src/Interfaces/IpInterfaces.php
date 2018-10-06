<?php
/**
 * Project Script-Check-3G-Viettel.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/6/18
 * Time: 15:13
 */

namespace nguyenanhung\VnTelcoViettel\Interfaces;


interface IpInterfaces
{
    public function getIpAddress($convertToInteger = FALSE);

    public function ipInRange($ip_address = '', $network_range = '');

    public function ipValidate($ip);
}
