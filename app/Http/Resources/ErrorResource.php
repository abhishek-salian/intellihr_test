<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    private int $code;
    private string $message;
    private string $status;

    public function __construct(
        int $code,
        string $message,
        string $status
    )
    {
        parent::__construct(null);
        $this->code = $code;
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        self::withoutWrapping();
        return [
            'error' => [
                'code' => $this->code,
                'message' => $this->message,
                'status' => $this->status
            ]
        ];
    }
}
