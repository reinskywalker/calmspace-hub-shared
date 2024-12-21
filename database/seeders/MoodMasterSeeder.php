<?php

namespace Database\Seeders;

use App\Models\MoodMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MoodMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moods = [
            ['name' => 'Angry', 'code' => 1],
            ['name' => 'Happy', 'code' => 2],
            ['name' => 'Productive', 'code' => 3],
            ['name' => 'Sad', 'code' => 4],
            ['name' => 'Nervous', 'code' => 5],
            ['name' => 'Sick', 'code' => 6],
            ['name' => 'Tired', 'code' => 7],
        ];

        foreach ($moods as $mood) {
            MoodMaster::create([
                'id' => Str::uuid(),
                'name' => $mood['name'],
                'code' => $mood['code'],
            ]);
        }
    }
}
