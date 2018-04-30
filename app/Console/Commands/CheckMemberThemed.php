<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;

class CheckMemberThemed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zdxcms:check-member-themed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '检查用户是否一个月没有参加主题党日或者三会一课';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Member $member)
    {
        $member->check_member_themed();
        $this->info('检查完成');
    }
}
