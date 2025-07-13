<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SequenceServiceModel;
use Config;
use Cmsgoon\tools\Util;

class GoonAnalyserController extends Controller {

	public function redirect($lastpage, $redirect, $publisher = "") {

		/*******************
		 * BUSCA DADOS PUBLICACOES
		 *******************/

		$analyser = new SequenceServiceModel();
		$arrParams = array();

		$arrParams['set_data']['publisher'] = $publisher;
		$arrParams['set_data']['linkfrom'] = $lastpage;
		$arrParams['set_data']['redirect'] = $redirect;
		$arrParams['set_data']['ip'] = $_SERVER['REMOTE_ADDR'];
		$arrParams['set_data']['monitored'] = 'S';

		return redirect($analyser -> setAnalysingDatas($arrParams));

	}

}
