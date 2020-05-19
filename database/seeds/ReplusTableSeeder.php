<?php

use Illuminate\Database\Seeder;
use App\Models\Replu;

class ReplusTableSeeder extends Seeder
{
    public function run()
    {
        $replus = factory(Replu::class)->times(50)->make()->each(function ($replu, $index) {
            if ($index == 0) {
                // $replu->field = 'value';
            }
        });

        Replu::insert($replus->toArray());
    }

}

