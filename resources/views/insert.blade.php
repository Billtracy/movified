<!DOCTYPE html>
<html>
<head>
<title>temp movie Add</title>
</head>
<body>
<form action = "/create" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>title</td>
<td><input type='text' name='title' /></td>
<tr>
<td>short_description</td>
<td><input type="text" name='short_description'/></td>
</tr>
<tr>
<td>image</td>
<td><input type="file" name='image'/></td>
</tr>
<tr>
<td>trailer_url</td>
<td><input type="text" name='trailer_url'/></td>
</tr>
<tr>
<td>showing_date</td>
<td><input type="text" name='showing_date'/></td>
</tr>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Add movie"/>
</td>
</tr>
</table>
</form>
</body>
</html>