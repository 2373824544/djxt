<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>录入新的学生</title>
    <link rel="stylesheet" href="Style/style.css">
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="main-content">
        <form action="insert_sinfo.php" method="post">
            <div class="content">
                <div class="content-name">
                    <h2>录入新的学生</h2>
                </div>
                <table width="431" height="280" border="0" align="center">
                    <tr>
                        <td width="95">身份证号：</td>
                        <td width="320"><input type="text" name="sid"/></td>
                    </tr>
                    <tr>
                        <td>姓名：</td>
                        <td><input type="text" name="sname"/></td>
                    </tr>
                    <tr>
                        <td>年龄：</td>
                        <td><input type="text" name="sage"/></td>
                    </tr>
                    <tr>
                        <td>性别：</td>
                        <td>
                            <select name="ssex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>所在学院：</td>
                        <td>
                            <select name="school">
                                <?php
                                $conn = mysqli_connect("localhost:3306", "root", "lqt", "studentscore") or die('连接数据库失败');
                                $result = mysqli_query($conn, "SELECT * FROM school") or die('查询学院失败');
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['sschool'] . "'>" . $row['sschool'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>所在的专业：</td>
                        <td>
                            <select name="sdept">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM sdept") or die('查询专业失败');
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['sdept'] . "'>" . $row['sdept'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>班级：</td>
                        <td>
                            <select name="sclass">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM class") or die('查询班级失败');
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['sclass'] . "'>" . $row['sclass'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="提交"/></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
