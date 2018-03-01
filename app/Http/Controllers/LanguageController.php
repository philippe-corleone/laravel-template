<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class LanguageController extends Controller
{
    public function switch($lang){
        if(in_array($lang, config('lang'))){
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}
