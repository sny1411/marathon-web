<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        $avis = Avis::where('user_id', Auth::user()->id)->get();
        $histoires = Histoire::where('user_id', Auth::user()->id)->get();
        $finies = Histoire::whereIn('id', function($query) {
            $query->select('histoire_id')
                ->from('terminees')
                ->where('user_id', Auth::user()->id);
        })->get();

        return view('user', ['histoires' => $histoires, 'finies' => $finies, 'avis' => $avis]);
    }
}
