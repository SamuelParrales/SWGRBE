<?php

namespace App\Http\Requests\rest\v1;

use App\Rules\VerifyPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class UpdateProfileRequest extends FormRequest
{
    public $id;
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
        $this->id = Auth::user()->id;
        return [
            'name' => 'required|string|min:3|max:50',
            'last_name' =>'required|string|min:3|max:50',
            'username' =>['required','string','min:3','max:16',Rule::unique('users', 'username')->ignore($this->id)],
            'email' => ['required','email','max:255',Rule::unique('users', 'email')->ignore($this->id)],
            'password' =>['required','string','max:16',new VerifyPassword()]
        ];
    }
}
