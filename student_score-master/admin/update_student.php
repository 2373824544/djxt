<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单提交的学生信息
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $sage = $_POST['sage'];
    $ssex = $_POST['ssex'];
    $sdept = $_POST['sdept'];
    $sclass = $_POST['sclass'];
    
    // 包含连接数据库的代码
    include("connect.php");

    // 更新数据库中的学生信息
    $update_sql = "UPDATE student SET sname='$sname', sage='$sage', ssex='$ssex', sdept='$sdept', sclass='$sclass' WHERE sid='$sid'";
    $update_result = mysqli_query($conn, $update_sql);

    // 检查更新结果并显示相应信息
    if ($update_result) {
        echo "<script>alert('更新成功！');</script>";
        echo "<script>window.location='change_sinfo.php?sid=$sid';</script>";
    } else {
        echo "<script>alert('更新失败，请重试！');</script>";
        echo "<script>window.history.back();</script>";
    }
} else {
    // 如果不是通过POST方法提交的数据，则返回上一页
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
