<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:1',
            'interest_rate' => 'required|numeric|min:0',
            'status' => 'required|string',
            'due_date' => 'required|date'
        ];
    }
}