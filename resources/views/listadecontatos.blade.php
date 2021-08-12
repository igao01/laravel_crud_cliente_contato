<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contatos</title>
</head>
<body>
<table>
@foreach ($data as $item)
		  <tr>
			<td> {{ $item->nome }}</td>
			<td>{{ $item->email }}</td>
			<td>
				<a href=" {{ route('editarContato', ['idCliente' => $item->id_cliente,'id' => $item->id])}}"><button>Editar</button></a>
				<a href=" {{ route('deletarContato', ['idCliente' => $item->id_cliente, 'id' => $item->id])}}"><button>Excluir</button></a>
			</td>
		  </tr>
	@endforeach
</table>
	<br>
	<a href="{{ route('cadastrarContato', ['idCliente' => $idCliente])}}"><button>Novo Contato</button></a> 
	<br>
	<a href="{{ route('home') }}">Voltar</a>
</body>
</html>