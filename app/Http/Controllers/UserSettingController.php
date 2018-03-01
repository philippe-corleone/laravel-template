<?php

namespace App\Http\Controllers;

use App\Rules\ValidateLanguage;
use Illuminate\Http\Request;
use Corleone\UserSettings\UserSettings;
use App;
use Session;

class UserSettingController extends Controller
{
    public function edit(){
        return view(config('route.users') . '.settings');
    }

    public function update(Request $request){

        $this->validate($request, [
            'lang' => [new ValidateLanguage()]
        ]);

        $input = $request->all();

        UserSettings::set('lang', $input['lang']);

        if($input['lang'] === 'default'){
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            if(in_array($locale, config('lang')))
                Session::put('locale', $locale);
            else
                Session::put('locale', config('app.fallback_locale'));
        }
        else
            Session::put('locale', $input['lang']);

        return redirect()->route('user-settings.edit')
            ->with('success', __('settings.successfully-updated'));
    }
}
