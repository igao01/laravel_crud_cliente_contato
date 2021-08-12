<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Cliente;
use App\Models\Contato;

class ContatoController extends Controller
{
    //LISTAR TODOS
	public function list(Request $request, $idCliente) {

		$array = ['error' => '', 'data' => [], 'idCliente' => $idCliente];

		$data = Contato::select()
		->where('id_cliente', $idCliente)
		->get();

		if($data){
			$array['data'] = $data;
		} else {
			$array['error'] = "Não há contatos cadastrados para este cliente";
		}

		return view('listadecontatos', $array);
	}

	//TELA NOVO CONTATO
	public function telaCreate() {
		return view('cadastrarcontato');
	}

	//LISTAR POR ID
	public function listById(Request $request, $idCliente, $id) {
	
		$array = ['error' => '', 'data' => []];

		$data = Contato::find($id);
		
		if($data){
			$array['data'] = $data;
		} else {
			$array['error'] = "Contato não encontrado";
		}

		return view('cadastrarcontato', $array);
	}

	//CADASTRAR
	public function create(Request $request, $idCliente){
		
		$array = ['error' => ''];

		 $validator = Validator::make($request->all(), [
			'nome' => 'required',
			'email' => 'required|email'
        	]);

		//VERIFICA SE O CLIENTE ESTA ATIVO
		$cliente = Cliente::find($idCliente);
		if($cliente->ativo){
			if(!$validator->fails()){
				$nome = $request->input('nome');
				$email = $request->input('email');

				$contato = new Contato();
				$contato->nome = $nome;
				$contato->email = $email;
				$contato->id_cliente = $idCliente;
				$contato->save();
			} else {
				$array['error'] = "Não foi possível cadastrar, verifique se preencheu todos os campos";
			}
		}	
		return redirect()->route('contatos', ['idCliente' => $idCliente]);
	}

	//ATUALIZAR
	public function update(Request $request, $idCliente, $id){
		$array = ['error' => ''];

		$validator = Validator::make($request->all(), [
			'nome' => 'required',
			'email' => 'required|email'
        	]);

		$contato = Contato::find($id);

		//VERIFICA SE CLIENTE ESTA ATIVO
		$cliente = Cliente::find($idCliente);
		if($cliente->ativo){
			if(!$validator->fails()){
				$nome = $request->input('nome');
				$email = $request->input('email');

				$contato->nome = $nome;
				$contato->email = $email;
				$contato->id_cliente = $idCliente;
				$contato->save();
			} else {
				$array['error'] = "Não foi possível cadastrar, verifique se preencheu todos os campos";
			}
		}
		return redirect()->route('contatos', ['idCliente' => $idCliente]);
	}

	//DELETAR
	public function del($idCliente, $id) {

		 //VERIFICA SE CLIENTE ESTA ATIVO
		$cliente = Cliente::find($idCliente);
		if($cliente->ativo){
			Contato::find($id)->delete();
		}
		return redirect()->route('contatos', ['idCliente' => $idCliente]);
	}
}
