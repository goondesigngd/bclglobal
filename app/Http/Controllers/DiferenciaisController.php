<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class DiferenciaisController extends Controller {
	
	public function content() {
        // Texto Diferenciais
        $arrParams["filter_params"] = array("codpagina" => 8, "ordem" => array("datapublicacao" => "ASC"), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_texto_diferenciais = $pub->connect($arrParams);

        // Diferenciais
        $arrParams["filter_params"] = array("codpagina" => 9, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_diferenciais = $pub->connect($arrParams);

        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);

        // Retorna a View
        return view("pages.diferenciais")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_texto_diferenciais", $arr_texto_diferenciais)->with("arr_diferenciais", $arr_diferenciais)->with("arr_ambientes", $arr_ambientes);
    }

}
