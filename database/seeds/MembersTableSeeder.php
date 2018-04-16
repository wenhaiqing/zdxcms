<?php

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    public function run()
    {
        $members = factory(Member::class)->times(50)->make()->each(function ($member, $index) {
            if ($index == 0) {
                // $member->field = 'value';
            }
        });

        Member::insert($members->toArray());
    }

}

