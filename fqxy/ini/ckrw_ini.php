<?php

//判断ini文件是否存在如不没有则从数据库提取并且写入ini
$inina="ckrw.ini";
$path='ache/'.$wjid;
$file = $path."/".$inina;	
if(file_exists($file)){

} else{
	

   //连接数据库提取数据写入ini 
   
$inina="ckrw.ini";
$path='ache/'.$wjid;
$file = $path."/".$inina;	
//创建文件
file_put_contents($file,"[玩家背包]");
# 实例化ini文件操作类，并载入 .ini文件
$iniFile = new iniFile($file);
$iniFile->addItem('序列',['初始' => 123]); 
$iniFile->addItem('任务id',['初始' => 1]); 
$iniFile->addItem('任务数量',['初始' => 123]);
$iniFile->addItem('任务名字',['初始' => 123]); 
   
include("./sql/mysql.php");//调用数据库连接 
   
   
   


$q2="ckwp".$wjid;


mysql_query("set names utf8");
$str="select wpid,wpsl,wpfl from $q2";
$result=mysql_query($str) or die('SQL语句有误');
//把有值的数据存入一个数组
$m=0;




 while(!!$row=mysql_fetch_array($result)){

if($row[wpfl]==6){
if($row[wpsl]>0){  
$m=$m+1;
$npcc=$row[wpid];
$iniFile->addCategory('序列', [$row[wpid]=>$m ]);
$iniFile->addCategory('任务id', [$m=> $row[wpid]]);
$iniFile->addCategory('任务数量', [$row[wpid]=> $row[wpsl]]);
//调用物品信息
include("./wp/wpxx.php");
$iniFile->addCategory('任务名字', [$row[wpid]=> $wpmz]);  

   
   }
   
   
   
   
   
}
   







}








}


$iniFile = new iniFile($file);











?>