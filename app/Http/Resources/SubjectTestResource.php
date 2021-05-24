<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            [
                'Id' => 1,
                'Label' => 'What colour are your toes today?',
                'Type' => 'select',
                'Required' => false,
                'Options' => [
                    [
                        'label' => 'Normal coloured',
                        'value' => 'normal',
                    ],
                    [
                        'label' => 'Orange',
                        'value' => 'orange',
                    ],
                    [
                        'label' => 'Blue',
                        'value' => 'blue',
                    ],
                ],
            ],
            [
                'Id' => 2,
                'Label' => 'At any point this week, did you experience overwhelming feelings of doom?',
                'Type' => 'text',
                'Required' => false,
                'Options' => NULL,
            ],
            [
                'Id' => 3,
                'Label' => 'Are you currently alive?',
                'Type' => 'boolean',
                'Required' => false,
                'Options' => NULL,
            ],
            [
                'Id' => 4,
                'Label' => 'Was there cake?',
                'Type' => 'boolean',
                'Required' => true,
                'Options' => NULL,
            ],
        ];
    }
}
