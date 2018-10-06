<?php
/**
 * Project Script-Check-3G-Viettel.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/6/18
 * Time: 15:15
 */

namespace nguyenanhung\VnTelcoViettel;
if (!interface_exists('nguyenanhung\VnTelcoViettel\Interfaces\ProjectInterfaces')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Interfaces' . DIRECTORY_SEPARATOR . 'ProjectInterfaces.php';
}
if (!interface_exists('nguyenanhung\VnTelcoViettel\Interfaces\ViettelInterfaces')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Interfaces' . DIRECTORY_SEPARATOR . 'ViettelInterfaces.php';
}
if (!class_exists('nguyenanhung\VnTelcoViettel\Repository\DataRepository')) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'DataRepository.php';
}

use nguyenanhung\VnTelcoViettel\Interfaces\ProjectInterfaces;
use nguyenanhung\VnTelcoViettel\Interfaces\ViettelInterfaces;
use nguyenanhung\VnTelcoViettel\Repository\DataRepository;

class Viettel implements ProjectInterfaces, ViettelInterfaces
{
    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:17
     *
     * @return mixed|string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Function isViettel
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:17
     *
     * @return bool TRUE if Viettel, FALSE if not
     */
    public function isViettel()
    {
        $network   = DataRepository::getData('viettel_ip_gateway');
        $ipObject  = new Ip();
        $currentIp = $ipObject->getIpAddress();
        if ($currentIp === FALSE || $currentIp === NULL) {
            return FALSE;
        }
        $listConnectIp  = explode(',', $currentIp);
        $networkV4Range = $network['network_range'];
        $networkV6Range = $network['network_v6_range'];
        foreach ($listConnectIp as $IP) {
            if ($networkV4Range !== NULL && count($networkV4Range) > 0) {
                foreach ($networkV4Range as $rangeV4) {
                    $checkIpInRange = $ipObject->ipInRange($IP, $rangeV4);
                    if ($checkIpInRange === TRUE) {
                        return TRUE;
                    }
                }
            }
            if ($networkV6Range !== NULL && count($networkV6Range) > 0) {
                foreach ($networkV6Range as $rangeV6) {
                    $checkIpInRange = $ipObject->ipInRange($IP, $rangeV6);
                    if ($checkIpInRange === TRUE) {
                        return TRUE;
                    }
                }
            }
        }

        return FALSE;
    }
}
