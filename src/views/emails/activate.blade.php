<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Activation link</h2>
		<div>
			To activate your account, click this <a href="{{ URL::to('account/activate', array($hash)) }}">activate link</a> or copy-paste this in the browser: {{ URL::to('account/activate', array($hash)) }}
		</div>
	</body>
</html>