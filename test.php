<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'classmap.php';
include_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

use nguyenanhung\VnTelcoViettel\Viettel;
use nguyenanhung\VnTelcoViettel\Ip;

$ip      = new Ip();
$viettel = new Viettel();

$getCurrentIp = $ip->getIpAddress(); // Show Your IP

$getVersion   = $viettel->getVersion(); // Print 2.0
$checkViettel = $viettel->isViettel(); // True if Viettel, False if not
