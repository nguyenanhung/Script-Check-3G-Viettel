<?php
/**
 * Project Script-Check-3G-Viettel.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/6/18
 * Time: 15:03
 */

namespace nguyenanhung\VnTelcoViettel\Interfaces;


interface ProjectInterfaces
{
    const VERSION      = '2.0';
    const AUTHOR_NAME  = 'Hung Nguyen';
    const AUTHOR_EMAIL = 'dev@nguyenanhung.com';
    const PROJECT_NAME = 'Script check 3G Viettel';
    const VIETTEL      = 'Viettel Mobile';

    /**
     * Function getVersion
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/6/18 15:04
     *
     * @return mixed
     */
    public function getVersion();
}
