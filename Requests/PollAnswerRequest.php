<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PollAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    final public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([
        'poll_id' => "int",
        'question_id' => "int"])]
    final public function rules(): array
    {
        return [
            'poll_id' => 'required|integer',
            'question_id' => 'required|integer',
        ];
    }
}
