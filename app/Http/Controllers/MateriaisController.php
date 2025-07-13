<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class MateriaisController extends Controller {
	
	public function content() {
        // Texto Materiais
        $arrParams["filter_params"] = array("codpagina" => 14, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_materiais = $pub->connect($arrParams);

        // Arquivos
        $arrParams["filter_params"] = array("codpagina" => 15, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "filelimite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_arquivos = $pub->connect($arrParams);

        return view("pages.materiais")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_materiais", $arr_materiais)->with("arr_arquivos", $arr_arquivos);
    }

}
