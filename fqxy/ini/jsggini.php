<?php

if($zsspd==1&&$zsspd1==1){

 flock($fp1,LOCK_UN);
 flock($fp,LOCK_UN);
} else{	
//调用服务器繁忙页面
//include("fm.php");

echo "服务器开小差了";
}


?>