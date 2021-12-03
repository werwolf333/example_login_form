<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="ajax.js"></script>
</head>

<body>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="Result" id="result_form"></div>
		</div>
	</div>

	<form method="post" id="ajax_form" action="">
		<div class="panel panel-default FormList">
			<div class="panel-heading">Форма регистрации</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="name">Имя:</label>
					<input type="text" id="name" name="user_name" class="form-control">
				</div>

				<div class="form-group">
					<label for="surname">Фамилия:</label>
					<input type="text" id="surname" name="user_surname" class="form-control">
				</div>

				<div class="form-group">
					<label for="tel">Телефон в формате +(375) (99) 999-99-99:</label>
					<input type="text" id="tel" name="user_tel" class="form-control">
				</div>

				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" id="email" name="user_email" class="form-control">
				</div>

				<div class="form-group">
					<label for="password">Пароль:</label>
					<input type="text" id="password" name="user_password" class="form-control">
				</div>

				<div class="form-group">
					<label for="password_repeat">Повтор пароля:</label>
					<input type="text" id="password_repeat" name="user_password_repeat" class="form-control">
				</div>

				<button type="submit" class="btn btn-default" id="btn" value="Отправить">Submit</button>
				
			</div>
		</div>
	</form>
</body>

</html>