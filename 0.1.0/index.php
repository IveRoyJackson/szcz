<?php
header("Content-Type: text/html;charset=utf-8"); 
$text1 = "抱歉。因为目前在小规模测试阶段，你的IP地址尚未记录在库，所以你无法访问“数字岔中”";
$text2 = "Error code:IP IS NOT TRUE(10328)（可能在提供反馈时需要）";
$version = "Beta 0.1.0";
echo $text1;
echo "<br>";
echo $text2;
echo "<br>";
echo $version;
function get_real_ip(){ 
	$ip=false; 
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
		$ip=$_SERVER['HTTP_CLIENT_IP']; 
	}
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
		$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']); 
		if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
		for ($i=0; $i < count($ips); $i++){
			if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
				$ip=$ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']); 
}
?>