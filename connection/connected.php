<?php 
$host ="localhost";
$username ="hossam";
$password ="Hossam442001";
$dbname ="romofyi";

$connection =mysqli_connect($host,$username,$password,$dbname);

if(isset($connection )){
    // echo('تم الاتصال بقاعده البيانات ');
}else{
    echo('لم يتم الاتصال بقاعده البيانات ');
}
?>
