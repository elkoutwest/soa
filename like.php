<?php

// cite http://www.phpgang.com/how-to-create-like-unlike-system-in-php-mysql-and-jquery_410.html
include('include/db.php');

$strSQL_Result = mysqli_query($connection,"select `like`,`un-like` from `like` where id=1");
$row = mysqli_fetch_array($strSQL_Result);

$like       = $row['like'];
$unlike     = $row['un-like'];
if($_POST)
{
    if(isset($_COOKIE["counter_gang"]))
    {
        echo "-1";
        exit;
    }
    setcookie("counter_gang", "liked", time()+3600*24, "/like-unlike-in-php-mysql/", ".demo.phpgang.com");
    if(mysqli_real_escape_string($connection,$_POST['op']) == 'like')
    {
        $update = "`like`=`like`+1";
    }
    if(mysqli_real_escape_string($connection,$_POST['op']) == 'un-like')
    {
        $update = "`un-like`=`un-like`+1";
    }
    mysqli_query($connection,"update `like` set $update where `id`=1");
    echo 1;
    exit;   
}
?>