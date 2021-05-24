<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjectList = [
            [
                "id" => "f1ba33b5-07bf-4d55-9ea4-ea20c4348c49",
                "name" => "1",
                "password" => "ILoveCube11"
            ],
            [
                "id" => "6ee6de51-a43e-48cb-83db-f6fc82f941d9",
                "name" => "2",
                "password" => "WeightedLove"
            ]
        ];

        foreach ($subjectList as $subject) {
            Subject::create(
                $subject
            );
        }
    }
}
