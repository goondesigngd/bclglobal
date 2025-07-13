<?php

namespace App\Http\Controllers;

use App\SequenceServiceModel;
use Config;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function content(Request $request)
    {
        // Banner
        $arrParams["filter_params"] = array("codpagina" => 2, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "filelimite" => 3, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_banners = $pub->connect($arrParams);

        // Vídeo
        $arrParams["filter_params"] = array("codpagina" => 3, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_video = $pub->connect($arrParams);

        // Texto Sobre
        $arrParams["filter_params"] = array("codpagina" => 6, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_sobre = $pub->connect($arrParams);

        // Texto Contribuir
        $arrParams["filter_params"] = array("codpagina" => 7, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_contribuir = $pub->connect($arrParams);

        // Trabalhos
        $arrParams["filter_params"] = array("codpagina" => 10, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 3, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_trabalhos = $pub->connect($arrParams);

        return view("pages.home")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_banners", $arr_banners)->with("arr_video", $arr_video)->with("arr_sobre", $arr_sobre)->with("arr_contribuir", $arr_contribuir)->with("arr_trabalhos", $arr_trabalhos);
    }

}
