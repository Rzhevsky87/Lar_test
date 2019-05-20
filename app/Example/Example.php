<?php

namespace App\Example;

use Illuminate\Http\Request; // Получить пользовательский номер телефона

trait Example {
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
