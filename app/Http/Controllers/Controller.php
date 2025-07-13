<?php

namespace App\Http\Controllers;

use App\SequenceServiceModel;
use Cmsgoon\tools\ApiManager;
use Config;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use AuthorizesRequests,
    DispatchesJobs,
    ValidatesRequests,
        ApiManager;

    public $enderecos;
    public $boxesRodape;

    public function __construct()
    {

        $arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'), "imglimite" => 1);

        $this->model_loja = new SequenceServiceModel();
        $this->model_loja->connect($arrParams, "get-stores");

        if (count($this->model_loja->result) == 0) {
            throw new \Exception("Não existe dados da loja");
        }

        $this->model_meta = new SequenceServiceModel();
        $this->model_meta->getMettaDefault($arrParams, "get-stores");

        // Endereços
        $arrParams["filter_params"] = array("codpagina" => 16, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'));
        $pub = new SequenceServiceModel();
        $this->enderecos = $pub->connect($arrParams);

        // Boxes Rodapé
        $arrParams["filter_params"] = array("codpagina" => 1, "ordem" => array("datapublicacao" => "ASC"), "idioma" => Config::get('app.locale'), "imglimite" => 1);
        $pub = new SequenceServiceModel();
        $this->boxesRodape = $pub->connect($arrParams);
    }

}
