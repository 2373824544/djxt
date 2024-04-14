<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="Style/style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>学生成绩管理系统</title>
    <style>
        /* 设置全屏背景图 */
        body {
            margin: 0;
            padding: 0;
            background-image: url('background_image.jpg'); /* 设置背景图片的路径 */
            background-size: cover; /* 背景图片大小设置为 cover，即铺满整个屏幕 */
            background-position: center; /* 背景图片位置居中 */
            font-family: Arial, sans-serif; /* 设置字体 */
        }

        select {
            width: 208px;
            font-size: 14px;
        }

        /* 设置表格的布局 */
        table {
            margin: 0 auto; /* 居中对齐 */
        }
    </style>
</head>

<body>
    <div>
        <form name="form1" method="post" onchange="tosubmit()">
            <table width="1003" height="600" border="0" align="center">
                <tr>
                    <td style="text-align: center"><img src="pic/logo.png" alt="" style="margin: 20px auto;width: 260px;height: 220px"></td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <h2 style="font-size: 18px">西南科技大学计算机等级考试成绩查询系统</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="298" height="120" border="0" align="center">
                            <tr>
                                <td width="90"><strong>用户名</strong>：</td>
                                <td colspan="2"><label>
                                        <input type="text" name="name" />
                                    </label>

                                </td>
                            </tr>
                            <tr>
                                <td><strong>密码</strong>：</td>
                                <td colspan="2"><label>
                                        <input type=password name="password" />
                                    </label>
                                </td>
                            </tr>
                            <!-- 跨列放置选择框 -->
                            <tr>
                                <td colspan="2" style="text-align: right;"><select name="userType">
                                        <option value="student">学生</option>
                                        <option value="admin">管理员</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <table width="298" height="120" border="0" align="center">
                            <tr>
                                <td class="submit"><input type="submit" value="登录" />
                                </td>
                                <td width="114" class="submit"><input name="Submit3" type="reset" class="btn_grey" value="重置" />
                                </td>
                                <td width="114" class="submit"><input type="button" value="注册" onclick="location.href='register.php';" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer" style="text-align: center">
        <p>Copyright &copy; 王鹏钢 版权所有</p>
    </div>

    <script>
        function tosubmit() {
            var userType = document.querySelector('select[name="userType"]').value;
            if (userType === "student") {
                document.form1.action = "student_login.php";
            } else if (userType === "admin") {
                document.form1.action = "admin_login.php";
            }
        }
    </script>
</body>

</html>
