<?php
/**
 * Project Script-Check-3G-Viettel.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/6/18
 * Time: 15:03
 */

namespace nguyenanhung\VnTelcoViettel\Repository;

use nguyenanhung\VnTelcoViettel\Interfaces\ProjectInterfaces;

class DataRepository implements ProjectInterfaces
{
    const CONFIG_PATH = 'config';
    const CONFIG_EXT  = '.php';

    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/21/18 00:20
     *
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Function getData
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/19/18 13:51
     *
     * @param $configName
     *
     * @return array|mixed
     */
    public static function getData($configName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . self::CONFIG_PATH . DIRECTORY_SEPARATOR . $configName . self::CONFIG_EXT;
        if (is_file($path) && file_exists($path)) {
            return require($path);
        }

        return [];
    }
}
