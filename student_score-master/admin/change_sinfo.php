<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="Style/style.css">
</head>
<body>
<?php
$sid = $_GET['sid'];
include("connect.php");
$sql = "select * from student where sid = '".$sid."'";
$result = mysqli_query($conn, $sql) or die('查不到');
?>
<?php
	include("header.php");
	?>
	<div class="main-content">
		<form action="update_student.php" method="post" onsubmit="showSuccessMessage();">
			<div class="content">
			
				<div class="content-name">
					<h2>修改学生信息</h2>
				</div>
				<table width="431" height="255" border="0" align="center">
					<?php 
	    while($row = mysqli_fetch_array($result)){
	?>
					<tr>
						<td width="95">学号：</td>
						<td width="320"><input type="text" name="sid" value="<?php echo stripslashes($row[0]);?>"/>
						</td>
					</tr>
					<tr>
						<td>姓名：</td>
						<td><input type="text" name="sname" value="<?php echo stripslashes($row[1]);?>" />
						</td>
					</tr>
					<tr>
						<td>年龄：</td>
						<td><input type="text" name="sage" value="<?php echo stripslashes($row[2]);?>"/>
						</td>
					</tr>
					<tr>
						<td>性别：</td>
						<td>
                            <select name="ssex">
                                <option value="男" <?php if($row[3]=="男") echo 'selected="selected"'; ?>>男</option>
                                <option value="女" <?php if($row[3]=="女") echo 'selected="selected"'; ?>>女</option>
                            </select>
                        </td>
					</tr>
					<tr>
						<td>所在系：</td>
						<td><input type="text" name="sdept" value="<?php echo stripslashes($row[4]);?>"  />
						</td>
					</tr>
					<tr>
						<td>班级：</td>
						<td><input type="text" name="sclass" value="<?php echo stripslashes($row[5]);?>"  />
						</td>
					</tr>
					
					<tr>
						<td><input type="submit" value="修改"/>
						</td>
						<td>&nbsp;</td>
					</tr>
					<?php
			}
			$_SESSION['deletesid'] = $sid;
			?>
				</table>
			</div>
		</form>
	</div>
	<?php
	include("footer.php");
	?>
</body>
</html>
