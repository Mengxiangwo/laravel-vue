<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class sendEmail extends Command
{
    protected $msg;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        parent::__construct();
        $this->msg = $msg;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        sleep(4);
        echo $this->msg."\t".date("Y-m-d H:i:s")."\n";
        //$this->delete();
    }
}
