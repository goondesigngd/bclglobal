<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;
use Validator;
use Session;

class RevendedorController extends Controller {
	
	public function content() {
        // Texto
        $arrParams["filter_params"] = array("codpagina" => 13, "ordem" => array("datapublicacao" => "ASC"), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_texto = $pub->connect($arrParams);

        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);
        
		// Retorna a View
        return view("pages.sejarevendedor")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_texto", $arr_texto)->with("arr_ambientes", $arr_ambientes);
    }

	public function sendform(Request $request) {
		$rules = ['nome' => 'required', 'nascimento' => 'required', 'estadocivil' => 'required', 'cpf' => 'required', 'rg' => 'required', 'profissao' => 'required', 'formacao' => 'required', 'telefone' => 'required', 'email' => 'required|email', 'endereco' => 'required', 'estado' => 'required', 'cidade' => 'required', 'cep' => 'required', 'ramoatuacao' => 'required', 'empresas' => 'required', 'cnpj' => 'required', 'mediamensalfaturamento' => 'required', 'funcionarios' => 'required', 'showroom' => 'required', 'cidadedestino' => 'required', 'localdestino' => 'required', 'g-recaptcha-response' => 'required'];
		$text = 'Favor, informe o campo :attribute ';
		$messages = ['nome.required' => $text, 'nascimento.required' => $text, 'estadocivil.required' => $text, 'cpf.required' => $text, 'rg.required' => $text, 'profissao.required' => $text, 'formacao.required' => $text, 'telefone.required' => $text, 'email.required' => $text, 'endereco.required' => $text, 'estado.required' => $text, 'cidade.required' => $text, 'cep.required' => $text, 'ramoatuacao.required' => $text, 'empresas.required' => $text, 'cenpj.required' => $text, 'mediamensalfaturamento.required' => $text, 'funcionarios.required' => $text, 'showroom.required' => $text, 'cidadedestino.required' => $text, 'localdestino.required' => $text, 'g-recaptcha-response.required' => "Favor, marque o Recaptcha de seguranca", 'email.email' => 'Informe um email válido'];

		$validator = Validator::make($request -> all(), $rules, $messages);

		if ($validator -> fails()) {
			$campo = "";

			if($validator->errors()->has('nome') && $campo == "") {
				$campo = "nome";
			}

			if($validator->errors()->has('nascimento') && $campo == "") {
				$campo = "nascimento";
			}

			if($validator->errors()->has('estadocivil') && $campo == "") {
				$campo = "estadocivil";
			}

			if($validator->errors()->has('cpf') && $campo == "") {
				$campo = "cpf";
			}

			if($validator->errors()->has('rg') && $campo == "") {
				$campo = "rg";
			}

			if($validator->errors()->has('profissao') && $campo == "") {
				$campo = "profissao";
			}

			if($validator->errors()->has('formacao') && $campo == "") {
				$campo = "formacao";
			}

			if($validator->errors()->has('telefone') && $campo == "") {
				$campo = "telefone";
			}

			if($validator->errors()->has('email') && $campo == "") {
				$campo = "email";
			}

			if($validator->errors()->has('endereco') && $campo == "") {
				$campo = "endereco";
			}

			if($validator->errors()->has('estado') && $campo == "") {
				$campo = "estado";
			}

			if($validator->errors()->has('cidade') && $campo == "") {
				$campo = "cidade";
			}

			if($validator->errors()->has('cep') && $campo == "") {
				$campo = "cep";
			}

			if($validator->errors()->has('ramoatuacao') && $campo == "") {
				$campo = "ramoatuacao";
			}

			if($validator->errors()->has('empresas') && $campo == "") {
				$campo = "empresas";
			}

			if($validator->errors()->has('cnpj') && $campo == "") {
				$campo = "cnpj";
			}

			if($validator->errors()->has('mediamensalfaturamento') && $campo == "") {
				$campo = "mediamensalfaturamento";
			}

			if($validator->errors()->has('funcionarios') && $campo == "") {
				$campo = "funcionarios";
			}

			if($validator->errors()->has('showroom') && $campo == "") {
				$campo = "showroom";
			}

			if($validator->errors()->has('cidadedestino') && $campo == "") {
				$campo = "cidadedestino";
			}

			if($validator->errors()->has('localdestino') && $campo == "") {
				$campo = "localdestino";
			}

			$arr_retorno = array(
				"mensagem" => $validator->errors()->first(),
				"campo" => $campo
			);

			return response()->json($arr_retorno, 400);
		}

		if ($validator -> passes()) {
			$nome = $request -> input("nome", "nao informado");
			$nascimento = $request -> input("nascimento", "nao informado");
			$estadocivil = $request -> input("estadocivil", "nao informado");
			$cpf = $request -> input("cpf", "nao informado");
			$rg = $request -> input("rg", "nao informado");
			$profissao = $request -> input("profissao", "nao informado");
			$formacao = $request -> input("formacao", "nao informado");
			$telefone = $request -> input("telefone", "nao informado");
			$email = $request -> input("email", "nao informado");
			$endereco = $request -> input("endereco", "nao informado");
			$estado = $request -> input("estado", "nao informado");
			$cidade = $request -> input("cidade", "nao informado");
			$cep = $request -> input("cep", "nao informado");
			$ramoatuacao = $request -> input("ramoatuacao", "nao informado");
			$empresas = $request -> input("empresas", "nao informado");
			$cnpj = $request -> input("cnpj", "nao informado");
			$mediamensalfaturamento = $request -> input("mediamensalfaturamento", "nao informado");
			$funcionarios = $request -> input("funcionarios", "nao informado");
			$showroom = $request -> input("showroom", "nao informado");
			$cidadedestino = $request -> input("cidadedestino", "nao informado");
			$localdestino = $request -> input("localdestino", "nao informado");
			$acceptnews = $request -> input("acceptnews");

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_meta = array();
			$pub = new SequenceServiceModel();
			$arr_meta = $pub -> getMettaDefault($arrParams, "get-stores");

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_loja = array();
			$pub = new SequenceServiceModel();
			$arr_loja = $pub -> lists($arrParams, "get-stores");

            $body = view('pages.contentWorkFlowBuildRevendedor') -> with('arr_loja', $arr_loja) -> with('nome', $nome) -> with('nascimento', $nascimento) -> with('estadocivil', $estadocivil) -> with('cpf', $cpf) -> with('rg', $rg) -> with('profissao', $profissao) -> with('formacao', $formacao) -> with('telefone', $telefone) -> with('email', $email) -> with('endereco', $endereco) -> with('estado', $estado) -> with('cidade', $cidade) -> with('cep', $cep) -> with('ramoatuacao', $ramoatuacao) -> with('empresas', $empresas) -> with('mediamensalfaturamento', $mediamensalfaturamento) -> with('funcionarios', $funcionarios) -> with('showroom', $showroom) -> with('cidadedestino', $cidadedestino) -> with('localdestino', $localdestino);
            
            $util = new Util();

			// $util -> sendMail($arr_loja, "Contato de representante feito pelo site", $body);

			if (strtolower($acceptnews) == 'on') {

				$goonSendMailController = new GoonSendMailController();
				$goonSendMailController -> addemail($request, 'contato', 'contato');
			}

			Session::flash('success', 'Seu contato foi enviado, logo estaremos lhe respondendo o email, obrigado!');

			return response()->json(array("mensagem" => "Sua mensagem foi enviada, agradecemos o seu contato."), 200);

		}

		return response()->json(array("mensagem" => "Erro desconhecido"), 500);
	}

}
