<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset</title>
</head>
<body>
	<p>Hi {!!$name!!} !</p>
	<p>To reset your password go to the following link!<br/>Please reset your password within 24 hours.</p>
	{!!URL::to("password/reset-password/$encrypted")!!}
</body>
</html>