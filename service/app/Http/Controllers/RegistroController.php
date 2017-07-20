<?php

namespace App\Http\Controllers;
use App\Registro;
//use Mail;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
	public function postRegistro(Request $request){
		$registro = new Registro();
		$registro->nombre = $request->input('nombre');
		$registro->mail = $request->input('mail');
		$registro->profesion = $request->input('profesion');
		$registro->save();
		$mail = 'besaze@hotmail.com';

		/*Mail::raw('Mail de registro Landing', function($message)
		{
		    $message->from('info@algaro.com', 'Algaro Mailing');
		    $message->to('besaze@hotmail.com');
		});*/

		return response()->json(['registro'=> $registro],201);
	}

	public function getRegistros(){
		$registros = Registro::all();
		$response = [
			'registros' => $registros
		];
		return response()->json($response, 200);
	}

}
