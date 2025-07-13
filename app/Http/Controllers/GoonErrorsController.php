<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cmsgoon\tools\Util;

class GoonErrorsController extends Controller {

	public function error404() {
		$arrParams['filter_params'] = array("codloja" => Config::get('app.sequence_codloja'));

		$arr_loja = array();
		$pub = new SequenceServiceModel();
		$arr_loja = $pub -> lists($arrParams, "get-stores");

		$arr_meta = array();
		$pub = new SequenceServiceModel();
		$arr_meta = $pub -> getMettaDefault($arrParams, "get-stores");

		return view('errors.404')-> with(compact('arr_meta'))->with(compact('arr_loja'))->with("arr_enderecos", $this->enderecos)->with("arr_boxes_rodape", $this->boxesRodape);

	}

}
