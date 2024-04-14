<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生成绩管理系统</title>
    <link href="Style/style.css" rel="stylesheet" type="text/css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100vh;
            width: 150px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f4f4f4;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        /* 可选样式，添加一条横向分割线 */
        .sidebar a:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="banner">
            <div id="logo">
                <a href="#">
                    <img src="pic/logo_school.png" alt="" width="210" height="48" />
                </a>
                <div class="title"><h2>计算机等级考试成绩管理系统</h2></div>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="admin_result.php">查询信息</a></li>
                <li><a href="select_all.php?page=1">学生成绩</a></li>
                <li><a href="insert_sinfo1.php">录入学生</a></li>
                <li><a href="insert_grade1.php">录入成绩</a></li>
                <li><a href="insert_course1.php?page=1">科目管理</a></li>
                <li><a href="insert_bitems1.php?page=1">考试管理</a></li>
                <li><a href="insert_certificate1.php?page=1">证书状态</a></li>
                <li><a href="upfile.php">信息导入</a></li>
                <li><a href="changpassword1.php">修改密码</a></li>
                <li><a href="../index.php">退出</a></li>
            </ul>
        </div>
    </div>

<div class="sidebar">
    <a href="data_statistics.php">数据统计</a>
    <a href="generate_admission_ticket.php">生成准考证</a>
    <a href="manage_message_board.php">管理留言板</a>
    <a href="publish_exam_info.php">发布考试信息</a>
</div>


    
</body>

</html>
