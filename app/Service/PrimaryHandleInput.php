<?php

namespace App\Service;

use Illuminate\Http\Request; // класс пользовательского запроса

trait PrimaryHandleInput
{
    /**
     * Defines email or phone entered by user
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string
     */
    public static function checkEmailOrPhone (Request $request)
    {
        mb_stristr($request->input('login'), '@') ? $login = 'email' : $login = 'phone_namber_full';
        return $login;
    }

    /**
     * Replace the key in the data array with a suitable
     * Заменить ключ в массиве данных на подходящий
     * НЕ РАБОТАЕТ. ВЫЯСНИТЬ ПО ЧЕМУ
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public static function replaceKey (Request $request)
    {
        $date = $request->input('login');
        $request->offsetUnset('login');
        $request->merge([PrimaryHandleInput::checkEmailOrPhone($request)=>$date]);
    }
}
