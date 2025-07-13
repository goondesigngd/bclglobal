<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class EmpresaController extends Controller {
	
	public function content() {
        // Sobre
        $arrParams["filter_params"] = array("codpagina" => 5, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_sobre = $pub->connect($arrParams);
        
        // Trabalhos
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 3, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_trabalhos = $pub->connect($arrParams);
    
        return view("pages.empresa")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_sobre", $arr_sobre)->with("arr_trabalhos", $arr_trabalhos);
    }

}
