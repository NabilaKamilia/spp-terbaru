<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Convert
{

    public function convertDate($params)
    {
        $date = Carbon::parse($params);
        // return $date->translatedFormat('l, d F Y');
        return $date->translatedFormat('d-m-Y H:i:s');
    }
}


?>
