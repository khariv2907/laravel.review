<?php

namespace App\Http\Requests\Profile;

use App\Dto\Profile\UpdatePasswordData;
use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\WithData;

class UpdatePasswordRequest extends FormRequest
{
    use WithData;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed', 'min:6', 'max:255', 'regex:/^(?=.*[a-z])(?=.*\d).+$/'],
        ];
    }

    /**
     * Data Object class.
     */
    protected function dataClass(): string
    {
        return UpdatePasswordData::class;
    }
}
