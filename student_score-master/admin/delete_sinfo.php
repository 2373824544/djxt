<?php
session_start();

// 检查是否收到了有效的学生ID
if (!isset($_GET['sid']) || empty($_GET['sid'])) {
    echo "<script> alert('缺少学生ID！');</script>";
    echo "<script> window.location='../index.php';</script>";
    exit(); // 停止脚本执行
}

$sid = $_GET['sid'];

include("connect.php");
$sql = "DELETE FROM student WHERE sid = '".$sid."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); // 在这里加上错误处理

if($result) {
    echo "<script language='javascript'> alert('删除成功');</script>";
} else {
    echo "<script language='javascript'> alert('删除不成功');</script>";
}

// 无论删除成功与否都跳转到指定页面（相对路径）
echo "<script> window.location='../index.php';</script>";
?>
