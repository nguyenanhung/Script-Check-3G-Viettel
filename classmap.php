<?php
/**
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 9/19/18
 * Time: 13:37
 */
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
    //
    if (strpos($fileName, 'nguyenanhung\VnTelcoViettel\Interfaces') !== FALSE) {
        $fileName = str_replace('nguyenanhung\VnTelcoViettel\Interfaces', 'src\Interfaces', $fileName);
    } elseif (strpos($fileName, 'nguyenanhung\VnTelcoViettel\Repository') !== FALSE) {
        $fileName = str_replace('nguyenanhung\VnTelcoViettel\Repository', 'src\Repository', $fileName);
    } else {
        $fileName = str_replace('nguyenanhung\VnTelcoViettel', 'src', $fileName);
    }

    if (file_exists($fileName)) {
        require $fileName;

        return TRUE;
    }

    return FALSE;
});
