<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar Cliente</title>
</head>
<body>
	<form method="POST">
		@csrf

		@if(isset($data)) 
			<label for="razao_social">Razao Social</label>
			<input type="text" name="razao_social" value="{{ $data->razao_social }}">
			<br>
			<label for="ativo">Ativo</label>
			<input type="number" name="ativo" value="{{ $data->ativo }}">
		@else
			<label for="razao_social">Razao Social</label>
			<input type="text" name="razao_social">
			<br>
			<label for="ativo">Ativo</label>
			<input type="number" name="ativo">
		@endif
		<br>
		<input type="submit" value="Salvar">
	</form>
	<br>
	<a href=" {{route('home')}}">Voltar</a>
</body>
</html>