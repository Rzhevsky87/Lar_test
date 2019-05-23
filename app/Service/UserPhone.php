<?php

namespace App\Service;

use Illuminate\Http\Request; // класс пользовательского запроса

/**
 * Получает телефон из формы регистрации и передает в RegisterController
 *
 */
trait UserPhone {
    public static function phone (Request $request)
    {
        $phone = [
            'phone_code_1' => '',
            'phone_code_2' => '',
            'phone_namber' => '',
            'phone_namber_full'  => !$request->input('phone') ? $phone = 'none' : $phone = $request->input('phone'),
        ];
        return $phone;
    }
}
