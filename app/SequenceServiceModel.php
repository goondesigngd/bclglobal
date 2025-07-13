<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cmsgoon\tools\Util;
use Cmsgoon\tools\ApiManager;

class SequenceServiceModel extends Model {

    use ApiManager;

    public function lists($arrParams, $service) {

        return $this->connect($arrParams, $service);
    }

}
