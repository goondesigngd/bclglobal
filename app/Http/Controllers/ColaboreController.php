<?php

namespace App\Http\Controllers;

use App\SequenceServiceModel;
use Config;

class ColaboreController extends Controller
{

    public function content()
    {
        // Texto Colabore
        $arrParams["filter_params"] = array("codpagina" => 11, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_colabore = $pub->connect($arrParams);

        // Formas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_formas = $pub->connect($arrParams);

        // Colaboradores
        $arrParams["filter_params"] = array("codpagina" => 13, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_colaboradores = $pub->connect($arrParams);

        // Texto
        $arrParams["filter_params"] = array("codpagina" => 17, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_texto = $pub->connect($arrParams);

        // Bancos
        $arrParams["filter_params"] = array("codpagina" => 18, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_bancos = $pub->connect($arrParams);

        // Botões
        $arrParams["filter_params"] = array("codpagina" => 19, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_botoes = $pub->connect($arrParams);

        // Formas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_formas = $pub->connect($arrParams);

        return view("pages.colabore")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_colabore", $arr_colabore)->with("arr_formas", $arr_formas)->with("arr_colaboradores", $arr_colaboradores)->with("arr_texto", $arr_texto)->with("arr_bancos", $arr_bancos)->with("arr_botoes", $arr_botoes);
    }

    public function detail($cod, $forma)
    {
        // Forma
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("codpublicacao" => "ASC"), "codpublicacao" => $cod, "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_forma = $pub->connect($arrParams);

        // Formas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_formas = $pub->connect($arrParams);

        // Colaboradores
        $arrParams["filter_params"] = array("codpagina" => 13, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_colaboradores = $pub->connect($arrParams);

        return view("pages.forma-contribuicao")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_forma", $arr_forma)->with("arr_formas", $arr_formas)->with("arr_colaboradores", $arr_colaboradores);
    }

    public function channels()
    {
        // Texto
        $arrParams["filter_params"] = array("codpagina" => 17, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "limite" => 1, "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_texto = $pub->connect($arrParams);

        // Bancos
        $arrParams["filter_params"] = array("codpagina" => 18, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_bancos = $pub->connect($arrParams);

        // Botões
        $arrParams["filter_params"] = array("codpagina" => 19, "ordem" => array("datapublicacao" => "ASC"), "imglimite" => 0);
        $pub = new SequenceServiceModel();
        $arr_botoes = $pub->connect($arrParams);

        // Formas
        $arrParams["filter_params"] = array("codpagina" => 12, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_formas = $pub->connect($arrParams);

        // Colaboradores
        $arrParams["filter_params"] = array("codpagina" => 13, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $arr_colaboradores = $pub->connect($arrParams);

        return view("pages.canais-doacao")->with("arr_loja", $this->model_loja->result)->with("arr_meta", $this->model_meta->result)->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape)->with("arr_texto", $arr_texto)->with("arr_bancos", $arr_bancos)->with("arr_botoes", $arr_botoes)->with("arr_formas", $arr_formas)->with("arr_colaboradores", $arr_colaboradores);
    }

}
