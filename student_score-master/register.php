<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册页面</title>
</head>

<body>
    <h2>注册页面</h2>
    <form method="post" action="register.php" enctype="multipart/form-data">
        <label for="name">姓名：</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="id_card">身份证号：</label>
        <input type="text" id="id_card" name="id_card" required><br><br>
        <label for="gender">性别：</label>
        <select id="gender" name="gender">
            <option value="male">男</option>
            <option value="female">女</option>
        </select><br><br>
        <label for="department">院系：</label>
        <input type="text" id="department" name="department" required><br><br>
        <label for="major">专业：</label>
        <input type="text" id="major" name="major" required><br><br>
        <label for="class">班级：</label>
        <input type="text" id="class" name="class" required><br><br>
        <label for="photo">个人照片：</label>
        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>
        <input type="submit" value="注册">
    </form>

    <?php
    // 数据库连接信息
    $servername = "localhost"; // 服务器名称
    $username = "root"; // 数据库用户名
    $password = "lqt"; // 数据库密码
    $dbname = "xj"; // 数据库名称

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 处理注册请求
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $id_card = $_POST["id_card"];
        $gender = $_POST["gender"];
        $department = $_POST["department"];
        $major = $_POST["major"];
        $class = $_POST["class"];

        // 上传照片
        $photo = $_FILES["photo"]["name"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        // 在这里进行数据库操作，将用户信息插入数据库
        $sql = "INSERT INTO users (name, id_card, gender, department, major, class, photo) 
                VALUES ('$name', '$id_card', '$gender', '$department', '$major', '$class', '$photo')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>注册成功！</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'index2.php'; }, 3000);</script>"; // 注册成功后延时3秒跳转到index2.php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>

</html>
