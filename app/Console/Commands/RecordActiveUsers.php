<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;

class RecordActiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zdxcms:record-active-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每天进行一次党组织排名';

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
        $member->record_active_user();
        $this->info('排名完成');
    }
}
