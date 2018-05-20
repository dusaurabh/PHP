<?php  
date_default_timezone_set('Asia/Kolkata');
$currenttime = time();
$DateTime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
echo $DateTime;



?>