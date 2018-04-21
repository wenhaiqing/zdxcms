<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;

class SyncUserEveryAction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zdxcms:sync-user-everyaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将用户前一天的行为记录从redis中同步到mysql中';

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
        $member->SyncUserEveryAction();
        $this->info('同步成功');
    }
}
