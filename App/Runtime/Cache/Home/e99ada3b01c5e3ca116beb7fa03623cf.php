<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div style="width:300px;height:300px;margin: 100px auto">
		<form action="/deletefiles" method="post">
			<table>
				<tr>
					<td>路径：</td>
					<td><input type="text" name="path" value=""></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit">确认提交</button></td>
				</tr>
			</table>
		</form>	
	</div>
	
</body>
</html>