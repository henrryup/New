<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="send_it.php" method="post">
		标题：<input type="text" name="title" />
		<br />
		内容：<textarea name="content"></textarea>
		<br />
		收件人：<input type="text" name="to" />
		<br />
		<input type="submit" value="发送" />
	</form>
</body>
</html>