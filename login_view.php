<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Realtie</title>
<link href="<?=base_url()?>css/style.css" rel="stylesheet" />
<script src="<?=base_url()?>js/jquery-1.2.6.min.js" type="text/javascript"></script>
</head>

<body>

<div id="container">
        <div id="header">
                <h1>Realtie</h2>
        </div>
        
        <div id="content">
<form method="POST" action="login/verify" name="form1">
<table>
<tr>
<td>Username: </td><td><input type="text" name="username"/></td>
</tr>
<tr>
<td>Password: </td><td><input type="password" name="password"/></td>
</tr>
<tr>
<td><input type="submit" value="Login"></td><td></td>
</tr>
</table>
</form>
        </div>
        
</div>

</body>
</html>
