<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class TrabalhosController extends Controller {
	
	public function content($offset = null) {
        // Trabalhos
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 12, "offset" => $offset, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_trabalhos = $pub->connect($arrParams);
        $paginations = $pub->paginations;
    
        return view("pages.trabalhos")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_trabalhos", $arr_trabalhos)->with("paginations", $paginations);
    }
	
	public function detail($cod, $trabalho) {
        // Trabalhos
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "codpublicacao" => $cod, "limite" => 1, "imglimite" => 999);
        $pub = new SequenceServiceModel();
        $arr_trabalho = $pub->connect($arrParams);

        // Opengraph
        if(!is_null($arr_trabalho)) {
            $this->model_meta->result[0]->title = Util::getPropFromArray($arr_trabalho, 0, 'titulo');
            $this->model_meta->result[0]->description = Util::getPropFromArray($arr_trabalho, 0, 'subtitulo');

            if($arr_trabalho[0]->countimgs) {
                $this->model_meta->result[0]->imgs = array(Util::getUrlImage($arr_trabalho[0]->imgs[0]->codfotocadastro, 'gd', $arr_trabalho[0]->titulo));
            }
        }
    
        return view("pages.trabalho")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_trabalho", $arr_trabalho);
    }

}
