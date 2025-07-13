<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Cmsgoon\tools\Util;
use Config;
use Session;
use Lang;

class GoonSendMailController extends Controller {

	public function sendform(Request $request) {

		/*******************
		 * TRATAMENTO DE VALIDACOES DE CAMPOS
		 *******************/

		// $rules = ['nome' => 'required', 'mensagem' => 'required', 'required|email' => 'email', 'g-recaptcha-response' => 'required'];
		$rules = ['nome' => 'required', 'mensagem' => 'required', 'required|email' => 'email'];
		$text = Lang::get('content.contato.mensagem-campo-vazio') . ' :attribute ';
		$messages = ['nome.required' => $text, 'mensagem.required' => $text, 'email.required' => $text, 'g-recaptcha-response.required' => Lang::get('content.contato.mensagem-recaptcha'), 'email.email' => Lang::get('content.contato.mensagem-email')];

		$validator = Validator::make($request -> all(), $rules, $messages);

		if ($validator -> fails()) {
			$campo = "";

			if($validator->errors()->has('nome')) {
				$campo = "nome";
			}

			if($validator->errors()->has('email')) {
				$campo = "email";
			}

			if($validator->errors()->has('telefone')) {
				$campo = "telefone";
			}

			if($validator->errors()->has('mensagem')) {
				$campo = "mensagem";
			}

			$arr_retorno = array(
				"mensagem" => $validator->errors()->first(),
				"campo" => $campo
			);

			return response()->json($arr_retorno, 400);
		}

		if ($validator -> passes()) {
			/*******************
			 * CAPTURA DO CAMPOS PARA ENVIO DE EMAILS
			 *******************/

			$nome = $request -> input("nome", "nao informado");
			$telefone = $request -> input("fone", "nao informado");
			$email = $request -> input("email", "nao informado");
			$telefone = $request -> input("telefone", "nao informado");
			$mensagem = $request -> input("mensagem", "nao informado");
			$acceptnews = $request -> input("acceptnews");

			/*******************
			 * BUSCA DADOS LOJA
			 *******************/

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_meta = array();
			$pub = new SequenceServiceModel();
			$arr_meta = $pub -> getMettaDefault($arrParams, "get-stores");

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_loja = array();
			$pub = new SequenceServiceModel();
			$arr_loja = $pub -> lists($arrParams, "get-stores");

			/*******************
			 * ENVIO DOS DADOS POR EMAIL PHP MAILER
			 *******************/

			// RETORNA O WORKFLOW DO EMAIL
			$body = view('pages.contentWorkFlowBuild') -> with('arr_loja', $arr_loja) -> with('nome', $nome) -> with('email', $email) -> with('telefone', $telefone) -> with('mensagem', $mensagem);
			//return $body;
			$util = new Util();

			$util -> sendMail($arr_loja, "Contato feito pelo site", $body);

			if (strtolower($acceptnews) == 'on') {

				$goonSendMailController = new GoonSendMailController();
				$goonSendMailController -> addemail($request, 'contato', 'contato');
			}

			return response()->json(array("mensagem" => Lang::get('content.contato.mensagem-sucesso')), 200);

		}

		return response()->json(array("mensagem" => Lang::get('content.contato.erro-interno')), 500);
	}

	public function addemail(Request $request) {

		/*******************
		 * CADASTRO DE EMAILS
		 *******************/

		$observacoes = "Cidade: " . $request -> input("cidade") . " - Fone: " . $request -> input("fone");

		$arrParams['itens'][] = array("nome" => $request -> input("nome"), "email" => $request -> input("email"), "observacoes" => $observacoes, "codgrupo" => $request -> input("grupoemail"));

		$pub = new SequenceServiceModel();
		$arr_email = $pub -> lists($arrParams, "set-newsletters");

		return true;

	}

	public function subscribeMail(Request $request) {
		/*******************
		 * TRATAMENTO DE VALIDACOES DE CAMPOS
		 *******************/

		$rules = ['email' => 'email'];
		//$rules = ['nome' => 'required']; teste
		$text = 'Favor, informe o campo :attribute ';
		$messages = ['email.email' => 'Informe um email válido'];

		// se marcado opca de receber newsletter
		// entao valida o email

		$rules['email'] = 'required|email';
		$messages['email.email'] = 'Favor, informe um email correto.';
		$messages['email.required'] = 'Favor, informe um email para receber nossas newsletters.';

		$validator = Validator::make($request -> all(), $rules, $messages);

		if ($validator -> fails()) {
			$campo = "";
			
			if($validator->errors()->has('email')) {
				$campo = "email";
			}

			$arr_retorno = array(
				"mensagem" => $validator->errors()->first(),
				"campo" => $campo
			);

			return response()->json($arr_retorno, 400);
		}

		if ($validator -> passes()) {

			$goonSendMailController = new GoonSendMailController();
			$goonSendMailController -> addemail($request);

			Session::flash('success', 'Obrigado por assinar nossa página.');

			return response()->json(array("mensagem" => "Sua mensagem foi enviada, agradecemos o seu contato."), 200);

		}

		return response()->json(array("mensagem" => "Erro desconhecido"), 500);

	}

}
