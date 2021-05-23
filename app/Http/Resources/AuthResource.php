<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends UserResource
{
    private ?string $token = null;

    public function __construct($resource, ?string $token = null)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [];
        if (!is_null($this->resource)) {
            $result = parent::toArray($request);

            $result = array_merge($result, [
                'token' => $this->token
            ]);
        }

        return $result;
    }
}
