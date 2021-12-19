<?php

namespace App\Http\Requests\Article;

use App\Dto\Article\UpdateArticleData;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\WithData;

class UpdateArticleRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255', Rule::unique(Article::class)->ignore($this->article)],
            'content' => ['required', 'min:3'],
        ];
    }

    /**
     * Data Object class.
     */
    protected function dataClass(): string
    {
        return UpdateArticleData::class;
    }
}
