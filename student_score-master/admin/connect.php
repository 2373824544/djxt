//<?php
 //$conn = mysqli_connect("localhost", "root", "lqt", "studentscore") or die('连接数据库失败');
	//mysql_query("set names utf8");

$conn = mysqli_connect("localhost", "root", "lqt", "studentscore");
if (!$conn) {
    die("连接数据库失败: " . mysqli_connect_error());
}

// 设置字符集为 UTF-8
mysqli_set_charset($conn, "utf8");
?>