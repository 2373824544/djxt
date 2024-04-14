<?php
session_start();
include("pagelist2.php");

// 连接数据库
include("connect.php");

// 设置字符集为 UTF-8
mysqli_set_charset($conn, "utf8");

// 接收来自 admin_result.php 的参数
$sid = isset($_GET['sid']) ? $_GET['sid'] : "";
$sname = isset($_GET['sname']) ? $_GET['sname'] : "";
$sschool = isset($_GET['school']) ? $_GET['school'] : "";
$sdept = isset($_GET['sdept']) ? $_GET['sdept'] : "";
$sclass = isset($_GET['sclass']) ? $_GET['sclass'] : "";
$cdate = isset($_GET['cdate']) ? $_GET['cdate'] : "";

// 构建查询语句
$sql = "SELECT * FROM grade WHERE 1=1"; // WHERE 1=1 是为了方便动态添加条件

// 根据不同条件动态添加查询条件
if (!empty($sid)) {
    $sql .= " AND sid = '$sid'";
}
if (!empty($sname)) {
    $sql .= " AND sname = '$sname'";
}
if (!empty($sschool)) {
    $sql .= " AND sid IN (SELECT sid FROM student WHERE sschool = '$sschool')";
}
if (!empty($sdept)) {
    $sql .= " AND sid IN (SELECT sid FROM student WHERE sdept = '$sdept')";
}
if (!empty($sclass)) {
    $sql .= " AND sid IN (SELECT sid FROM student WHERE sclass = '$sclass')";
}
if (!empty($cdate)) {
    $sql .= " AND cdate = '$cdate'";
}

// 执行查询
$result = mysqli_query($conn, $sql) or die('查询失败');

// 获取查询结果行数并分页显示
$grow = mysqli_num_rows($result);
Page($grow, 10);

// 根据分页参数构建查询语句
$gsql = "$sql LIMIT $select_from, $select_limit";

// 执行分页查询
$rst = mysqli_query($conn, $gsql);

// 如果查询结果为空，则跳转回 admin_result.php
if (!$grow) {
    echo "<script>alert('数据库不存在信息！');</script>";
    echo "<script>window.location='admin_result.php';</script>";
    exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>学生成绩管理系统</title>
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
<?php include("header.php"); ?>
<div class="main-content">
    <form name="form1" method="get">
        <div class="content">
            <div class="content-name">
                <h2>查询学生成绩</h2>
            </div>
            <table width="1000" border="0" align="center">
                <tr>
                    <td>身份证号：</td>
                    <td>姓名：</td>
                    <td>学院：</td>
                    <td>专业：</td>
                    <td>班级：</td>
                    <td>考试批次：</td>
                </tr>
                <tr>
                    <td><input type="text" name="sid" value="<?php echo $sid; ?>"/></td>
                    <td><input type="text" name="sname" value="<?php echo $sname; ?>"/></td>
                    <td>
                        <select name="school" id="typeId">
                            <option value=""> </option>
                            <?php
                            $sql_school = mysqli_query($conn, "SELECT * FROM school");
                            while ($row_school = mysqli_fetch_assoc($sql_school)) {
                                $selected = ($sschool == $row_school['sschool']) ? "selected" : "";
                                echo "<option value='{$row_school['sschool']}' $selected>{$row_school['sschool']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="sdept">
                            <option value=""> </option>
                            <?php
                            $sql_dept = mysqli_query($conn, "SELECT * FROM sdept");
                            while ($row_dept = mysqli_fetch_assoc($sql_dept)) {
                                $selected = ($sdept == $row_dept['sdept']) ? "selected" : "";
                                echo "<option value='{$row_dept['sdept']}' $selected>{$row_dept['sdept']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="sclass">
                            <option value=""> </option>
                            <?php
                            $sql_class = mysqli_query($conn, "SELECT * FROM class");
                            while ($row_class = mysqli_fetch_assoc($sql_class)) {
                                $selected = ($sclass == $row_class['sclass']) ? "selected" : "";
                                echo "<option value='{$row_class['sclass']}' $selected>{$row_class['sclass']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="cdate">
                            <option value=""> </option>
                            <option value="201603" <?php if ($cdate == "201603") echo "selected"; ?>>201603</option>
                            <option value="201609" <?php if ($cdate == "201609") echo "selected"; ?>>201609</option>
                            <option value="201612" <?php if ($cdate == "201612") echo "selected"; ?>>201612</option>
                            <option value="201703" <?php if ($cdate == "201703") echo "selected"; ?>>201703</option>
                            <option value="201709" <?php if ($cdate == "201709") echo "selected"; ?>>201709</option>
                            <option value="201712" <?php if ($cdate == "201712") echo "selected"; ?>>201712</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><h2>查询内容：</h2></td>
                    <td>
                        <input name="submit1" type="submit" value="成绩" onclick="tosubmit1()"/>
                        <input name="submit2" type="submit" value="学生信息" onclick="tosubmit2()"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div class="search_tip">查询结果</div>
    <table class="table" width="1000" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td width="110" height="28">身份证号</td>
            <td width="60">姓名</td>
            <td width="80">课程编号</td>
            <td width="180">科目</td>
            <td width="60">等级</td>
            <td width="60">分数</td>
            <td width="80">考试日期</td>
            <td width="67">&nbsp;</td>
            <td width="66">&nbsp;</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($rst)) {
            ?>
            <tr>
                <td><?php echo stripslashes($row['sid']); ?></td>
                <td><?php echo stripslashes($row['sname']); ?></td>
                <td><?php echo stripslashes($row['cid']); ?></td>
                <?php
                $_SESSION['changcid'] = $row['cid'];
                ?>
                <td><?php echo stripslashes($row['cname']); ?></td>
                <td><?php echo stripslashes($row['ccredit']); ?></td>
                <td><?php echo stripslashes($row['sgrade']); ?></td>
                <td><?php echo stripslashes($row['cdate']); ?></td>
                <td><a href="delete_grade.php">删除</a></td>
                <td><a href="change_grade.php">修改</a></td>
            </tr>
            <?php
        }
        $_SESSION['deletesid'] = $sid;
        ?>
    </table>
    <div class="nav"><?php echo $pagenav; ?></div>
</div>
<?php include("footer.php"); ?>
</body>

</html>
