<?php
session_start();

// 检查是否收到了有效的身份证号和课程号
if (!isset($_GET['sid']) || empty($_GET['sid']) || !isset($_GET['cid']) || empty($_GET['cid'])) {
    echo "<script> alert('参数错误！');</script>";
    echo "<script> window.location='index.php';</script>";
    exit(); // 停止脚本执行
}

// 获取学生身份证号和课程号并进行安全处理
$sid = htmlspecialchars($_GET['sid']); // 防止 XSS 攻击
$cid = htmlspecialchars($_GET['cid']); // 防止 XSS 攻击

// 导入连接数据库的代码或文件
include("connect.php");

// 执行 SQL 查询
$sql = "SELECT * FROM grade WHERE sid = '$sid' AND cid = '$cid'";
$result = mysqli_query($conn, $sql);

// 检查查询结果
if (!$result || mysqli_num_rows($result) == 0) {
    die("查询失败或无数据：" . mysqli_error($conn));
}

// 显示查询结果
$row = mysqli_fetch_assoc($result);

// 关闭数据库连接
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改学生成绩</title>
    <link rel="stylesheet" href="Style/style.css">
</head>
<body>

<?php include("header.php"); ?>

<div class="main-content">
    <div class="content">
        <div class="content-name">
            <h2>修改学生的成绩</h2>
        </div>
        <form action="insert_grade.php" method="post">
            <table width="431" height="255" border="0" align="center">
                <tr>
                    <td width="95">身份证号：</td>
                    <td width="320"><input type="text" name="sid" value="<?php echo stripslashes($row['sid']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="sname" value="<?php echo stripslashes($row['sname']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>课程号码：</td>
                    <td><input type="text" name="cid" value="<?php echo stripslashes($row['cid']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>科目：</td>
                    <td><input type="text" name="cname" value="<?php echo stripslashes($row['cname']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>等级：</td>
                    <td><input type="text" name="ccredit" value="<?php echo stripslashes($row['ccredit']); ?>"  /></td>
                </tr>
                <tr>
                    <td>分数：</td>
                    <td><input type="text" name="sgrade" value="<?php echo stripslashes($row['sgrade']); ?>"  /></td>
                </tr>
                <tr>
                    <td>考试日期：</td>
                    <td><input type="text" name="cdate" value="<?php echo stripslashes($row['cdate']); ?>"  /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="提交"/></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>
