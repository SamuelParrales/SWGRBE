<?php

namespace App\Http\Requests\rest\v1;

use App\Rules\CheckFormatPassword;
use App\Rules\VerifyPassword;
use Illuminate\Foundation\Http\FormRequest;


class UpdatePasswordRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' =>['required', new VerifyPassword()],
            'new_password' =>['required','different:password',new CheckFormatPassword()],
            'repeat_new_password' =>'required|same:new_password'
        ];
    }

    public function attributes()
    {
        return [
            'password'=>'contraseña actual',
            'new_password' => 'nueva contraseña',
            'repeat_new_password' => 'repetir nueva contraseña',

        ];
    }

}
