<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class MembrosController extends Controller {
	
	public function content() {
        // Membros
        $arrParams["filter_params"] = array("codpagina" => 20, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 999, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_membros = $pub->connect($arrParams);

        return view("pages.membros")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_membros", $arr_membros);
    }

}
