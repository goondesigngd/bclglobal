<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cookie;
use Cmsgoon\tools\Util;

class CapacitacaoController extends Controller {
	
	public function content() {
        // Texto Capacitação
        $arrParams["filter_params"] = array("codpagina" => 8, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_capacitacao = $pub->connect($arrParams);
        
        // Matérias
        $arrParams["filter_params"] = array("codpagina" => 9, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_materias = $pub->connect($arrParams);

        // Monta Colunas Matérias
        $quant_por_coluna = ceil(count($arr_materias) / 4);
        $arr_materias = array_chunk($arr_materias, $quant_por_coluna);
    
        return view("pages.capacitacao")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_capacitacao", $arr_capacitacao)->with("arr_materias", $arr_materias);
    }
	
	public function detail($cod, $materia) {
        // Matéria
        $arrParams["filter_params"] = array("codpagina" => 9, "ordem" => array("datapublicacao" => "ASC"), "codpublicacao" => $cod, "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_materia = $pub->connect($arrParams);
        
        // Matérias
        $arrParams["filter_params"] = array("codpagina" => 9, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_materias = $pub->connect($arrParams);

        // Opengraph
        if(!is_null($arr_materia)) {
            $this->model_meta->result[0]->title = Util::getPropFromArray($arr_materia, 0, 'titulo');
            $this->model_meta->result[0]->description = Util::getPropFromArray($arr_materia, 0, 'subtitulo');

            if($arr_materia[0]->countimgs) {
                $this->model_meta->result[0]->imgs = array(Util::getUrlImage($arr_materia[0]->imgs[0]->codfotocadastro, 'gd', $arr_materia[0]->titulo));
            }
        }
    
        return view("pages.materia")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_materia", $arr_materia)->with("arr_materias", $arr_materias);
    }

}
