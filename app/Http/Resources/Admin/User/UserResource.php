<?php

namespace App\Http\Resources\Admin\User;

use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->mail_address,
            'tel' => $this->tel,
            'address' => $this->address,
            'status' => $this->status,
            'created_at' => DateHelper::parseDateBe($this->created_at, 'Y/m/d'),
        ];
    }
}
