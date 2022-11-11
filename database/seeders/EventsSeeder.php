<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EventsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/data.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Events::create(array(
                'codi' => $obj->codi

            ));
        }

    }
}
