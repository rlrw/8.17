<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div style="width:400px;height:500px;margin:auto;">
        <form action="<?php echo U('Admin/check_staff');?>" method="post">
            <input type="hidden" value="<?php echo ($_SESSION['token']); ?>" name="token">
        <table width="100%" >
            <tr>
                <td>账号:</td>
                <td><input type="text" name="account"></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>