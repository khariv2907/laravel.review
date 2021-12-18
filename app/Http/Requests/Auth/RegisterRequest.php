<?php

namespace App\Http\Requests\Auth;

use App\Dto\Auth\RegisterData;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\WithData;

class RegisterRequest extends FormRequest
{
    use WithData;
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'max:255'],
        ];
    }

    /**
     * Data Object class.
     */
    protected function dataClass(): string
    {
        return RegisterData::class;
    }
}
