Script check 3G Viettel

Library detect carrier Vietnam telco: Viettel

### Installation

**Manual install**

Step 1: Save library to your project

```shell
cd /your/to/path
wget https://github.com/nguyenanhung/Script-Check-3G-Viettel/archive/master.zip
unzip master.zip
```

Step 2: Init to Project

```php
<?php 
require '/your/to/path/Viettel.php';
use \nguyenanhung\VnTelcoViettel\Viettel;
use \nguyenanhung\VnTelcoViettel\Ip;

$ip = new Ip();
$viettel = new Viettel();

```

**Install with composer**

Step 1: Install package

```shell
composer require nguyenanhung/script-check-3g-viettel
```

Step 2: Init to Project

```php
<?php 
require '/your/to/path/vendor/autoload.php';
use \nguyenanhung\VnTelcoViettel\Viettel;
use \nguyenanhung\VnTelcoViettel\Ip;

$ip = new Ip();
$viettel = new Viettel();


```

### **How to Use**

Example use

```php
<?php
require '/your/to/path/vendor/autoload.php';
use \nguyenanhung\VnTelcoViettel\Viettel;
use \nguyenanhung\VnTelcoViettel\Ip;

$ip = new Ip();
$viettel = new Viettel();

$getVersion = $viettel->getVersion(); // Print 2.0

$getCurrentIp = $ip->getIpAddress(); // Show Your IP

$checkViettel = $viettel->isViettel(); // True if Viettel, False if not


```



Very easy and simple

### Contact

If any quetion & request, please contact following infomation

| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3