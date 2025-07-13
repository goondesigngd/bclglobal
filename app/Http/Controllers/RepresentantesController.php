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

class RepresentantesController extends Controller {
	
	public function content() {
        // Texto Representantes
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_texto = $pub->connect($arrParams);
        
		// Categorias de Lojas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("desccategorias" => "ASC"));
        $pub = new SequenceServiceModel();
		$arr_categorias_lojas = $pub->connect($arrParams, "get-publishes-categories");
        
		// Lojas
		$categoria = Util::getPropFromArray($arr_categorias_lojas, 0, 'codcategoriapublicacao');
        $arrParams["filter_params"] = array("codpagina" => 12, "codcategoriapublicacao" => $categoria, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
		$arr_lojas = $pub->connect($arrParams);

        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);
		
		return view("pages.encontrenos")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_texto", $arr_texto)->with("arr_categorias_lojas", $arr_categorias_lojas)->with("arr_lojas", $arr_lojas)->with("arr_ambientes", $arr_ambientes);
    }
	
	public function contentFilter($categoria, $slug) {
        // Texto Representantes
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_texto = $pub->connect($arrParams);
        
		// Categorias de Lojas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("datapublicacao" => "ASC"));
        $pub = new SequenceServiceModel();
		$arr_categorias_lojas = $pub->connect($arrParams, "get-publishes-categories");
        
        // Lojas
        $arrParams["filter_params"] = array("codpagina" => 12, "codcategoriapublicacao" => $categoria, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
		$arr_lojas = $pub->connect($arrParams);

        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);
		
		return view("pages.encontrenos")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_texto", $arr_texto)->with("arr_categorias_lojas", $arr_categorias_lojas)->with("arr_lojas", $arr_lojas)->with("arr_ambientes", $arr_ambientes)->with("categoria_filtro", $categoria);
    }
	
	public function contentNoExist() {
        // Texto Representantes
        $arrParams["filter_params"] = array("codpagina" => 11, "ordem" => array("datapublicacao" => "ASC"), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
		$arr_texto = $pub->connect($arrParams);

        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);
		
        return view("pages.encontrenos-representantes")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_texto", $arr_texto)->with("arr_ambientes", $arr_ambientes);
    }

	public function sendform(Request $request) {
		$rules = ['nome' => 'required', 'estado' => 'required', 'cidade' => 'required', 'mensagem' => 'required', 'email' => 'email', 'g-recaptcha-response' => 'required'];
		$text = 'Favor, informe o campo :attribute ';
		$messages = ['nome.required' => $text, 'estado.required' => $text, 'cidade.required' => $text, 'mensagem.required' => $text, 'g-recaptcha-response.required' => "Favor, marque o Recaptcha de seguranca", 'email.email' => 'Informe um email válido'];

		if ($request -> input("acceptnews")) {
			$rules['email'] = 'required|email';
			$messages['email.email'] = 'Informe um email válido';
			$messages['email.required'] = 'Informe um email para receber nossas newsletters';
		}

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

			if($validator->errors()->has('estado')) {
				$campo = "estado";
			}

			if($validator->errors()->has('cidade')) {
				$campo = "cidade";
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
			$nome = $request -> input("nome", "nao informado");
			$telefone = $request -> input("fone", "nao informado");
			$email = $request -> input("email", "nao informado");
			$telefone = $request -> input("telefone", "nao informado");
			$estado = $request -> input("estado", "nao informado");
			$cidade = $request -> input("cidade", "nao informado");
			$mensagem = $request -> input("mensagem", "nao informado");
			$acceptnews = $request -> input("acceptnews");

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_meta = array();
			$pub = new SequenceServiceModel();
			$arr_meta = $pub -> getMettaDefault($arrParams, "get-stores");

			$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

			$arr_loja = array();
			$pub = new SequenceServiceModel();
			$arr_loja = $pub -> lists($arrParams, "get-stores");

			$body = view('pages.contentWorkFlowBuildRepresentante') -> with('arr_loja', $arr_loja) -> with('nome', $nome) -> with('email', $email) -> with('telefone', $telefone) -> with('estado', $estado) -> with('cidade', $cidade) -> with('mensagem', $mensagem);
            
            $util = new Util();

			$util -> sendMail($arr_loja, "Contato de representante feito pelo site", $body);

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
