<?php

use Illuminate\Database\Seeder;
use App\Models\Notify;

class NotifysTableSeeder extends Seeder
{
    public function run()
    {
        $notifys = factory(Notify::class)->times(50)->make()->each(function ($notify, $index) {
            if ($index == 0) {
                // $notify->field = 'value';
            }
        });

        Notify::insert($notifys->toArray());
    }

}

