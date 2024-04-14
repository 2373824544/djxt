<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>学生信息录入</title>
</head>
<body>
    <center>
        <?php
        include("connect.php");

        $sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
        $sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
        $sage = mysqli_real_escape_string($conn, $_REQUEST['sage']);
        $ssex = mysqli_real_escape_string($conn, $_REQUEST['ssex']);
        $school = mysqli_real_escape_string($conn, $_REQUEST['school']); // 修改这里
        $sdept = mysqli_real_escape_string($conn, $_REQUEST['sdept']);
        $sclass = mysqli_real_escape_string($conn, $_REQUEST['sclass']);

        if (!$sid || !$sname || !$sage || !$ssex || !$school || !$sclass) {
            echo "<script> alert('请输入完整！');</script>";
            echo "<script> window.location='insert_sinfo1.php';</script>";
            exit;
        } else {
            $sql = "SELECT sid FROM student WHERE sid='" . $sid . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>alert('该生已存在数据库，请重新录入！');</script>";
                echo "<script> window.location='insert_sinfo1.php';</script>";
                exit;
            }

            $sql1 = "INSERT INTO student (sid, sname, sage, ssex, sdept, sschool, sclass) VALUES ('$sid', '$sname', '$sage', '$ssex', '$sdept', '$school', '$sclass')"; // 修改这里
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                echo "<script> alert('插入成功！');</script>";
                echo "<script> window.location='insert_sinfo1.php';</script>";
            } else {
               echo "<script> alert('插入失败！');</script>";
               echo "<script> window.location='insert_sinfo1.php';</script>";
            }
        }
        ?>
    </center>
</body>
</html>
