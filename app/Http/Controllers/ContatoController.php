<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class ContatoController extends Controller {
	
	public function content() {
        // Texto Contato
        $arrParams["filter_params"] = array("codpagina" => 4, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_contato = $pub->connect($arrParams);
        
        return view("pages.contato")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_contato", $arr_contato);
    }

}
