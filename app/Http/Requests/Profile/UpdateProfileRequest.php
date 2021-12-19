<?php

namespace App\Http\Requests\Profile;

use App\Dto\Profile\UpdateProfileData;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\WithData;

class UpdateProfileRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(Auth::id())],
        ];
    }

    /**
     * Data Object class.
     */
    protected function dataClass(): string
    {
        return UpdateProfileData::class;
    }
}
