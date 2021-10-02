<?php

namespace App\Http\Requests;

use App\Models\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'level' => [
                'required',
                'string',
                'max:255',
                Rule::in(Log::getLevels())
            ],
            'category' => 'required|string',
            'message' => 'required|string',
            'data' => 'array',
            'files' => 'array',
            'files.*' => 'file'
        ];
    }
}
