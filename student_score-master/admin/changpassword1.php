<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>修改密码</title>
<link href="Style/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
	include("header.php");
	?>
<div class="main-content">
  <form action="changpassword.php" method="post">
    <div class="content">
      <div class="content-name">
        <h2>修改密码</h2>
      </div>
      <table width="431" height="254" border="0" align="center">
        <tr>
          <td width="106">原密码：</td>
          <td width="315"><input type="password" name="password" /></td>
        </tr>
        <tr>
          <td>新密码：</td>
          <td><input name="txt_regpwd" type="password" id="txt_regpwd" size="20" maxlength="75" /></td>
        </tr>
        <tr>
          <td>再次输入新密码：</td>
          <td><input name="txt_regpwd2" type="password" id="txt_regpwd2" size="20" maxlength="75" onblur="if(this.value!=this.form.txt_regpwd.value) {alert('您两次输入的密码不一致！');myform.txt_regpwd.focus();}" /></td>
        </tr>
        <tr>
          <td><input name="submit2" type="submit" value="提 交" onclick="tosubmit" /></td>
          <td><input name="Submit2" type="reset" class="btn_grey" value="重 置" /></td>
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