//<?php
 //$conn = mysqli_connect("localhost", "root", "lqt", "studentscore") or die('�������ݿ�ʧ��');
	//mysql_query("set names utf8");

$conn = mysqli_connect("localhost", "root", "lqt", "studentscore");
if (!$conn) {
    die("�������ݿ�ʧ��: " . mysqli_connect_error());
}

// �����ַ���Ϊ UTF-8
mysqli_set_charset($conn, "utf8");
?>