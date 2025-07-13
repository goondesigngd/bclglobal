<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class AmbientesController extends Controller {
	
	public function content($ambiente = null) {
        // Ambientes
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 99999);
        $pub = new SequenceServiceModel();
        $arr_ambientes = $pub->connect($arrParams);

        if(!is_null($ambiente)) {
            foreach($arr_ambientes as $i => $amb) {
                if($ambiente == str_slug($amb->titulo)) {
                    $this->model_meta->result[0]->title = Util::getPropFromArray($arr_ambientes, $i, 'titulo');
                    $this->model_meta->result[0]->description = Util::getPropFromArray($arr_ambientes, $i, 'subtitulo');
                    $this->model_meta->result[0]->imgs = array(Util::getUrlImage($arr_ambientes[$i]->imgs[0]->codfotocadastro, 'gd', $arr_ambientes[$i]->titulo));
                }
            }
        }

        // Retorna a View
        return view("pages.ambientes")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_ambientes", $arr_ambientes);
    }

}
