<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar Contato</title>
</head>
<body>
	<form method="post">
		@csrf

		@if(isset($data))
			<label for="nome">Nome</label>
			<input type="text" name="nome" value="{{ $data->nome }}">
			<br>
			<label for="email">Email</label>
			<input type="text" name="email" value={{ $data->email }}>
		@else
			<label for="nome">Nome</label>
			<input type="text" name="nome">
			<br>
			<label for="email">Email</label>
			<input type="text" name="email">
		@endif
		<br>
		<input type="submit" value="Salvar">
	</form>
</body>
</html>