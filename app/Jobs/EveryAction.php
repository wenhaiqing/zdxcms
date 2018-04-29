<?php

namespace App\Jobs;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EveryAction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $action;
    protected $member;
    protected $modelid;
    protected $modeltitle;
    protected $model;
    protected $jifen;
    public function __construct($model,Member $member,$modelid=null,$modeltitle=null,$action=null,$jifen=0)
    {
        $this->action = $action;
        $this->member = $member;
        $this->modelid = $modelid;
        $this->modeltitle = $modeltitle;
        $this->model = $model;
        $this->jifen = $jifen;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->member->RecordEveryAction($this->model,$this->modelid,$this->modeltitle,$this->action,$this->jifen);
    }
}
