<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'interest_rate' => $this->interest_rate,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'created_at' => $this->created_at
        ];
    }
}