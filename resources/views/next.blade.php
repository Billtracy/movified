<!DOCTYPE html>
<html>
<head>
<title>temp Next Movie Night</title>
</head>
<body>
<form action = "/night" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>next movie night is:</td>
<td><input type='text' name='next_movie_night'/></td>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Add next_movie_night"/>
</td>
</tr>
</table>
</form>
</body>
</html>