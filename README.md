# Script-Check-3G-Viettel
Check 3G with IP

## Example code
	
	<?php
	include 'getIpAddress.php';
	include 'checkIpV4.php';
	include 'list_ip_range.php'; // Array Name: list_ip_range_viettel
	// Lấy địa chỉ IP kết nối hiện tại
	$connect_ip  = getIpAddress();
	// Check IP v4
	$check_ip_v4 = checkIpV4($connect_ip);
	// Kiểm tra tính hợp lệ của IP
	if ($check_ip_v4 === TRUE) {
	    // Tách mảng IP
	    $ex_ip      = explode('.', $connect_ip);
	    // List IP 2 index
	    $ip_2_index = $ex_ip[0] . '.' . $ex_ip[1];
	    // List IP 3 index
	    $ip_3_index = $ex_ip[0] . '.' . $ex_ip[1] . '.' . $ex_ip[2];
	    // Array IP, Convert with MySQL Tools
	    // 
	    // Kiểm tra IP trong list
	    if (in_array($ip_3_index, $list_ip_range_viettel)) {
	        // Có tồn tại IP 3 index
	        // Chuyển hướng đến link thích hợp
	        $is_3g_viettel = TRUE;
	    } else {
	        if (in_array($ip_2_index, $list_ip_range_viettel)) {
	            // Có tồn tại IP 2 index
	            // Chuyển hướng đến link thích hợp
	            $is_3g_viettel = TRUE;
	        } else {
	            // Ko thỏa mãn cả 2 điều kiện, Return False
	            $is_3g_viettel = FALSE;
	        }
	    }
	} else {
	    // Return FALSE
	    $is_3g_viettel = FALSE;
	}
	// Test
	echo "<pre>";
	print_r($is_3g_viettel);
	echo "</pre>";
