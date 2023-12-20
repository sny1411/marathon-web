<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test(){

        $chaîte = Chapitre::find(1);
        dd($chaîte->suivants);
    }
}
