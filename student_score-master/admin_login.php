<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
$name = $_POST['name'];
$password = $_POST['password'];

if ((!isset($name)) || (!isset($password))) {
    echo $name;
} else {
    $conn = mysqli_connect("localhost", "root", "lqt", "studentscore") or die('�������ݿ�ʧ��');
    
    $sql = "SELECT * FROM admin WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql) or die('��ѯʧ��');

    $count = mysqli_num_rows($result);
    if ($count != 0) {
        $url = "./admin/admin_result.php";
        $_SESSION['admin_user'] = $name;
        echo "<script type='text/javascript'>location.href='$url';</script>";
    } else {
        echo "<script> alert('������û�������');</script>";
        echo "<script> history.go(-1);</script>";
    }
    mysqli_close($conn);
}
?>

