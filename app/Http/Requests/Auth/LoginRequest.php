<?php

namespace App\Http\Requests\Auth;

use App\Dto\Auth\LoginData;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\WithData;

class LoginRequest extends FormRequest
{
    use WithData;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*\d).+$/'],
            'remember_me' => ['boolean'],
        ];
    }

    /**
     * Data Object class.
     */
    protected function dataClass(): string
    {
        return LoginData::class;
    }
}
