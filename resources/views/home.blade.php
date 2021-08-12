<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contatos</title>
</head>
<body>
<h1>Listagem</h1>

<table>
		@foreach ($data as $item)
		<tr>
			<td> {{ $item->razao_social }} </td>

			<td> @if($item->ativo)
					ativo 
				@else 
					inativo
				@endif
			</td>
			
			<td>
			<a href=" {{ route('editarCliente', ['id' => $item->id])}}"><button>Editar</button></a>
			<a href=" {{ route('deletarCliente', ['id' => $item->id])}}"><button>Excluir</button></a>
			<a href=" {{ route('contatos', ['idCliente' => $item->id])}}"><button>Ver Contatos</button></a>
			</td>
			<tr>
		@endforeach
</table>
	<br>
	<a href="{{ route('cadastrarCliente') }}"><button>Novo Cliente</button></a>
</body>
</html>