<?php
session_start();

// 初始化查询条件
$where_clause = '';

// 获取其他查询条件并构建 WHERE 子句
if (isset($_POST['sname']) && !empty($_POST['sname'])) {
    $sname = $_POST['sname'];
    $sname = htmlspecialchars($sname); // 防止 XSS 攻击
    $where_clause .= " AND sname = '$sname'";
}
if (isset($_POST['school']) && !empty($_POST['school'])) {
    $school = $_POST['school'];
    $school = htmlspecialchars($school); // 防止 XSS 攻击
    $where_clause .= " AND school = '$school'";
}
if (isset($_POST['sdept']) && !empty($_POST['sdept'])) {
    $sdept = $_POST['sdept'];
    $sdept = htmlspecialchars($sdept); // 防止 XSS 攻击
    $where_clause .= " AND sdept = '$sdept'";
}
if (isset($_POST['sclass']) && !empty($_POST['sclass'])) {
    $sclass = $_POST['sclass'];
    $sclass = htmlspecialchars($sclass); // 防止 XSS 攻击
    $where_clause .= " AND sclass = '$sclass'";
}
if (isset($_POST['cdate']) && !empty($_POST['cdate'])) {
    $cdate = $_POST['cdate'];
    $cdate = htmlspecialchars($cdate); // 防止 XSS 攻击
    $where_clause .= " AND cdate = '$cdate'";
}

// 导入连接数据库的代码或文件
include("connect.php");

// 构建完整的 SQL 查询语句
$sql = "SELECT * FROM student WHERE 1=1 $where_clause";

// 执行 SQL 查询
$result = mysqli_query($conn, $sql);

// 检查查询结果
if (!$result) {
    die("查询失败：" . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查询结果</title>
    <link rel="stylesheet" href="Style/style.css">
</head>
<body>

<?php include("header.php"); ?>

<div class="main-content">
    <div class="content">
        <div class="search_tip">查询结果</div>
        <table class="table" width="1000" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td height="28" align="center">学号</td>
                <td align="center">姓名</td>
                <td align="center">年龄</td>
                <td align="center">性别</td>
                <td align="center">所在系</td>
                <td align="center">班级</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td align="center"><?php echo stripslashes($row['sid']); ?></td>
                    <td align="center"><?php echo stripslashes($row['sname']); ?></td>
                    <td align="center"><?php echo stripslashes($row['sage']); ?></td>
                    <td align="center"><?php echo stripslashes($row['ssex']); ?></td>
                    <td align="center"><?php echo stripslashes($row['sdept']); ?></td>
                    <td align="center"><?php echo stripslashes($row['sclass']); ?></td>
                    <td align="center"><a href="delete_sinfo.php?sid=<?php echo $row['sid']; ?>">删除</a></td>
                    <td align="center"><a href="change_sinfo.php?sid=<?php echo $row['sid']; ?>">修改</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>
