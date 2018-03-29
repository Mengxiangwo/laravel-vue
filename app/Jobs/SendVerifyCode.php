<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Toplan\PhpSms\Sms;
use App\MobileHistory;

class SendVerifyCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $code = str_random(4);

        \Cache::put($this->phone, $code, 10);

        $content = "【xxxx】您的驗證碼是{$code}";

        $templates = [
            'YunPian' => env('YUNPIAN_TEMPLATE_VARIFYCODE_ID', 'your_temp_id')
        ];

        $templateData = [
            'code' => $code
        ];

        $mHistory = new MobileHistory();
        $mHistory->insert(array(
            'msg_type' => 1,
            'phone' => $this->phone,
            'msg_content' => $content,
            'add_time' => date('Y-m-d H:i:s')
        ));
        Sms::make()->to($this->phone)->template($templates)->data($templateData)->content($content)->send();
    }
}
