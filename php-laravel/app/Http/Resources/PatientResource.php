<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->full_name,
            'cpf' => $this->cpf,
            'cell_phone' => $this->cell_phone,
            'birthday' => Carbon::make($this->birthday)->format('Y-m-d'),
            'rg' => $this->rg,
            'gender' => $this->gender,
            'email' => $this->email,
            'description' => $this->description
        ];
    }
}
