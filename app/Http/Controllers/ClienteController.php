<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Cliente;
use App\Models\Contato;

class ClienteController extends Controller
{
    //LISTAR TODOS
	public function list(Request $request) {

		$array = ['error' => '', 'data' => []];

		$data = Cliente::select()->get();

		if($data){
			$array['data'] = $data;
		} else {
			$array['error'] = "Não há clientes cadastrados";
		}

		//return $array; API
		return view('home', $array);
	}

	//LISTAR POR ID
	public function listById(Request $request, $id) {
	
		$array = ['error' => '', 'data' => []];

		if($id > 0){
			$data = Cliente::find($id);
			if($data){
				$array['data'] = $data; 
			}
		}
		return view('cadastrarcliente', $array);
	}

	//TELA DE CADASTRO
	public function telaCreate(){
			
		return view('cadastrarcliente');
	}

	//CADASTRAR
	public function create(Request $request){
		$array = ['error' => '', 'data' => []];

		 $validator = Validator::make($request->all(), [
			'razao_social' => 'required',
			'ativo' => 'required'
        	]);

		if(!$validator->fails()){

			$razaoSocial = $request->input('razao_social');
			$ativo = $request->input('ativo');

			$cliente = new Cliente();
			$cliente->razao_social  = $razaoSocial;
			$cliente->ativo = $ativo;
			$cliente->save();

			$data = Cliente::select()->get();
			return redirect()->route('home', $array);
		} else {
			$array['error'] = "Não foi possível cadastrar, verifique se preencheu todos os campos";
		}
	}

	//ATUALIZAR
	public function update(Request $request, $id){
		$array = ['error' => '', 'data' => ''];

		$validator = Validator::make($request->all(), [
			'razao_social' => 'required',
			'ativo' => 'required'
        	]);

		$cliente = Cliente::find($id);

		if(!$validator->fails()){
			$razaoSocial  = $request->input('razao_social');
			$ativo = $request->input('ativo');

			$cliente->id = $id;
			$cliente->razao_social = $razaoSocial;
			$cliente->ativo = $ativo;
			$cliente->save();

			$data = Cliente::select()->get();
			return redirect()->route('home', $array);
		} else {
			$array['error'] = "Não foi possível cadastrar, verifique se preencheu todos os campos";
		}
	}

	//DELETAR
	public function del(Request $request, $id) {

		$cliente = Cliente::find($id);

		//VERIFICA SE O CLIENTE POSSUI CONTATOS CADASTRADOS
		$contato = Contato::select()
		->where('id_cliente', $id)
		->get();

		if($cliente){
			if(count($contato) <= 0){
				$cliente->delete();
			}
		}
		return redirect()->route('home');
	}
}
